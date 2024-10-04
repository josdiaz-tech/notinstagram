{{-- comprobar si el usuario dio like a la imagen --}}
@php $user_like = false; @endphp
@foreach ($image->likes as $like)
    @if ($like->user->id == Auth::user()->id)
        @php $user_like = true; @endphp
    @endif
@endforeach

{{-- Cambiar el tipo de icono dependiendo del caso --}}
<a>
    @if ($user_like)
        <i class="fa-solid fa-heart fa-xl likes" data-id="{{ $image->id }}" data-toogle="tooltip" data-placement="top"
            title="{{ count($image->likes) }} likes"></i>
    @else
        <i class="fa-regular fa-heart fa-xl dislikes" data-id="{{ $image->id }}" data-toogle="tooltip"
            data-placement="top" title="{{ count($image->likes) }} likes"></i>
    @endif
</a>
