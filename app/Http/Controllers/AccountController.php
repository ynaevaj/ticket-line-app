<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Account;
use Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class AccountController extends Controller
{
    public function register(Request $request){
        
        $validator = Validator::make($request->all(),[
            'username' => 'required|unique:account',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => "Registration Unsuccessful",
                'errors' => $validator->errors()
            ]);
        }

        $data = $request->all();
        $account_id = Account::insertGetId([
            'username' => $data['username'],
            'password' => Hash::make($request->password)

        ]);
        $user = User::create([
            'account_id' => $account_id,
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        $token = $user->createToken('API Token')->accessToken;
        $result = [
            'user' => $user,
            'token' => $token,
            'message' => 'Registration Successful'
        ];
        return response()->json($result);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required'],
            'password' => ['required']
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => "Login Unsuccessful",
                'errors' => $validator->errors()
            ]);
        }

        $data = $request->all();
        $account = Account::where('username', '=', $data['username'])->first();

        if($account){
            $user = User::where('account_id', '=', $account->id)->first();
            if(Hash::check($data['password'], $account['password'])){
                $token = $account->createToken('API Token')->accessToken;
                $result = [
                    'user' => $user, 
                    'token' => $token,
                    'message' => 'Login Successful'
                ]; 
                return response()->json($result);
            }else{
                return response()->json(['message' => 'username and password do not match']);
            }
        }else{
            return response()->json(['message' => 'Can not find username']);
        }

    }

    public function logout(){
        if(Auth::check()){
            Auth::user()->token()->revoke();
            return response()->json(['message' => 'User logged out successfully'], 200);
        }else{
            return response()->json(['message' => 'Something went wrong. Please try again.'], 500);
        }
    }
}
