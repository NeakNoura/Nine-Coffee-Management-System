<?php

namespace App\Http\Controllers\Models;
namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\Product\Booking;
use App\Models\Product\Product;
use App\Models\Product\Order;
use App\Models\Product\Receipt;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;



class AdminsController extends Controller
{



public function showReceipt($id)
{
    $order = Order::findOrFail($id);
    return view('products.receipt', compact('order'));
}

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
    $usersCount = User::count();
    $earning = Order::sum('price'); // fix sum query

    // Add this line to get latest orders
    $recentOrders = Order::latest()->take(8)->get();

    return view('admins.index', compact(
        'productsCount', 
        'ordersCount',      
        'bookingsCount', 
        'adminsCount',
        'usersCount',
        'earning',
        'recentOrders'  // now defined
    ));
}

    public function DisplayAllAdmins(){
        $allAdmins = Admin::select()->orderBy('id','asc',)->get();
        return view('admins.alladmins',compact('allAdmins'));
    }
public function product() {
    return $this->belongsTo(Product::class, 'product_id', 'id');
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
         public function EditProducts($id)
    {
        $product = Product::findOrFail($id);
        return view('admins.edit', compact('product'));
    }

    public function UpdateProducts(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'type' => 'required',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Optional
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->type = $request->type;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/'), $filename);
            $product->image = $filename;
        }

        $product->save();

        return redirect()->route('all.products')->with('success', 'Product updated successfully!');
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

        public function Help()
        {
            return view('admins.help'); 
        }

          public function StaffSellForm()
    {
        $products = Product::select()->orderBy('id','asc')->get();
        return view('admins.staffSell', compact('products'));
    }
public function StaffSellProduct(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
        'payment_status' => 'required|in:Paid,Due',
        'first_name' => 'sometimes|string|max:255',
        'last_name' => 'sometimes|string|max:255',
        'state' => 'sometimes|string|max:255',
    ]);

    $product = Product::find($request->product_id);

    // Check if enough stock
    if ($product->quantity < $request->quantity) {
        return redirect()->back()->with('error', 'Not enough stock!');
    }

    $totalPrice = $product->price * $request->quantity;

    // ✅ Create the order here
    $order = Order::create([
        'product_id' => $product->id,
        'price' => $totalPrice,
        'payment_status' => $request->payment_status ?? 'Due',
        'status' => 'Pending',
        'first_name' => $request->first_name ?? 'Staff',
        'last_name' => $request->last_name ?? '',
        'state' => $request->state ?? '',
        'user_id' => auth()->id(),
    ]);

    // Deduct sold quantity from product stock
    $product->quantity -= $request->quantity;
    $product->save();

    return redirect()->route('staff.sell.form')->with(['success' => 'Product sold successfully!']);
}




}