<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterController extends BaseController
{
    public function store(Request $request)
    {
    
        $userData = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
           
        ]);

        

        if ($userData) {
           
            // dd($request['name']);
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

            if ($user) {
                return response()->json([
                    'msg' => 'user added succusfully',
                    'token' => $user->createToken('token')->plainTextToken
                ]);
            }
        } else {
            return response()->json([
                'error' => $userData
            ]);
        }
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            // dd($user);
            $success['token'] =  $user->createToken('token')->plainTextToken;
            $success['name'] =  $user->name;

            return $this->sendResponse($success, 'User login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }

    public function logout()
    {
        $user = Auth::user();
        // dd($user);
        return [
            'message' => 'user logged out'
        ];
    }
}