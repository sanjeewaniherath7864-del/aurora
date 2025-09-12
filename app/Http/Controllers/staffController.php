<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;

function findUser($id){
    $user = User::where("id",$id)->first(); 
    if(!$user){
        return redirect('/login');
    }
    return $user;
}




class staffController extends Controller
{
    //send correct staff view for staff member
    public function index(Request $request , $id){
        $user = User::find($id);
        return view("staff.index",['user'=>$user , 'select'=>'products']);
    }


    public function getProducts(Request $request , $id){
        $user = findUser($id);
        $sortBy = $request->query('sort');

        if($sortBy){
            $products = Product::orderBy( $sortBy)->get();

        }else{
            $products = Product::all();
        }

        return view('staff.products',['products'=>$products , 'user'=>$user , 'sortBy'=>$sortBy ,'select'=>'products']);
    }
    public function getTransports(Request $request , $id){
        $user = findUser($id);

        $sortBy = $request->query('sort');

        if($sortBy){
            $orders = Order::orderBy( $sortBy)->get();

        }else{
            $orders = Order::all();
        }
        
        return view('staff.transports',['orders'=>$orders , 'user'=>$user , 'sortBy'=>$sortBy , 'select'=>'transports']); 
    }
    public function getTransport(Request $request , $id , $orderId){
        $user = findUser($id);

        $sortBy = $request->query('sort');

        $orders = Order::where('id' , $orderId)->get();

        return view('staff.transports',['orders'=>$orders , 'user'=>$user , 'sortBy'=>$sortBy ,'select'=>'transports']); 
    }


    public function getProduct(Request $request,$id,$productId){
        $user = findUser($id);
        $products = Product::where('id',$productId)->get();
        return view('staff.products',['products'=>$products , 'user'=>$user , 'sortBy'=>null , 'select'=>'products']);
    }



    public function getOrders(Request $request , $id){
        $user = findUser($id);

        $sortBy = $request->query('sort');

        if($sortBy){
            $orders = Order::orderBy( $sortBy)->get();

        }else{
            $orders = Order::all();
        }
        
        return view('staff.orders',['orders'=>$orders , 'user'=>$user , 'sortBy'=>$sortBy , 'select'=>'orders']); 
    }


    public function getUsers(Request $request ,$id){
        /// gueard for unautherise
        $user = User::find($id);

        $sortBy = $request->query('sort');

        
        if($sortBy){
            $users = User::orderBy($sortBy)->get();

        }else{
            $users = User::all();
        }

        return view('staff.users',['users'=>$users , 'user'=> $user, 'sortBy'=>$sortBy , 'select'=>'users']); 
    }
    public function getOrder( $id , $orderId){
        /// gueard for unautherise
       
        $user = User::where('id',$id)->first();


        if(!$user) redirect('/login');

        $order = Order::find($orderId);

        $order->load('products');
        // dd($order);

        return view('staff.orderStaff',['user'=>$user , 'order'=>$order, 'select'=>'orders']); 
    }

    public function createUser(Request $request ,$id){
        $staffUser = User::find($id);   
        return view('signup',['user'=>$staffUser]);
    }

    public function createProduct(Request $request ,$id){
        $user = User::find($id);
        return view('staff.createProduct',['user'=>$user ,'select'=>'products']);
    }

    public function createProductCreator(Request $request,$id){
        $user = User::find($id);


        $name = $request->input('name');
        $price = $request->input('price');
        $stoke = $request->input('stoke');
        $unit = $request->input('unit');
        $image = $request->file('file');

        $fileName = "product-image-".time().'-'.$image->getClientOriginalName();


        $path = Storage::disk('public')->putFile("/products",$image);

        $imagePath = (Storage::url($path));

        $product = Product::create([
            "name"=> $name,
            "price"=> $price,
            "stoke"=> $stoke,
            "img"=>$imagePath,
            "unit"=>$unit,
        ]);
        
        return response()->redirectTo('/staff/'.$user->id.'/products/'.$product->id);

        
    }
}
