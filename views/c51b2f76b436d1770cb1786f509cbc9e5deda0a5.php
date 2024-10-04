<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <div class="card  pl-4 pr-4">

                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('image.update')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <h3 class="mt-4 mb-4 font-weight-bold">Editar Publicación</h3>
                            
                            <input type="hidden" name="image_id" value="<?php echo e($image->id); ?>">

                            <div class="form-group row">
                                <label for="image_path" class="col-md-6 col-form-label text-md-left">Imagen</label>
                                <div class="col-md-12">


                                    <div class="image-container">
                                        <a href="<?php echo e(route('image.detail', ['id' => $image->id])); ?>">
                                            <img class="edit-image"
                                                src="<?php echo e(route('image.file', ['filename' => $image->image_path])); ?>"
                                                alt="">
                                        </a>
                                    </div>


                                    <div class="contenedor-relativo mt-2">
                                        <input type="file" id="image_path" class="form-control-file" name="image_path"
                                             accept=".jpg, .jpeg, .png">
                                        <label for="image_path">Elegir imagen</label>
                                    </div>

                                    <?php if($errors->has('image_path')): ?>
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong><?php echo e($errors->first('image_path')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-6 col-form-label text-md-left">Descripción</label>
                                <div class="col-md-12">
                                    <textarea id="description" class="form-control" name="description" required><?php echo e($image->description); ?></textarea>

                                    <?php if($errors->has('description')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('description')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row mb-0 pt-4">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary w-100" value="Listo">

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