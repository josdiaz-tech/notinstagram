<?php if(Auth::user()->image): ?>
    <img  class="avatar-form" src="<?php echo e(route('user.avatar',['filename'=>Auth::user()->image] )); ?>"/> 
<?php endif; ?>
