@extends('layouts.app')

@section('content')
<!-- <h1>Configuración de mi cuenta</h1> -->
<!-- Vista del formulario para que el usuario pueda actualizar sus datos, se maneja a través de UserController, los datos son validados 
    y enviados en una ruta post al controlador, para su poseterio guardado en la db-->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            @include('includes.message')
            <div class="card  pl-4 pr-4">
                
                <div class="card-body row justify-content-center">
                    <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data" aria-label="Configuración de mi cuenta">
                        @csrf

                        <h3 class="mt-4 mb-4 font-weight-bold">Actualizar perfil</h3>
                       

                        <div class="form-group row">
                            <label for="name" class="col-md-6 col-form-label text-md-left">{{ __('Name') }}</label>
                            
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::user()->name }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{-- ACÁ AGREGUÉ DOS CAMPOS MÁS AL FORMULARIO DE REGISTRO: 'surname' y 'nick' --}}
                        <div class="form-group row">
                            <label for="surname" class="col-md-5 col-form-label text-md-left">{{ __('Apellido') }}</label>

                            <div class="col-md-12">
                                <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{Auth::user()->surname }}" required autofocus>

                                @if ($errors->has('surname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('surname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="nick" class="col-md-5 col-form-label text-md-left">{{ __('Nick') }}</label>
                            
                            <div class="col-md-12">
                                
                                <input id="nick" type="text" class="form-control{{ $errors->has('nick') ? ' is-invalid' : '' }}" name="nick" value="{{ Auth::user()->nick }}" required autofocus>
                                
                                @if ($errors->has('nick'))
                                    <span class="invalid-feedback pt-1" role="alert">
                                        <strong><i class="fa-regular fa-circle-xmark fa-lg"></i> {{ $errors->first('nick') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>

                        {{--FIN DEL CODIGO AÑADIDO--}}

                        <div class="form-group row">
                            <label for="email" class="col-md-5 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        
                            <label for="image_path" class="col-md-5 col-form-label text-md-left">{{ __('Avatar') }}</label>
                                
                            <div class="col-md-12 avatar-config-form">
                                @include('includes.avatar')
                               
                                <div class="contenedor-relativo">

                                    <input id="image_path" type="file" class="form-control-file{{ $errors->has('image_path') ? ' is-invalid' : '' }}" name="image_path"
                                    accept=".jpg, .jpeg, .png">
                                    <label for="image_path">Elegir imagen</label>
                                                                
                                    @if ($errors->has('image_path'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image_path') }}</strong>
                                        </span>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    

                        <div class="form-group row mb-0 pt-4">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100">
                                   Guardar Cambios
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection