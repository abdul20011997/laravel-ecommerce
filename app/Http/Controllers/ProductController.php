<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Product;
Use App\Models\Cart;
Use App\Models\Order;
Use App\Models\OrderDetail;

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
    function checkout(){
        $user=Session::get('user')['id'];
        $totaldata=DB::table('cart')->join('products','products.id','=','cart.product_id')->where('cart.user_id','=',$user)->select('products.price As Price','cart.quantity As Quantity')->get();
        $totalamount=0;
        for($i=0;$i<count($totaldata);$i++){
            $totalamount1=$totaldata[$i]->Price * $totaldata[$i]->Quantity;
            $totalamount=$totalamount+$totalamount1;
        }
        return view('checkout',['totalamount'=>$totalamount]);
    }
    function order(Request $req){
        // return $req->input();
        $userid=$req->session()->get('user')['id'];
        $cartdata=Cart::where('user_id','=',$userid)->get();
        $totalamount=DB::table('cart')->join('products','products.id','=','cart.product_id')->where('cart.user_id','=',$userid)->sum('products.price');
        $order=New Order;
        $order->user_id=$userid;
        $order->status='Pending';
        $order->paymenttype=$req->paymenttype;
        $order->paymentstatus='Pending';
        $order->address=$req->address;
        $order->save();
        $orderId=$order->id;
        for($i=0;$i<count($cartdata);$i++){
            $orderdetails=New OrderDetail;
            $orderdetails->order_id=$orderId;
            $orderdetails->product_id=$cartdata[$i]['product_id'];
            $orderdetails->quantity=$cartdata[$i]['quantity'];
            $orderdetails->save();
        }
        Cart::where('user_id','=',$userid)->delete();
        return redirect('/');

    }

}
