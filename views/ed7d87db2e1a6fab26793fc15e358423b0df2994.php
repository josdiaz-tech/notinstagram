<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5 card pub-image card-body">


                <form method="get" action="<?php echo e(route('user.index')); ?>" id="buscador">
                    <div class="row mt-3 align-items-center">

                        <div class="form-group col-8">
                            <input type="text" id="search" name="search" class="form-control"/>
                        </div>
                        <div class="form-group col-4 pl-0 ml-0">
                            <input type="submit" value="Buscar" class="btn btn-primary w-100"/>
                        </div>

                    </div>
                </form>
                <h1 class="font-weight-bold ml-0 mt-3 mb-0 ">Cuentas</h1>
                <hr>
                <?php echo $__env->make('includes.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($user->role == 'user'): ?>
                        <a href="<?php echo e(route('profile', ['id' => $user->id])); ?>">
                            <div class="data-user-bio mb-4 mt-3 ">

                                <?php if($user->image): ?>
                                    <div class="container-avatar">
                                        <img src="<?php echo e(route('user.avatar', ['filename' => $user->image])); ?>" class="avatar">
                                    </div>
                                <?php else: ?>
                                    <div class="container-avatar">
                                        <img src="storage/defecto.webp" class="avatar">
                                    </div>
                                <?php endif; ?>

                                <div class="user-info-bio">
                                    <h2><?php echo e($user->nick); ?></h2>
                                    <h3><?php echo e($user->name . ' ' . $user->surname); ?></h3>
                                    <span class="btn-link cuenta-link">Ir al perfil </span>
                                </div>
                            </div>
                        </a>
                        <div class="clearfix"></div>
                        <hr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- PAGINACION -->
                <!--pager abajo-->
                <div class="col-1">
                    <?php echo e($users->links()); ?>

                </div>


            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>