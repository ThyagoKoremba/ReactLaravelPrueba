<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verduras extends Model
{
    protected $table = 'verduras';
    
    protected $fillable = [
        'nombre',
        'precioPorKg',
        'stock'
    ];

    protected $casts = [
        'precioPorKg' => 'decimal:2',
        'stock' => 'boolean'
    ];
}