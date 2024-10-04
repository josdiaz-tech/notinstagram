<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;
use App\Image;

class UserController extends Controller
{
    //constructor para solo permitir a usuarios autenticados
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($search = null)
    {

        if (!empty($search)) {
            $users = User::where('nick', 'LIKE', '%' . $search . '%')
                ->orWhere('name', 'LIKE', '%' . $search . '%')
                ->orWhere('surname', 'LIKE', '%' . $search . '%')
                ->orderBy('id', 'desc')
                ->paginate(5);
        } else {
            $users = User::orderBy('id', 'desc')->paginate(5); //acceder a los usuarios
        }

        return view('user.index', [
            'users' => $users
        ]);
    }

    public function config()
    {
        return view('user.config');
    }

    public function update(Request $request)
    {

        //Conseguir usuario identificado
        $user = \Auth::user();
        $id = $user->id;
        //Validar datos ingresados por el usuario
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            // añadiendo 'surname' y 'nick' al controlador de registros
            'surname' => 'required|string|max:255',
            'nick' => 'required|string|max:255|unique:users,nick,' . $id,
            // fin del añadido
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'image_path' => 'mimes:jpg,jpeg,png,webp',

        ]);

        //Recoger datos del formulario
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');

        //Subir la imagen
        $image_path = $request->file('image_path');
        // var_dump($image_path); die(); 
        if ($image_path) {
            //poner nombre único
            $image_path_name = time() . $image_path->getClientOriginalName();

            //Guardar en la carpeta Storage
            Storage::disk('users')->put($image_path_name, File::get($image_path));

            //seteo el nombre de la imagen en el objeto, en la DB el campo se llama image, no image_path, por eso $user->image
            $user->image = $image_path_name;
        }


        //asignar nuevos valores al objeto de usuario
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;

        //ejecutar consulta y cambios en la base de datos
        $user->update();

        return  redirect()->route('config')
            ->with(['message' => 'Usuario actualizado correctamente']);
    }

    public function getImage($filename)
    {
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }

    public function profile($id)
    {
        $user = User::find($id);

        return view('user.profile', [
            'user' => $user
        ]);
    }
}
