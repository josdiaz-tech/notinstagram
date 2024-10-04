@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5 card pub-image card-body">


                <form method="get" action="{{ route('user.index') }}" id="buscador">
                    <div class="row mt-3 align-items-center">

                        <div class="form-group col-8">
                            <input type="text" id="search" name="search" class="form-control"/>
                        </div>
                        <div class="form-group col-4 pl-0 ml-0">
                            <input type="submit" value="Buscar" class="btn btn-primary w-100"/>
                        </div>

                    </div>
                </form>
                <h1 class="font-weight-bold ml-0 mt-3 mb-0 ">Cuentas</h1>
                <hr>
                @include('includes.message')

                @foreach ($users as $user)
                    @if ($user->role == 'user')
                        <a href="{{ route('profile', ['id' => $user->id]) }}">
                            <div class="data-user-bio mb-4 mt-3 ">

                                @if ($user->image)
                                    <div class="container-avatar">
                                        <img src="{{ route('user.avatar', ['filename' => $user->image]) }}" class="avatar">
                                    </div>
                                @else
                                    <div class="container-avatar">
                                        <img src="storage/defecto.webp" class="avatar">
                                    </div>
                                @endif

                                <div class="user-info-bio">
                                    <h2>{{ $user->nick }}</h2>
                                    <h3>{{ $user->name . ' ' . $user->surname }}</h3>
                                    <span class="btn-link cuenta-link">Ir al perfil </span>
                                </div>
                            </div>
                        </a>
                        <div class="clearfix"></div>
                        <hr>
                    @endif
                @endforeach
                <!-- PAGINACION -->
                <!--pager abajo-->
                <div class="col-1">
                    {{ $users->links() }}
                </div>


            </div>
        </div>
    </div>
@endsection
