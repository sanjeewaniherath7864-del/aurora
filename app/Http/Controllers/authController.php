<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class authController extends Controller
{
    //
    public function login(Request $request){
        $email = $request->input("email");
        $password = $request->input("password");
        


        $user = User::where("email", $email)->first();

        if(!$email && !$password){
            return response()->json([
                "status"=> "error",
                "message"=> "No Email or Password",
            ] , 401);
        }

        if(!$user){
            return response()->json([
                "status"=> "error",
                "message"=> "No user",
            ] , 400);
        }

       

        $isVerified = password_verify($password , $user->password );


        $data = ["data" => $user];
        $statusCode = 200;
        $redirect = null;

        if($isVerified){
            $status = "success";
            $data['redirect'] = '/'.$user->id;

            if($user->role == 'staff'){
                $data['redirect'] = '/staff/'.$user->id;
            }

        }
        else{
            $status = "fail";
            $data['data'] = null;
            $statusCode = 400;
        }
        
        $data['status'] = $status;

        $response = new Response(json_encode($data));


        $response->setContent(json_encode($data));
        $response->headers->set('Content-Type','application/json');
        $response->setStatusCode($statusCode);
        
        return $response;
    }


    public function signup(Request $request){
        $name = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $clerk = $request->input("role");
        

        $cart = Cart::create();

        $newUser =  [
            "name"=> $name,
            "password"=> password_hash($password , PASSWORD_BCRYPT),
            "email"=> $email,
            'cart_id'=>$cart->id,
        ];
        
            
        if($clerk){
            $newUser['clerk'] = $clerk;
            $newUser['role'] = 'staff';

        }

        $user = User::create($newUser);
/*

        $user = User::create([
            "name" => $name,
            "email"=> $email,
            "password" => password_hash($password , PASSWORD_BCRYPT),
            '$role'=>'user',
            'cart_id'=>$cart->id,
        ]);

        */
        if(!$user){
            return response()->json([
                'status'=> "error",
            ] , 401);
        }

        $redirect = $user->role == 'staff' ? '/staff/'.$user->id : '/'.$user->id;

        return response()->json([
            "status"=>"success",
            'data'=>$user,
            'redirect'=>$redirect,
        ]);

    }

    public function encryption(Request $request , $id){
        $user = User::find($id);
        $token = $user->id."%\\%"."this is your encrypted token"."%\\%".$user->role ;

        // Store the cipher method
        $ciphering = "AES-128-CTR";

        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        echo($iv_length);

        // Non-NULL Initialization Vector for encryption
        $encryption_iv = '1234567891011121';

        // Store the encryption key
        $encryption_key = "sanjeewani group project";

        // Use openssl_encrypt() function to encrypt the data
        $encryption = openssl_encrypt($token, $ciphering,
                    $encryption_key, $options, $encryption_iv);

        // Display the encrypted string
        echo "Encrypted String: " . $encryption . "\n";

        $decryption_iv = '1234567891011121';

        // Store the decryption key
        $decryption_key = "sanjeewani group project";

        // Use openssl_decrypt() function to decrypt the data
        $decryption=openssl_decrypt ($encryption, $ciphering, 
                $decryption_key, $options, $decryption_iv);


        dd($encryption,$decryption);
        // Display the decrypted string
        echo "Decrypted String: " . $decryption;


    }


}
