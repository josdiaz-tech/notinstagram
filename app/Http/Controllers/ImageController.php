<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Comment;
use App\Like;
use App\Image;

class ImageController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }


    public function create(){
        return view('image.create');
    }

    public function save(Request $request){
        //Validacion
        $validate = $this->validate($request, [
            'description'=>'required',
            'image_path' =>'required|mimes:jpg,jpeg,png,gif,webp'
        ]);

        //Recoger Datos
        $image_path = $request->file('image_path');
        $description = $request->input('description');

        // var_dump(['img'=>$image_path,'desc'=>$description]); die();
        
        //Asignar valores nuevo objeto
        $user = \Auth::user();

        $image = new Image(); //Model Image creado
        $image->user_id = $user->id;
        $image->description =$description;

        //Subir Imagen
        if($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $image->image_path = $image_path_name;
        }

        //Guardar
        $image->save();

        return redirect()->route('home')->with(['message'=> 'La foto ha sido subida correctamente!!']);

    }

    public function getImage($filename){
        $file = Storage::disk('images')->get($filename);

        return new Response($file,200);
    }

    public function detail($id){
        $image = Image::find($id);

        return view('image.detail',[
            'image'=> $image
        ]);
    }

    public function delete($id){
        $user = \Auth::user();

        $image = Image::find($id);
        $comments = Comment::where("image_id",$id)->get();
        $likes = Like::where('image_id',$id)->get();

        if($user && $image && $image->user_id == $user->id)
        {
            //Eliminar comentarios
            if($comments && count($comments)>=1){
                foreach($comments as $comment){
                    $comment->delete();
                }
            }
            //Eliminar like
            if($likes && count($likes)>=1){
                foreach($likes as $like){
                    $like->delete();
                }
            }
            //Eliminar ficheros de imagen
            Storage::disk('images')->delete($image->image_path);
            
            //Eliminar registro de imagen
            $image->delete();

            $message = array('message'=>'la imagen se ha borrado correctamente');


        }else{
            $message = array('message'=>'la imagen NO se ha borrado');
        }
        return redirect()->route('home')
                            ->with($message);
    }

    public function edit($id){
        $user = \Auth::user();
        $image = Image::find($id);

        if($user && $image && $image->user_id == $user->id){

            return view('image.edit',[
                'image'=>$image
            ]);
        }else{
            return redirect()->route('home');
        }

    }

    public function update(Request $request){

        //Validacion
        $validate = $this->validate($request, [
            'description'=>'required',
            'image_path' =>'mimes:jpg,jpeg,png,gif,webp'
        ]);

        $image_id = $request->input('image_id');
        $image_path = $request->file('image_path');
        $description = $request->input('description');
        // var_dump(["img_id"=>$image_id, "description"=>$description]);die();
        
        //Conseguir objeto imagen
        $image = Image::find($image_id);
        $image->description = $description;


         //Subir Imagen
        if($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $image->image_path = $image_path_name;
        }

        //Actualizar Imagen
        $image->update();

        return redirect()->route('image.detail', ['id'=>$image_id])
                        ->with(['message'=>'Imagen actualizada exitosamente']);


    }

}
