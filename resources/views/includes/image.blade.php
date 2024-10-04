<div class="card pub-image">
    <div class="card-header card-home">

        @if ($image->user->image)
            <div class="avatar-container">
                <img class="avatar-form" src="{{ route('user.avatar', ['filename' => $image->user->image]) }}" />
            </div>
        @else
            <div class="avatar-container">
                <img class="avatar-form" src="storage/defecto.webp" />
            </div>
        @endif

        <div class="data-user">
            <a href="{{ route('profile', ['id' => $image->user_id]) }}">
                {{ $image->user->nick }}
                <span class="separador">|</span>
                <span class="user-name">{{ $image->user->name . ' ' . $image->user->surname }}</span>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="image-container post-container">
            <a href="{{ route('image.detail', ['id' => $image->id]) }}">
            <img class="post-image" src="{{ route('image.file', ['filename' => $image->image_path]) }}" alt="">
        </div>

        <div class="btn-like-icons">
            @include('includes.btn_like')
        </div>

        <div class="btn-comentario">
            <a href="{{ route('image.detail', ['id' => $image->id]) }}">
                <i class="fa-regular fa-comment fa-flip-horizontal fa-xl"></i>
            </a>
        </div>
        <div class="btn-comentario btn-send">
            <i class="fa-regular fa-paper-plane fa-xl"></i>
        </div>

        <div class="description">
            <strong>{{ $image->user->nick . ' ' }}</strong>{{ $image->description }}
        </div>
        <div class="footer-publicacion">
            {{-- $image->created_at->diffForHumans() --}}
            <!--en ingles-->
            {{ \FormatTime::LongTimeFilter($image->created_at) }}
            @if (count($image->comments) == 0)
            @elseif(count($image->comments) == 1)
                <br><a href="{{ route('image.detail', ['id' => $image->id]) }}">Ver
                    {{ count($image->comments) }} comentario <i class="fa-solid fa-angle-down fa-xs"></i></a>
            @else
                <br><a href="{{ route('image.detail', ['id' => $image->id]) }}">Ver los
                    {{ count($image->comments) }} comentarios <i class="fa-solid fa-angle-down fa-xs"></i></a>
            @endif

            <form action="{{ route('comment.save') }}" method="post"
                class="row pl-3 justify-content-between align-items-start  form-comentario-detail">
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
        </div>



    </div>
</div>
