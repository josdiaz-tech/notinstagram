@if(Auth::user()->image)
    <img  class="avatar-form" src="{{route('user.avatar',['filename'=>Auth::user()->image] )}}"/> 
@endif
