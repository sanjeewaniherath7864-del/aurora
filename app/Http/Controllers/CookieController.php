<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    //
    /*
    public function setCookie(Request $request , Response $response){
        $token = $request->get("token");

        $time = 60*24*7;

        $user = User::where('token' , $token)->first();
        
        if(!$user) return $response->json([
            'status'=>"fail",
            "message"=> "register on root verification failed"
        ]);

        $userIdToken = Cookie::make('id' , $user->id , $time ,"/");

        $userToken = Cookie::make('token' , $token ,$time , "/");
        $response->withCookie($userToken);
        $response->withCookie($userIdToken);
        $response->setContent(json_encode([
            'status'=> 'success',
            'message'=> 'user verifired',
        ]));
        return $response;
    }
        */

    public function setCookie(Request $request , Response $response){
        $password = $request->get("password");
        $id = $request->get("id");

        $user = User::find( $id );

        if(!$user) return json_encode([
            'status'=>"fail",
            "message"=> "register on root verification failed"
        ]);

        $isVerifyPassword = password_verify($password, $user->password);

        if(!$isVerifyPassword) return json_encode([
            "status"=> "fail",
            "message"=> "user not verified",
        ]);


        $token = $user->id."%$$%"."this is your encrypted token"."%$$%".$user->role ;

        // Store the cipher method
        $ciphering = "AES-128-CTR";

        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        // Non-NULL Initialization Vector for encryption
        $encryption_iv = '1234567891011121';

        // Store the encryption key
        $encryption_key = "sanjeewani group project";

        // Use openssl_encrypt() function to encrypt the data
        $encryption = openssl_encrypt($token, $ciphering,
                    $encryption_key, $options, $encryption_iv);


        $time = 60*24*7; // week
        $userToken = Cookie::make('token' , $encryption ,$time , "/");
        $userId = Cookie::make("user-id" , $user->id , $time);
        $response->withCookie($userToken);
        $response->withCookie($userId);

        $response->setContent(json_encode([
            'status'=> 'success',
            'message'=> 'user verifired',
            'token'=>$encryption,
        ]));
        return $response;


    }

    public function removeCookie(Request $request , Response $response){
        $response->withCookie(Cookie::forget('token'));

        $response->setContent(json_encode([
            'status'=> 'success',
            'message'=> 'user logged out from server',
        ]));

        // $response->sendHeaders();

        return $response->sendHeaders();
    }
}
