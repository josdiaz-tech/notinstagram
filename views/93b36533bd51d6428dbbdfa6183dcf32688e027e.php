
<?php $user_like = false; ?>
<?php $__currentLoopData = $image->likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($like->user->id == Auth::user()->id): ?>
        <?php $user_like = true; ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<a>
    <?php if($user_like): ?>
        <i class="fa-solid fa-heart fa-xl likes" data-id="<?php echo e($image->id); ?>" data-toogle="tooltip" data-placement="top"
            title="<?php echo e(count($image->likes)); ?> likes"></i>
    <?php else: ?>
        <i class="fa-regular fa-heart fa-xl dislikes" data-id="<?php echo e($image->id); ?>" data-toogle="tooltip"
            data-placement="top" title="<?php echo e(count($image->likes)); ?> likes"></i>
    <?php endif; ?>
</a>
