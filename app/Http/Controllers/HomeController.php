<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()

    {

        $user=User::where('usertype','user')->get()->count();
        $product=Product::all()->count();
        $order=Order::all()->count();
        $delivered=Order::where('status','delivered')->get()->count();


        return view('admin.index',compact('user','product','order','delivered'));

    }


    public function home(){
        $product = Product::all();

        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;
            $count= Cart::where('user_id',$userid)->count();
        }

        else{
            $count='';
        }



        return view('home.index',compact('product','count'));
    }

    public function login_home(){
        $product = Product::all();

        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;
            $count= Cart::where('user_id',$userid)->count();
        }

        else{
            $count='';
        }

        return view('home.index',compact('product','count'));

    }


    public function product_details($id){
        $data=Product::find($id);

        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;
            $count= Cart::where('user_id',$userid)->count();
        }

        else{
            $count='';
        }

        return view('home.product_details',compact('data','count'));
    }


    public function add_cart($id){

        $product_id=$id;

        $user=Auth::user();

        $data=new Cart;

        $data->user_id=$user->id;

        $data->product_id=$product_id;

        $data->save();
        toastr()->timeOut(10000)->closeButton()->success('Product deleted successfully.');
        return redirect()->back();

    }



    public function mycart(){

        if(Auth::user()){
            $user=Auth::user();
            $userid=$user->id;
            $count=Cart::where('user_id',$userid)->count();

            $cart=Cart::where('user_id',$userid)->get();
        }


        return view('home.mycart',compact('count','cart'));
    }



    public function remove_cart($id)
{
    $cart = Cart::find($id);
    if ($cart) {
        $cart->delete();
    }
    return redirect()->back()->with('success', 'Product removed from cart.');
}


    public function confirm_order(Request $request)
    {
        $name=$request->name1;
        $address=$request->address;
        $phone=$request->phone;

        $userid=Auth::user()->id;

        $cart=Cart::where('user_id',$userid)->get();

        foreach($cart as $carts)
        {
            $order=new Order;
            $order->product_id=$carts->product_id;
            $order->name=$name;
            $order->address=$address;
            $order->phone=$phone;
            $order->user_id=$userid;
            $order->quantity = 1;
            $order->price = $carts->product->price;
            $order->total_price = $carts->product->price * 1;
            $order->payment_status = 'Cash on Delivery';
            $order->status = 'Pending';
            $order->product_details = json_encode([
                'product_id' => $carts->product_id,
                'quantity' => 1,
                'price' => $carts->product->price,
            ]);

            $order->save();


        }


        $cart_remove=Cart::where('user_id',$userid)->get();
        foreach($cart_remove as $remove)
        {
            $data=Cart::find($remove->id);
            $data->delete();
        }

        toastr()->timeOut(10000)->closeButton()->success('Order placed successfully.');

        return redirect()->back();



    }


    public function myorders(){

        $user=Auth::user()->id;
        $count=Cart::where('user_id',$user)->get()->count();

        $order=Order::where('user_id',$user)->get();

        return view('home.order',compact('count','order'));
    }


    //payment gateway integration
    public function stripe()
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $user = Auth::user();

    $cartItems = Cart::where('user_id', $user->id)->get();

    if ($cartItems->isEmpty()) {
        return redirect()->back()->with('error', 'Your cart is empty.');
    }

    $amount = 0;

    foreach ($cartItems as $item) {
        $amount += $item->product->price * ($item->quantity ?? 1);
    }

    Stripe::setApiKey(config('services.stripe.secret'));

    $paymentIntent = PaymentIntent::create([
        'amount' => $amount * 100,
        'currency' => 'usd',
        'automatic_payment_methods' => [
            'enabled' => true,
        ],
    ]);

    return view('home.stripe', [
        'amount' => $amount,
        'clientSecret' => $paymentIntent->client_secret,
    ]);
}

 public function stripePost(Request $request)
{
    $userid = Auth::id();

    $cart = Cart::where('user_id', $userid)->get();

    foreach ($cart as $item) {

        $order = new Order();

        $order->product_id = $item->product_id;
        $order->user_id = $userid;

        $order->name = Auth::user()->name;

        $order->address = "Demo Address";
        $order->phone = "01700000000";

        $order->quantity = 1;

        $order->price = $item->product->price;

        $order->total_price = $item->product->price;

        $order->payment_status = "Paid (Demo)";

        $order->status = "Pending";

        $order->product_details = json_encode([
            'product_id' => $item->product_id,
            'quantity' => 1,
            'price' => $item->product->price,
        ]);

        $order->save();
    }

    Cart::where('user_id', $userid)->delete();

    return redirect('/myorders')->with('success', 'Payment Successful!');
}






    public function shop(){
        $product = Product::all();

        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;
            $count= Cart::where('user_id',$userid)->count();
        }

        else{
            $count='';
        }



        return view('home.shop',compact('product','count'));
    }



    public function why(){


        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;
            $count= Cart::where('user_id',$userid)->count();
        }

        else{
            $count='';
        }



        return view('home.why',compact('count'));
    }



    public function testimonial(){


        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;
            $count= Cart::where('user_id',$userid)->count();
        }

        else{
            $count='';
        }



        return view('home.testimonial',compact('count'));
    }


    public function contact(){


        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;
            $count= Cart::where('user_id',$userid)->count();
        }

        else{
            $count='';
        }



        return view('home.contact',compact('count'));
    }




}
