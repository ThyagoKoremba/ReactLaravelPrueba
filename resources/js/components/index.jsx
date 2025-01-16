import React, { useState, useEffect } from 'react';
import axios from 'axios';

const VerdurasIndex = () => {
    const [verduras, setVerduras] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    useEffect(() => {
        cargarVerduras();
    }, []);

    const cargarVerduras = async () => {
        try {
            const response = await axios.get('/verduras/');
            setVerduras(response.data);
            setLoading(false);
        } catch (err) {
            setError('Error al cargar las verduras');
            setLoading(false);
        }
    };

    const cambiarEstado = async (id) => {
        try {
            await axios.patch(`/api/verduras/${id}/estado`);
            cargarVerduras(); // Recargar la lista después de cambiar el estado
        } catch (err) {
            setError('Error al cambiar el estado');
        }
    };

    if (loading) return <div>Cargando...</div>;
    if (error) return <div className="alert alert-danger">{error}</div>;

    return (
        <div className="container mt-4">
            <div className="row">
                <div className="col-12">
                    <div className="card">
                        <div className="card-header">
                            <h2 className="mb-0">Lista de Verduras</h2>
                        </div>
                        <div className="card-body">
                            <a href="/verduras/crear" className="btn btn-primary mb-3">
                                Agregar Nueva Verdura
                            </a>
                            <div className="table-responsive">
                                <table className="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Precio por Kg</th>
                                            <th>Stock</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {verduras.map((verdura) => (
                                            <tr key={verdura.id}>
                                                <td>{verdura.id}</td>
                                                <td>{verdura.nombre}</td>
                                                <td>${verdura.precioPorKg}</td>
                                                <td>
                                                    <button
                                                        className={`btn btn-sm ${verdura.stock ? 'btn-success' : 'btn-danger'}`}
                                                        onClick={() => cambiarEstado(verdura.id)}
                                                    >
                                                        {verdura.stock ? 'Disponible' : 'No disponible'}
                                                    </button>
                                                </td>
                                                <td>
                                                    <a 
                                                        href={`/verduras/editar/${verdura.id}`}
                                                        className="btn btn-sm btn-warning me-2"
                                                    >
                                                        Editar
                                                    </a>
                                                </td>
                                            </tr>
                                        ))}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default VerdurasIndex;
