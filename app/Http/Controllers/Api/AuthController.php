<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class AuthController extends Controller
{
    /**
     * @param Request $request
     *
     */
    public function register(Request $request){
        return "Beatrice";
        //validate user inputs
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'password' =>'required'
        ]);
        /**
         * if input valid check if the user exists in the database
         * if user does not exist save the new user into the database
         */
        $user = User::firstOrNew(['email'=>$request->email]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        /**
         * return response in JSON formart
         */
        $http = new Client;

        $response = $http->post(url('oauth/token'), [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => '5',
                'client_secret' => 'rVYYZQQv1flkqS2Dccst92dWA4ISZID9o3ovcKux',
                'username' => $request->email,
                'password' => $request->password,
                'scope' => '',
            ],
        ]);

        return response(['data' => json_decode((string) $response->getBody(), true)]);

    }

    public function login(Request $request){

    }
}
