<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    //obtener todos los productos
    public function index(){
        $products = Products::all();

        return response()->json($products, 200);
    }

    //metodo para mostrar productos en base al usuario que inicio sesion
    public function get_products_by_user(Request $request){
        //user() => metodo que recopila informacion del usuario que inicio sesion
        $user = $request->user(); //{}

        $products = Products::where('user_id', $user->id)->get();

        return $products->isNotEmpty() ? response()->json($products, 200) : response()->json(["message" => "No hay productos"]);

    }
}
