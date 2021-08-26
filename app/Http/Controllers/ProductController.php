<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Product;
Use App\Models\Cart;
Use Session;
use Illuminate\Support\Facades\DB;
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
    public function addToCart(Request $req){
        if($req->session()->has('user')){
            $prodid=$req->input('productid');
            $userid=$req->session()->get('user')['id'];
            $count=Cart::where('product_id','=',$prodid,'AND')->where('user_id','=',$userid)->count();
            if($count > 0){
                $cart=Cart::where('product_id','=',$prodid,'AND')->where('user_id','=',$userid)->get();
                $quantity=$cart[0]->quantity + 1;
                $cart=DB::table('cart')->where('product_id','=',$prodid,'AND')->where('user_id','=',$userid)
                ->update(['quantity' => $quantity]);
                if($cart){
                    return redirect('/');
                }
            }
            else{
                $cart=New Cart;
                $cart->user_id=$req->session()->get('user')['id'];
                $cart->product_id=$req->input('productid');
                $cart->quantity=1;
                $cart->save();
            }
            
            return redirect('/');
        }
        else{
            return redirect('/login');

        }
    }
    static public function CartCount(){
        $userid=Session::get('user')['id'];
        return Cart::where('user_id','=',$userid)->count();
    }
    function cartList(){
        $userid=Session::get('user')['id'];
        $data=DB::table('cart')->join('products','products.id','=','cart.product_id')->where('cart.user_id','=',$userid)->select('products.*','cart.id As cartId','cart.quantity As Quantity')->get();
        return view('cartlist',['data'=>$data]);
    }
    function cartDelete($id){
        $data=Cart::find($id);
        $data->delete();
        return redirect('/cartlist');
    }

}
