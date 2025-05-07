<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\Product\Booking;
use App\Models\Product\Product;
use App\Models\Product\Order;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;



class AdminsController extends Controller
{
    public function viewLogin(){
        return view('admins.login');
    }

    public function checkLogin(Request $request) {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
    
        $admin = Admin::where('email', $request->email)->first();
    
      
        if ($admin && Hash::check($request->password, $admin->password)) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('admins.dashboard');
        }
    
        
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }
    
    public function index(){
        $productsCount = Product::count();
        $ordersCount = Order::count();
        $bookingsCount = Booking::count();
        $adminsCount = Admin::count();
    
        return view('admins.index', compact('productsCount', 'ordersCount', 'bookingsCount', 'adminsCount'));
    }
    
    public function DisplayAllAdmins(){
        $allAdmins = Admin::select()->orderBy('id','asc',)->get();
        return view('admins.alladmins',compact('allAdmins'));
    }


    public function createAdmins(){
      
        return view('admins.createadmins');
    }

    public function storeAdmins(Request $request){

        Request()->validate([
            "name" => "required|max:40",
            "email" => "required|max:40",
            "password" => "required",
        ]);

        
    $storeAdmins = Admin::Create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
    if($storeAdmins){
        return Redirect::route('all.admins')
                ->with(['success' => "admin created  successfully"]);
    }
            return view('admins.index');
    }


    public function DisplayAllOrders(){
      $allOrders = Order::select()->orderBy('id','asc')->get();
      
        return view('admins.allorders',compact('allOrders'));
    }

    public function EditOrders($id){
        $order = Order::find($id);
        
          return view('admins.editorders',compact('order'));
      }
      

      
    public function UpdateOrders(Request $request,$id){
        $order = Order::find($id);
        $order->update($request->all());
        if($order){
            return Redirect::route('all.orders')->with(['update'=>"order status updated successfully"]);
        }
        
         
      }


      public function DeleteOrders($id){
        $order = Order::find($id);
        $order->delete();
        if($order){
            return Redirect::route('all.orders')->with(['delete'=>"order delete  successfully"]);
        }
        
         
      }
  

      public function DisplayProducts(){
        $products = Product::select()->orderBy('id','asc')->get();
       
          
            return view('admins.allproducts',compact('products'));
        
        
         
      }
      public function CreateProducts(){
       
            return view('admins.createproducts');
        
        
         
      }
      
      public function StoreProducts(Request $request){


    $descriptionPath = 'assets/images/';
    $myimage = $request->image->getClientOriginalName();
    $request->image->move(public_path($descriptionPath), $myimage);
    $storeProducts = Product::Create([
        'name' => $request->name,
        'price' => $request->price,
        'image' => $myimage,
        'description' => $request->description,
        'type' => $request->type,
      
        
    ]);
    if($storeProducts){
        return Redirect::route('all.products')
                ->with(['success' => "product created  successfully"]);
    }
           
    }
    public function DeleteProducts($id){
       

        $product = Product::find($id);
        if(File::exists(public_path('assets/images/' . $product->image))){
            File::delete(public_path('assets/images/' . $product->image));

        }else{

        }
        $product->delete();

            if($product)
        return Redirect::route('all.products')
        ->with(['delete' => "product delete  successfully"]);

         }
  
  
         
         public function DisplayBookings(){
            $bookings = Booking::select()->orderBy('id','asc')->get();
           
              
                return view('admins.allbookings',compact('bookings'));         
             
          }
          public function EditBookings($id){
            $booking = Booking::find($id);
            
              return view('admins.editbooking',compact('booking'));
          }

          public function DeleteBookings($id){
            $booking = Booking::find($id);
            $booking->delete();
            if($booking){
                return Redirect::route('all.bookings')->with(['delete'=>"booking delete  successfully"]);
            }
            
             
          }
          public function CreateBookings(){
       
            return view('admins.createbooking');
     
         }
      
      public function UpdateBookings(Request $request,$id){
        $booking = Booking::find($id);
        $booking->update($request->all());
        if($booking){
            return Redirect::route('all.bookings')->with(['update'=>"booking status updated successfully"]);
        }
         
      }


      public function StoreBookings(Request $request){

        $storeBookings = Booking::Create([
            'user_id' => auth()->id(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'date' => $request->date,
            'time' => $request->time,
            'phone' => $request->phone,
            'message' => $request->message,
          
            
        ]);
        if($storeBookings){
            return Redirect::route('all.bookings')
                    ->with(['success' => "booking created  successfully"]);
        }
               
        }
      
          
          
}