<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5">
                <?php echo $__env->make('includes.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!--aqui esta toda la vista que hace las publicaciones en la pagina de inicio-->
                    <?php echo $__env->make('includes.image', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    
                    

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- PAGINACION -->
                <!--pager abajo-->
                <div class="col-1">
                    <?php echo e($images->links()); ?>

                </div>

                
            </div>

            <!-- PAGINACION -- pager arriba-->
            <!--
                    <div class="clearfix"></div>
                    
                    -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>