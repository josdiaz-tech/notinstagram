@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5">
                @include('includes.message')

                @foreach ($images as $image)
                    <!--aqui esta toda la vista que hace las publicaciones en la pagina de inicio-->
                    @include('includes.image')
                    {{-- también se puede así pero esta vez no es necesario --}}
                    {{-- @include('includes.image', ['image'=>$image]) --}}

                @endforeach
                <!-- PAGINACION -->
                <!--pager abajo-->
                <div class="col-1">
                    {{ $images->links() }}
                </div>

                
            </div>

            <!-- PAGINACION -- pager arriba-->
            <!--
                    <div class="clearfix"></div>
                    {{-- $images->links() --}}
                    -->
        </div>
    </div>
@endsection
