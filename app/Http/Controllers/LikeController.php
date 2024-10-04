<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

        $user=\Auth::user();
        $likes = Like::where('user_id',$user->id)->orderBy('id', 'asc')->paginate(5);

        return view('like.index', [
            'likes'=> $likes
        ]);
    }


    public function like($image_id){
        //Recoger datos de usuario e imagen
        $user=\Auth::user();
        
        //COndicion para no duplicar el like de una persona
        $isset_like = Like::where('user_id',$user->id)
                            ->where('image_id',$image_id)
                            ->count();

        if($isset_like==0){
            $like = new Like();
            $like->user_id = $user->id;
            $like->image_id = (int)$image_id; //(int) para que se guarde como int y no como string
            //Guardar datos
            $like->save();

            //vamos a usar json para poder usarlo con javascrio
            return response()->json([
                'like'=>$like
            ]);

        }else{
            return response()->json([
                'message'=>"El like ya existe"
            ]);
        }


    }
    public function dislike($image_id){
        //Recoger datos de usuario e imagen
        $user=\Auth::user();
        
        //COndicion para no duplicar el like de una persona
        $like = Like::where('user_id',$user->id)
                            ->where('image_id',$image_id)
                            ->first();

        if($like){
          
            //borrar datos
            $like->delete();

            //vamos a usar json para poder usarlo con javascrio
            return response()->json([
                'like'=>$like,
                'message'=>'has dado dislike correctamente'
            ]);

        }else{
            return response()->json([
                'message'=>"El like no existe"
            ]);
        }
    }

}
