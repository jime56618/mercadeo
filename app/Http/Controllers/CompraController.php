<?php

namespace App\Http\Controllers;

use App\Models\CompraModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function Listado(Request $request){

        if ($request->filtro!=null){
            return CompraModel::where('nombre_producto', 'LIKE', "%{$request->filtro}%")->get();
            
        }else{

            return CompraModel::all();
        }

    }

    public function ObtenerCompraporId($id){
        return CompraModel::find($id);
}
    public function AgregarComprar(Request $request){
        //dd($request->nombre);
        $obtener = CompraModel::create([
            'nombre_producto' => $request->nombre,
            'imagen' => $request->imagen,
            'precio' => $request->precio,
        ]);
        return response()->json(["message"=>"guardado"]);
        
    }

    public function DetalleCompra($id){
        return view('productos.DetalleCompra',['idCompra'=>$id]);
    }

    public function HistorialCompra(){
        return view('productos.HistorialCompra');
    }
    public function eliminar($id)
    {
        $compra = CompraModel::find($id);
        if (!$compra) {
            return "compra no encontrado";
        }
        $compra->delete();
        return "compra eliminado correctamente";
    }

    public function actualizar(Request $request,$id){

        
        $compra=CompraModel::find($id);
        if (!$compra){
            return "producto no existe";
        }
        //dd($request->nombre);
        $compra->nombre_producto=$request->nombre;
        $compra->imagen=$request->imagen;
        $compra->precio=$request->precio;
        $compra->fechahora=Carbon::now();
        
        $compra->save();
        return "se actualizo correctamente";
    }

}