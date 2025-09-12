<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    
    public function deleteFromCart(Request $request , $id , $cartId)
{
        $user=User::find($id);
        $cart = Cart::find($user->cart_id);

        //not recommened but detach method is not warking
        $deleted = DB::table("cart_product")->where("id",$cartId)->delete();

        // $cart->load('products')->find($cartId)->delete();

        if($deleted){
            return [
                "status"=>'success',
                "message"=> "cart item removed",
                'cart'=>$cart,
            ];
        }else{
            return [
                'status'=> 'error',
                "message"=>"cart item not deleted"
            ];
        };

        

        
    }
}
