<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::orderBy('id','desc')->paginate(5);
        // foreach($images as $image){
        //     echo $image->image_path."<br>";
        //     echo $image->user->name."<br>";
        // };die();
        return view('home', [
            'images'=> $images
        ]);
    }

    public function prueba(){
        return view('prueba');
    }

}
