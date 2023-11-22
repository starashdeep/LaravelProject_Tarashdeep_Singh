<?php

namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiController extends Controller
{
    // User Register (POST, formdata)
    public function register(Request $request){
        
        // data validation
        // $request->validate([
        //     "name" => "required",
        //     "email" => "required|email|unique:users",
        //     "password" => "required|confirmed"
        // ]);

        // User Model
        $user=User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);
        $user->save();

        return redirect()->route('login')->with('success', 'User registered successully!');
    }
    
    // User Profile (GET)
    
    public function profile(Request $request)
    {
        // dd(Cookie::get('_token'));
        // $user = JWTAuth::toUser($reuesttoken);
        $user=auth()->user();
        // dd($user);
        return view('profile')->with('user', $user);
        
        // $userName = $user->name;
        // $userEmail = $user->email;
        // return route('me', [$user]);

    }
    // User Login (POST, formdata)
    public function login(Request $request){
        
        // data validation
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        // JWTAuth
        $token = JWTAuth::attempt([
            "email" => $request->email,
            "password" => $request->password
        ]);
        
        if(!empty($token)){
            $user=auth()->user();
            $user->token=$token;
            $user->save();
            
            // dd($user);
            return redirect()->route('me');
            // return route('me');
        }


        return response()->json([
            "status" => false,
            "message" => "Invalid details"
        ]);
    }


    // To generate refresh token value
    public function refreshToken(){
        
        $newToken = auth()->refresh();
        $user=auth()->user();

        $user->update(['token'=>$newToken]);

        return response()->json([
            "status" => true,
            "message" => "New access token",
            "token" => $newToken
        ]);
    }

    // User Logout (GET)
    public function logout(){
        
        $user=auth()->user();
        $user->update(['token'=>null]);
        auth()->logout();

        return response()->json([
            "status" => true,
            "message" => "User logged out successfully"
        ]);
    }
}
