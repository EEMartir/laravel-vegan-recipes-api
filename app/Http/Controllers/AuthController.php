<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
// Add this path. 
use Illuminate\Support\Facades\Hash; // Bring this path to use bcrypt


class AuthController extends Controller
{
    // Create the register function 
   public function register(Request $request){
            $fields = $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|unique:users',
                'password' => 'required|string|confirmed',
            ]);

            $user = User::create([
                'name' => $fields['name'],
                'email' => $fields['email'],
                'password' => bcrypt($fields['password']),
            ]);

            $token = $user->createToken('myapptoken')->plainTextToken; 

            $response = [
                'user' => $user,
                'token' => $token
            ];

            return response()->json($response, 201);
   }

   // Create the login function

   public function login(Request $request){
            $fields = $request->validate([
               
                'email' => 'required|string',
                'password' => 'required|string',
            ]);

           // Check email 
           $user = User::where('email', $fields['email'])->first();

           // Check password
              if(!$user || !Hash::check($fields['password'], $user->password)){ 
                //if no matcn in user and no match with the user password
                return response([
                    'message' => 'invalid credentials'
                ], 401);

            }
            //If credentials pass, this will pass onto the api: 
            
            $token = $user->createToken('myapptoken')->plainTextToken; 

            $response = [
                'user' => $user,
                'token' => $token
            ];

            return response()->json($response, 201);
   }


   // Create the logout function 
   public function logout(Request $request){
    auth()->user()->tokens()->delete();
    return [
        'message' => 'Successfully logged out'
    ];
    
   }
}
