<?php

namespace App\Http\Controllers;

use App\Models\Verduras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class VerdurasController extends Controller
{
    public function index(){
        $verduras=Verduras::orderBy('id')->get();
        return view ('index')->with('verduras',$verduras);
    }
    public function nuevo(){
        return view ('nuevo');
    }
    public function guardar(Request $request){
        $validator=Validator::make($request->all(),[
            'nombre'=>'required|unique:verduras',
            'precioPorKg'=>'required|numeric|decimal:0,2',
            'stock'=>'boolean'
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $verdura= new Verduras;
        $verdura->nombre = $request->nombre;
        $verdura->precioPorKg=$request->precioPorKg;
        $verdura->stock=$verdura->stock;
        $verdura->save();

        $verduras=Verduras::orderBy('id')->get();
        return view('index')->with('verduras',$verduras)->with('success','creado correctamente');
    }
    public function editar($id){
        $verdura=Verduras::findOrFail($id);
        return view('editar',compact('verdura'));
    }

    public function guardaredit(Request $request, $id){
        $verdura=Verduras::findOrFail($id);
        $validator=Validator::make($request->all(),[
            'nombre'=>['required',
            Rule::unique('Verduras','nombre')->ignore($verdura->id)],
            'precioPorKg'=>'required|numeric|decimal:0,2',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $verdura->nombre = $request->nombre;
        $verdura->precioPorKg=$request->precioPorKg;
        $verdura->save();
        $verduras=Verduras::orderBy('id')->get();
        return redirect()->route('index')->with('verduras',$verduras)->with('success','modificado correctamente');
    }
    public function cambiarEstado($id){
        $verdura=Verduras::findOrFail($id);
        $verdura->stock=!$verdura->stock;
        $verdura->save();
        return redirect()->back()->with('success','cambiado correctamente');
    }
}
