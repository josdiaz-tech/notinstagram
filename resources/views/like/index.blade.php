@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5">

                <div class="card pub-image">
                    <div class="card-body">
                        <h2 class="mt-4 mb-4 ml-4 font-weight-bold">Mis imagenes favoritas</h2>
                    </div>
                </div>

                @foreach ($likes as $like)
                    @include('includes.image', ['image' => $like->image])
                @endforeach

                {{-- ojo la variable del paginador cambia porque es diferente el controlador usado --}}
                <div class="col-1">
                    {{ $likes->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
