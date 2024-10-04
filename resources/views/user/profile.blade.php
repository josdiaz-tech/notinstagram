@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5">
                @include('includes.message')

                <div class="data-user-bio mb-5 ajustar-a-post">


                    @if ($user->image)
                        <div class="container-avatar">
                            <img src="{{ route('user.avatar', ['filename' => $user->image]) }}" class="avatar">
                        </div>
                    @endif

                    <div class="user-info-bio">
                        <h2>{{ $user->nick }}</h2>
                        <h3>{{ $user->name . ' ' . $user->surname }}</h3>

                    </div>
                </div>
                <div class="clearfix"></div>
                <hr class="separador-ajustado">
                @foreach ($user->images as $image)
                    <!--aqui esta toda la vista que hace las publicaciones en la pagina de inicio-->
                    @include('includes.image')
                    {{-- también se puede así pero esta vez no es necesario --}}
                    {{-- @include('includes.image', ['image'=>$image]) --}}
                @endforeach


            </div>
        </div>
    </div>
@endsection
