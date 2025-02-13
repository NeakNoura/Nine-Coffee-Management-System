<?php

namespace App\Http\Controllers\Products;


use App\Models\Product\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\Product\Booking;





class ProductsController extends Controller

{
    public function singleProduct($id) {

        $product = Product::find($id);


        $relatedProducts = Product::where('type',$product->type)
        ->where('id','!=',$id)->take('4')->orderBy('id','desc')->get();


        
        $checkInCart = Cart::where('pro_id', $id)
        ->where('user_id',Auth::id())
        ->count();

        return view('products.productsingle', compact('product','relatedProducts','checkInCart'));
    }

   
    public function addCart(Request $request, $id) {

        $addCart = Cart::create([
            "pro_id" => $request->pro_id,
            "name" => $request->name,
            "image" => $request->image,
            "price" => $request->price,
            "user_id" => Auth::id(),
            "created_at" => now(),  
            "updated_at" => now(), 
        ]);
    
        return Redirect::route('product.single', $id)
            ->with(['success' => "Product added to cart successfully"]);
    }


    public function cart() {
        if (!Auth::check()) {
            return Redirect::route('login')->with(['error' => "You need to login first"]);
        }
     $cart = Cart::where('user_id', Auth::user()->id)
      ->orderBy('id','desc')->get();

      $totalPrice = $cart->sum(fn($item) => floatval($item->price));

        return view('products.cart',compact('cart','totalPrice'));
    }

    

    public function deleteProductCart($id) {
    
        $deleteProducCart = Cart::where('pro_id', $id)
       ->where('user_id',Auth::user()->id)->first();

        $deleteProducCart->delete();
        
       if($deleteProducCart){
       return Redirect::route('cart')
       ->with(['delete' => "Product deleted from cart successfully"]);
       }

       return Redirect::route('cart')
       ->with(['error' => "Product not found in cart"]);
    }



    public function prepareCheckout(Request $request) {
      
        $value = $request->price;
        $price = Session::put('price',$value);
        $newPrice = Session::get('price');


            if($newPrice > 0){
       return Redirect::route('checkout');
       }
    }


    
    public function checkout() {
    
        {
        return view('products.checkout');
       }
    }

    public function storeCheckout(Request $request) {

        $checkout = Order::create($request->all());

        return View('products.paypal');
    }

    public function success() {

       $deleteItems = Cart::where('user_id',Auth::user()->id);
       $deleteItems->delete();

       if($deleteItems){
        Session::forget('price');

        return View('products.success');
       }
       
    }


       
    public function BookingTables(Request $request) {

        Request()->validate([
            "first_name"=> "required|max:40",
            "last_name"=> "required|max:40",
            "date"=> "required",
            "time"=> "required",
            "phone"=> "required|max:40",
            "message"=> "required",
        ]);
        if($request->date > date('n/j/Y')){
        $bookTables = Booking::create($request->all());
        if ($bookTables){
            return Redirect::route('home')->with (['booking' => "you booked a table successfully"]);
        }

    }else{
        return Redirect::route('home')->with(['date' => "Invalid date,choose a date in the future "]);
         }
    }

    public function contact()
    {
        return view('products.contact'); 
    }

    public function menu()
    {
        return view('products.menu'); 
    }
    public function about()
    {
        return view('products.about'); 
    }


}