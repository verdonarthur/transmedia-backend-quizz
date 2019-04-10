<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Firebase\JWT\JWT;
use App\User;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


/**
 * Inspired from https://medium.com/tech-tajawal/jwt-authentication-for-lumen-5-6-2376fd38d454
 */
class UserCtrl extends BaseController
{
    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    private $request;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Create a new token.
     * 
     * @param  \App\User   $user
     * @return string
     */
    protected function jwt(User $user)
    {
        $payload = [
            'iss' => "transmedia-backend-quizz", // Issuer of the token
            'sub' => $user->id, // Subject of the token
            'iat' => time(), // Time when JWT was issued. 
            'exp' => time() + 60 * 60 // Expiration time
        ];

        return JWT::encode($payload, env('JWT_SECRET'));
    }

    /**
     * Log user
     * @return response
     */
    public function login()
    {
        $this->validate($this->request, [
            'login'     => 'required',
            'password'  => 'required'
        ]);

        $user = User::where('login', $this->request->input('login'))->first();

        if (!$user) {
            return response()->json([
                'error' => 'Login does not exist.'
            ], 400);
        }

        // Verify the password and generate the token
        if (Hash::check($this->request->input('password'), $user->password)) {
            return response()->json([
                'token' => $this->jwt($user)
            ], 200);
        }

        // Bad Request response
        return response()->json([
            'error' => 'Login or password is wrong.'
        ], 400);
    }
}
