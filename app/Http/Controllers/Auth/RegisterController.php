<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    # como no queremos que nos rediriga a Home, hacemos
    // protected $redirectTo = '/home';
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // También edité el middleware 'RedirectIfAuthencticated' para que fuera al directorio '/' en vez de '/home'
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            // añadiendo 'surname' y 'nick' al controlador de registros
            'surname' => 'required|string|max:255',
            'nick' => 'required|string|max:255|unique:users',
            // fin del añadido
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'role' => 'user',
            'name' => $data['name'],
            //Añadi surname y nick
            'surname' => $data['surname'],
            'nick' => $data['nick'],
            //fin del añadido
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
