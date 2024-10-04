@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5">
                @include('includes.message')

                <div class="card pub-image">
                    <div class="card-header card-home">

                        @if ($image->user->image)
                            <div class="avatar-container">
                                <img class="avatar-form"
                                    src="{{ route('user.avatar', ['filename' => $image->user->image]) }}" />
                            </div>
                        @else
                            <div class="avatar-container">
                                <img class="avatar-form" src="..\storage\app\images\defecto.webp" />
                            </div>
                        @endif
                        <div class="data-user">
                            {{-- $image->user->name.' '.$image->user->surname. ' | @'. --}}
                            {{ $image->user->nick }}
                            <span class="separador">|</span>
                            <span class="user-name">{{ $image->user->name . ' ' . $image->user->surname }}</span>

                            @if (Auth::user() && Auth::user()->id == $image->user_id)
                                <ul class="acciones">
                                    <li class="nav-item dropdown">
                                        <a href="" class="tres-puntos" id="navbarDropdown"
                                            class="nav-link dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                            <svg aria-label="Más opciones" class="_ab6-" color="rgb(115, 115, 115)"
                                                fill="rgb(115, 115, 115)" height="24" role="img" viewBox="0 0 24 24"
                                                width="24">
                                                <circle cx="12" cy="12" r="1.5"></circle>
                                                <circle cx="6" cy="12" r="1.5"></circle>
                                                <circle cx="18" cy="12" r="1.5"></circle>
                                            </svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                            <a class="dropdown-item" href="{{ route('image.edit', ['id' => $image->id]) }}">
                                                Editar
                                            </a>

                                            <a class="dropdown-item" 
                                                id="borrarImg">Borrar
                                            </a>

                                        </div>

                                    </li>
                                </ul>
                                @include('includes.modal_delete')
                            @endif

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="image-container post-container">
                            <a href="{{ route('image.detail', ['id' => $image->id]) }}">
                                <img class="post-image" src="{{ route('image.file', ['filename' => $image->image_path]) }}"
                                    alt="">
                            </a>
                        </div>
                        <div class="btn-like-icons">
                            @include('includes.btn_like')
                        </div>
                        <div class="btn-comentario">
                            <a href="{{ route('image.detail', ['id' => $image->id]) }}">
                                <i class="fa-regular fa-comment fa-flip-horizontal fa-xl"></i>
                            </a>
                        </div>
                        <div class="btn-send btn-comentario">
                            <i class="fa-regular fa-paper-plane fa-xl"></i>
                        </div>
                        <div class="description">
                            <strong>{{ $image->user->nick . ' ' }}</strong>{{ $image->description }}
                        </div>
                        <div class="footer-publicacion">
                            {{-- $image->created_at->diffForHumans() --}}
                            <!--en ingles-->
                            {{ \FormatTime::LongTimeFilter($image->created_at) }}


                            <form action="{{ route('comment.save') }}" method="post"
                                class="row pl-3 justify-content-between align-items-start form-comentario-detail">
                                @csrf

                                <input type="hidden" name="image_id" value="{{ $image->id }}">
                                <!-- <input type="text"
                                                        class="form-control comentario-input border-0 pl-0 pt-0 col-sm-8 text-wrap"
                                                        placeholder="Agrega un comentario...">-->


                                <textarea cols="30" rows="1" name="content" oninput="auto_grow(this)"
                                    class="form-control {{ $errors->has('content') ? ' is-invalid' : '' }} comentario-input border-0 pl-0 pt-0 col-sm-9 text-wrap "
                                    placeholder="Agrega un comentario..."required> </textarea>
                                @if ($errors->has('content'))
                                    <span class="invalid-feedback pt-1" role="alert">
                                        <strong><i class="fa-regular fa-circle-xmark fa-lg"></i>
                                            {{ $errors->first('content') }}</strong>
                                    </span>
                                @endif

                                <button type="submit" class="btn btn-link pt-0 col-sm-3 publicar-comentario">Publicar</button>

                            </form>
                            <hr>
                            @foreach ($image->comments->sortByDesc('created_at') as $comment)
                                <p class="footer-comentarios">
                                    <strong>{{ $comment->user->nick . ' ' }}</strong>
                                    <span>{{ \FormatTime::LongTimeFilter($comment->created_at) }}</span>
                                    <br>
                                    {{ $comment->content }}
                                    @if (Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id))
                                        <br>
                                        <a class="small text-secondary "
                                            href="{{ route('comment.delete', ['id' => $comment->id]) }}">
                                            Eliminar
                                        </a>
                                    @endif
                                </p>
                            @endforeach


                        </div>


                    </div>


                </div>
            </div>
        </div>


    </div>
    </div>
@endsection
