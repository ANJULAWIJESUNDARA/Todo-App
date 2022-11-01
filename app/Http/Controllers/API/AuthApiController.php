<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{
    public function login(Request $request)
    {
    
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            //'remember_me' => 'boolean'
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();

            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            $success['token'] = '$2y$10$T2yzviuy7cYIbTEECRVm7uwQp4Oq6WPhvkQJ54tReTyk8EMwKym46';

            $success['name'] =  $user->name;
            return  response()->json(compact('success'),200);
        }
        else{
            $msg = array(
                'status' => 'error',
                'message' => 'Some Thing Went To Wrong',
            );
            return $msg;
        }
    }
}
