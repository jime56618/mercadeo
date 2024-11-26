<?php

namespace App\Http\Controllers;

use App\Models\ProductosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductosController extends Controller
{
    public function Listado(){

        //if ($request->filtro!=null){
            //return ProductoModel::where('nombre', 'LIKE', "%{$request->filtro}%")->get();
            
        //}else{

            //return ProductoModel::all();
        //}
        $producto = ProductosModel::all();

        return response()->json($producto);

    }

    public function obtenerProdcutoporId($id){
            return ProductosModel::find($id);
    }

    public function agregarProducto(Request $request)
    {
       
        if ($request->file('imagen')){
            $image=$request->file('imagen');
            $imagenName = time().$image->getClientOriginalName();
            $image->move(public_path().'/assets/',$imagenName);
            $path ='http://127.0.0.1:8000/assets/'.$imagenName;
        }
        $productoGuardado=ProductosModel::create([
            'nombre' =>$request->nombre,
            'descripcion' =>$request->descripcion,
            'imagen' =>$path,
            'precio' =>$request->precio,
        ]);
        return response()->json(["message"=>"guardado"]);
    }

  
    public function AgregarPro(){
        return view('productos.AgregarProducto');

    }

    public function DetalleProducto($id){
        return view('productos.DetalleProducto',['idProducto'=>$id]);

    }

    public function eliminar($id)
    {
        $product = ProductosModel::find($id);
        if (!$product) {
            return "Producto no encontrado";
        }
        $product->delete();
        return response()->json("guardado");
    }

    public function actualizar(Request $request,$id){
        
        $product=ProductosModel::find($id);
        if (!$product){
            return "producto no existe";
        }
        //dd($request->file('imagen'));
        File::delete($product->imagen);
        if ($request->file('imagen')){
            $image=$request->file('imagen');
            $imagenName = time().$image->getClientOriginalName();
            $image->move(public_path().'/assets/',$imagenName);
            $path ='http://127.0.0.1:8000/assets/'.$imagenName;
        }
        $product->nombre=$request->nombre;
        $product->descripcion=$request->descripcion;
        $product->imagen= $path;
        $product->precio=$request->precio;

        $product->save();
        return response()->json("guardado");
    }
    public function EditarProducto($id){
        return view('productos.EditarProducto',['idProducto'=>$id]);
    }

}

