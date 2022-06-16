<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        return Product::all();;
    }
    public function store(Request $request)
    {
        //
        $product = new Product;
        //Declarem el nom amb el request
        $product->name = $request->name;
        $product->idproveidor = $request->idproveidor;
        //Desem els canvis
        $product->save();
    }
    public function update(Request $request, $id){
        $product = Product::find($id);
        $product->name = $request->name;
        $product->idproveidor = $request->idproveidor;
        $product->save();

        return response()->json([
            "message"=>$product
        ]);
    }
    public function delete($id){
        $producto = Product::where('id',$id)->delete();
        if($producto){
            return response()->json([
                "message"=>"Exito en Borrar Producto"
            ]);
        }
        return response()->json([
            "message"=>"No existe el producto"
        ]);
    }
    public function getById($id){
        $producto = Product::where('id',$id)->get();
        if(count($producto) > 0){
            return response()->json([
                "message"=>$producto
            ]);
        }
        return response()->json([
            "message"=>"No existe el producto"
        ]);
    }
}
