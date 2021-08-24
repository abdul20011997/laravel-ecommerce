<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Product;
class ProductController extends Controller
{
    //
    public function index(){
        $data=Product::all();
        return view('home',['data'=>$data]);
    }
    public function getProduct(Request $req){
        $data=Product::find($req->id);
        return view('productdetail',['data'=>$data]);
    }
    public function search(Request $req){
       $data=Product::where('name','like','%'.$req->input('query').'%')->get();
        return view('search',['data'=>$data]);
    }
}
