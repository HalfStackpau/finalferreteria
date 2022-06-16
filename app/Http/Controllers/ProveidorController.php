<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveidor;

class ProveidorController extends Controller
{
    public function index(){
        $proveidor = Proveidor::all();
        return $proveidor;
    }
    public function store(Request $request){
        $proveidor = new Proveidor();
        $proveidor->name = $request->name;
        $proveidor->country = $request->country;
        $proveidor->cif = $request->cif;
        $proveidor->industry = $request->industry;
        $proveidor->save();
        return response()->json([
            "message"=>$proveidor
        ]);
    }
    public function update(Request $request, $id){
        $proveidor = Proveidor::find($id);
        $proveidor->name = $request->name;
        $proveidor->country = $request->country;
        $proveidor->cif = $request->cif;
        $proveidor->industry = $request->industry;
        
        $proveidor->save();

        return response()->json([
            "message"=>$proveidor
        ]);
    }
    public function delete($id){
        $proveidor = Proveidor::where('id',$id)->delete();
        if($proveidor){
            return response()->json([
                "message"=>"Exito en Borrar Producto"
            ]);
        }
        return response()->json([
            "message"=>"No existe el producto"
        ]);
    }
}
