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
    
     $cart = Cart::where('user_id', Auth::user()->id)
      ->orderBy('id','desc')
      ->get();

      $totalPrice = Cart::where('user_id',Auth::user()->id)
      ->sum('price');
    
        return view('products.cart',compact('cart','totalPrice'));
    }

    

    public function deleteProductCart($id) {
    
        $deleteProducCart = Cart::where('pro_id', $id)
       ->where('user_id',Auth::user()->id)
       ->first();

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
        $newPrice = Session::get($price);


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

    echo"welcome to paypal payment";
        // return Redirect::route('product.single', $id)
        //     ->with(['success' => "Product added to cart successfully"]);
    }

}