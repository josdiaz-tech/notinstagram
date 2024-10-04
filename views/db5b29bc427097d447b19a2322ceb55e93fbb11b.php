<?php $__env->startSection('content'); ?>
<!-- <h1>Configuración de mi cuenta</h1> -->
<!-- Vista del formulario para que el usuario pueda actualizar sus datos, se maneja a través de UserController, los datos son validados 
    y enviados en una ruta post al controlador, para su poseterio guardado en la db-->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <?php echo $__env->make('includes.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="card  pl-4 pr-4">
                
                <div class="card-body row justify-content-center">
                    <form method="POST" action="<?php echo e(route('user.update')); ?>" enctype="multipart/form-data" aria-label="Configuración de mi cuenta">
                        <?php echo csrf_field(); ?>

                        <h3 class="mt-4 mb-4 font-weight-bold">Actualizar perfil</h3>
                       

                        <div class="form-group row">
                            <label for="name" class="col-md-6 col-form-label text-md-left"><?php echo e(__('Name')); ?></label>
                            
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(Auth::user()->name); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="surname" class="col-md-5 col-form-label text-md-left"><?php echo e(__('Apellido')); ?></label>

                            <div class="col-md-12">
                                <input id="surname" type="text" class="form-control<?php echo e($errors->has('surname') ? ' is-invalid' : ''); ?>" name="surname" value="<?php echo e(Auth::user()->surname); ?>" required autofocus>

                                <?php if($errors->has('surname')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('surname')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="nick" class="col-md-5 col-form-label text-md-left"><?php echo e(__('Nick')); ?></label>
                            
                            <div class="col-md-12">
                                
                                <input id="nick" type="text" class="form-control<?php echo e($errors->has('nick') ? ' is-invalid' : ''); ?>" name="nick" value="<?php echo e(Auth::user()->nick); ?>" required autofocus>
                                
                                <?php if($errors->has('nick')): ?>
                                    <span class="invalid-feedback pt-1" role="alert">
                                        <strong><i class="fa-regular fa-circle-xmark fa-lg"></i> <?php echo e($errors->first('nick')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="email" class="col-md-5 col-form-label text-md-left"><?php echo e(__('E-Mail Address')); ?></label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(Auth::user()->email); ?>" required>

                                <?php if($errors->has('email')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                        
                            <label for="image_path" class="col-md-5 col-form-label text-md-left"><?php echo e(__('Avatar')); ?></label>
                                
                            <div class="col-md-12 avatar-config-form">
                                <?php echo $__env->make('includes.avatar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                               
                                <div class="contenedor-relativo">

                                    <input id="image_path" type="file" class="form-control-file<?php echo e($errors->has('image_path') ? ' is-invalid' : ''); ?>" name="image_path"
                                    accept=".jpg, .jpeg, .png">
                                    <label for="image_path">Elegir imagen</label>
                                                                
                                    <?php if($errors->has('image_path')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('image_path')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                    
                                </div>
                            </div>
                        </div>
                    

                        <div class="form-group row mb-0 pt-4">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100">
                                   Guardar Cambios
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>