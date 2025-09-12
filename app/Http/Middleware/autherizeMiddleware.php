<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Cookie;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;



class autherizeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */



    public function handle(Request $request, Closure $next): Response 
    {
            $permission = [
                'admin'=>[
                    'users','transports' , 'orders' , 'products'
                ],
                'management'=>[
                    'orders','transports' , 'products','users'
                ],
                'plantation'=>[
                    'orders','products','transports'
                ]
            ];


            $token = $request->cookies->get("token");

            //check is user already loged

            if (!$token) {
                return response()->redirectTo("/login");
            }

            // Store the cipher method
            $ciphering = "AES-128-CTR";
    
            // Use OpenSSl Encryption method
            $iv_length = openssl_cipher_iv_length($ciphering);
            $options = 0;

            $decryption_iv = '1234567891011121';
    
            // Store the decryption key
            $decryption_key = "sanjeewani group project";
    
            // Use openssl_decrypt() function to decrypt the data
            $decryption=openssl_decrypt ($token, $ciphering, 
                    $decryption_key, $options, $decryption_iv);

            //autherization
            if (!$decryption) {
                redirect('/login');
                return $next($request);
            }


            $data = explode("%$$%" , $decryption);

            $id = $data[0];
            $user = User::find($id);

            if (!$user) {
                return response()->redirectTo("/login");
            }

            if(!($user->active)){
                return response()->redirectTo("/");
            }

            $path = $request->getPathInfo();
            $pathDecontructed = explode( '/' , $path);

            // Set only can log current user and unautherize logings
            if($pathDecontructed[1] == 'users' && $user->role == "user"){ 
                
                $userId = $pathDecontructed[2];


                if($id == $userId) { //verify is correct user access correct route
                    return $next($request);

                }else{
                    return response()->redirectTo("/login");
                }
            }

            //for staff users
            if($pathDecontructed[1]=='staff' && $user->role == "staff"){
                $staffId = $pathDecontructed[2];

                if($id == $staffId) {

                    if(count($pathDecontructed)>3){
                        // access controll for staff for coresponding route
                        $clerk = $user->clerk;
                        if (in_array($pathDecontructed[3],$permission[$clerk])){
                            return $next($request);
                        }else{
                            response()->redirectTo("/staff/".$id);
                        }
                    }else{
                        return $next($request);
                    }
                    


                }else{
                    return response()->redirectTo("/login");
                }

            }

            //for index root
            
            if($pathDecontructed[1] ==  $id){
                return $next($request);
            }

            // for access user route for staff menmber
            if($pathDecontructed[1] == 'users' && $user->role == "staff"){
                if($id == $user->id) {
                    return $next($request);
                }
            }




            return response()->redirectTo("/login");
    
    }
}
