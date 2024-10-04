@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <div class="card  pl-4 pr-4">

                    <div class="card-body">
                        <form method="POST" action="{{ route('image.update') }}" enctype="multipart/form-data">
                            @csrf

                            <h3 class="mt-4 mb-4 font-weight-bold">Editar Publicación</h3>
                            
                            <input type="hidden" name="image_id" value="{{$image->id}}">

                            <div class="form-group row">
                                <label for="image_path" class="col-md-6 col-form-label text-md-left">Imagen</label>
                                <div class="col-md-12">


                                    <div class="image-container">
                                        <a href="{{ route('image.detail', ['id' => $image->id]) }}">
                                            <img class="edit-image"
                                                src="{{ route('image.file', ['filename' => $image->image_path]) }}"
                                                alt="">
                                        </a>
                                    </div>


                                    <div class="contenedor-relativo mt-2">
                                        <input type="file" id="image_path" class="form-control-file" name="image_path"
                                             accept=".jpg, .jpeg, .png">
                                        <label for="image_path">Elegir imagen</label>
                                    </div>

                                    @if ($errors->has('image_path'))
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $errors->first('image_path') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-6 col-form-label text-md-left">Descripción</label>
                                <div class="col-md-12">
                                    <textarea id="description" class="form-control" name="description" required>{{ $image->description }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0 pt-4">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary w-100" value="Listo">

                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
