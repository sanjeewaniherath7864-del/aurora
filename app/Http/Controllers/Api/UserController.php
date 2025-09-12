<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartOrderProduct;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reqBody = $request->all();
        $userName = $request->input("username");
        $password = $request->input("password");
        $email = $request->input("email");
        $clerk = $request->input("role");

        $newUser =  [
            "name"=> $userName,
            "password"=> password_hash($password , PASSWORD_BCRYPT),
            "email"=> $email,
        ];

    
        if($clerk){
            $newUser['clerk'] = $clerk;
            $newUser['role'] = 'staff';

        }

        dd($newUser);


        $user = User::create($newUser);

        return response()->json($user);

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $email = $user->email;
        $password = $user->password;

        return response()->json(["email"=> $email,"password"=> $password]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $email = $request->get('email');
        $password = $request->input('password');
        $name = $request->input('username');

        $updateObj = [];
        $password_encrypt = password_hash($password , PASSWORD_BCRYPT);

        $email? $updateObj["email"] = $email : '';
        $password? $updateObj["password"] = $password_encrypt : '';
        $name? $updateObj["name"] = $name : '';

        $user = User::where('id' , $id)->first()->update($updateObj);
        $user = User::find($id);

        if(!$user){
            return [
                'status'=>'fail',
                'data'=>$user,
            ];
        }

        return [
            'status'=>'success',
            'data'=>$user,
        ];

    }

    /**
     * Remove the specified resource from storage.
     */
    public function distroy(Request $request , $id){
        $user = User::find($id);
 
        if(!$user){
            return [
                'status'=> 'error',
            ];
        }    


        $password = $request->get('password');
        $verfyPassword = password_verify($password ,$user->password);
        
        if(!$verfyPassword){
            return [    
                'status'=> 'error',
                'message'=>'wrong password'
            ];
        }

        $user->update([
            "active"=>false,
            "email"=>$user->id,
        ]);


        return [
            "status"=>"success",
            "user"=>$user,
            "message"=> "User Deleted Successfuly",
        ];
    }

    public function getUser( $id)
    {
        $user = User::find($id);

        if(! $user) {
            redirect("/signup");
        }

        return view("profile" , ['user'=>$user]);

    }

    public function addToCart(Request $request, $id){
        $productId = $request->get('productId');
        $quantity = $request->get('quantity');
        $userId = $request->get('userId');

        Cart::find($id)->products()->attach([
            ['product_id'=> $productId,
            'quantity'=> $quantity,]
        ]);

        return [
            'status'=> 'success',
        ];
       
    }

    public function getCart(Request $request, $id){
        $user = User::find($id);
        $cart = Cart::find($user->id);
        $cart->load(['products']);
        $price = 0;

        foreach ($cart->products as $product) {
            $price += $product->price * $product->pivot->quantity;
        }

        return view('cart', ['user'=>$user,'carts'=>$cart, 'total'=>$price]);
        

    }

    public function placeOrder(Request $request, $id){
        $user = User::find($id);
        $formData = $request->all();

        $customer_name = $request->get('customer_name');
        $address = $request->get('address');
        $mobile_no = $request->get('mobile_no');
        $bank_no = $request->get('bank_no');
        $cart_id = $user->cart_id;

        $price = 0 ;

        $cart = Cart::find($cart_id);
        $cart->load(['products']);
        $oderProductQuantity = [];
        foreach ($cart->products as $product){
            $price += $product->pivot->quantity * $product->price;
            array_push($oderProductQuantity , [
                'product_id' => $product->id,
                'quantity'=> $product->pivot->quantity,
            ]);
        }


        $order = Order::create([
            'user_id'=>$user->id,
            'status'=>'pending',
            'address'=>$address,
            'mobile_no'=>$mobile_no,
            'customer_name'=>$customer_name,
            'bank_card_no'=>$bank_no,
            'price'=>$price,
            
        ]);


        //place order
        $order->products()->attach($oderProductQuantity);
        //remove form cart
        $cart->products()->where('cart_id' , $cart->id)->detach();


        return view('orderComplete' , ['user'=>$user,'order'=>$order]);

    }


    public function getOrders(Request $request , $id){
        $user = User::find($id);

        $order = Order::where('user_id', $user->id)->get();

        return view('orders' , ['user'=>$user ,'orders'=> $order]);
    }

    public function getOrder( $id , $orderId){
        $user = User::find($id);
        $order = Order::find($orderId);
        $order->load('products');
        return view("order" , ['user'=>$user , "order"=>$order]);

    }
}
