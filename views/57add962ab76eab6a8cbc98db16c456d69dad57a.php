<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <div class="card  pl-4 pr-4">

                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('image.save')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <h3 class="mt-4 mb-4 font-weight-bold">Crear una Nueva Publicación</h3>

                            <div class="form-group row">
                                <label for="image_path" class="col-md-5 col-form-label text-md-left">Imagen</label>
                                <div class="col-md-12">
                                    <div class="contenedor-relativo">
                                        <input type="file" id="image_path" class="form-control-file" name="image_path"
                                            required accept=".jpg, .jpeg, .png" >
                                        <label for="image_path">Elegir imagen</label>

                                        <?php if($errors->has('image_path')): ?>
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong><?php echo e($errors->first('image_path')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-6 col-form-label text-md-left">Descripción</label>
                                <div class="col-md-12">
                                    <textarea id="description" class="form-control" name="description" required></textarea>

                                    <?php if($errors->has('description')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('description')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row mb-0 pt-4">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary w-100" value="Subir imagen">

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