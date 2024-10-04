<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5">
                <?php echo $__env->make('includes.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="data-user-bio mb-5 ajustar-a-post">


                    <?php if($user->image): ?>
                        <div class="container-avatar">
                            <img src="<?php echo e(route('user.avatar', ['filename' => $user->image])); ?>" class="avatar">
                        </div>
                    <?php endif; ?>

                    <div class="user-info-bio">
                        <h2><?php echo e($user->nick); ?></h2>
                        <h3><?php echo e($user->name . ' ' . $user->surname); ?></h3>

                    </div>
                </div>
                <div class="clearfix"></div>
                <hr class="separador-ajustado">
                <?php $__currentLoopData = $user->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!--aqui esta toda la vista que hace las publicaciones en la pagina de inicio-->
                    <?php echo $__env->make('includes.image', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>