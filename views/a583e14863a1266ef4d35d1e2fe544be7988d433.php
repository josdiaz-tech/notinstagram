<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5">
                <?php echo $__env->make('includes.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="card pub-image">
                    <div class="card-header card-home">

                        <?php if($image->user->image): ?>
                            <div class="avatar-container">
                                <img class="avatar-form"
                                    src="<?php echo e(route('user.avatar', ['filename' => $image->user->image])); ?>" />
                            </div>
                        <?php else: ?>
                            <div class="avatar-container">
                                <img class="avatar-form" src="..\storage\app\images\defecto.webp" />
                            </div>
                        <?php endif; ?>
                        <div class="data-user">
                            
                            <?php echo e($image->user->nick); ?>

                            <span class="separador">|</span>
                            <span class="user-name"><?php echo e($image->user->name . ' ' . $image->user->surname); ?></span>

                            <?php if(Auth::user() && Auth::user()->id == $image->user_id): ?>
                                <ul class="acciones">
                                    <li class="nav-item dropdown">
                                        <a href="" class="tres-puntos" id="navbarDropdown"
                                            class="nav-link dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                            <svg aria-label="Más opciones" class="_ab6-" color="rgb(115, 115, 115)"
                                                fill="rgb(115, 115, 115)" height="24" role="img" viewBox="0 0 24 24"
                                                width="24">
                                                <circle cx="12" cy="12" r="1.5"></circle>
                                                <circle cx="6" cy="12" r="1.5"></circle>
                                                <circle cx="18" cy="12" r="1.5"></circle>
                                            </svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                            <a class="dropdown-item" href="<?php echo e(route('image.edit', ['id' => $image->id])); ?>">
                                                Editar
                                            </a>

                                            <a class="dropdown-item" 
                                                id="borrarImg">Borrar
                                            </a>

                                        </div>

                                    </li>
                                </ul>
                                <?php echo $__env->make('includes.modal_delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="image-container post-container">
                            <a href="<?php echo e(route('image.detail', ['id' => $image->id])); ?>">
                                <img class="post-image" src="<?php echo e(route('image.file', ['filename' => $image->image_path])); ?>"
                                    alt="">
                            </a>
                        </div>
                        <div class="btn-like-icons">
                            <?php echo $__env->make('includes.btn_like', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                        <div class="btn-comentario">
                            <a href="<?php echo e(route('image.detail', ['id' => $image->id])); ?>">
                                <i class="fa-regular fa-comment fa-flip-horizontal fa-xl"></i>
                            </a>
                        </div>
                        <div class="btn-send btn-comentario">
                            <i class="fa-regular fa-paper-plane fa-xl"></i>
                        </div>
                        <div class="description">
                            <strong><?php echo e($image->user->nick . ' '); ?></strong><?php echo e($image->description); ?>

                        </div>
                        <div class="footer-publicacion">
                            
                            <!--en ingles-->
                            <?php echo e(\FormatTime::LongTimeFilter($image->created_at)); ?>



                            <form action="<?php echo e(route('comment.save')); ?>" method="post"
                                class="row pl-3 justify-content-between align-items-start form-comentario-detail">
                                <?php echo csrf_field(); ?>

                                <input type="hidden" name="image_id" value="<?php echo e($image->id); ?>">
                                <!-- <input type="text"
                                                        class="form-control comentario-input border-0 pl-0 pt-0 col-sm-8 text-wrap"
                                                        placeholder="Agrega un comentario...">-->


                                <textarea cols="30" rows="1" name="content" oninput="auto_grow(this)"
                                    class="form-control <?php echo e($errors->has('content') ? ' is-invalid' : ''); ?> comentario-input border-0 pl-0 pt-0 col-sm-9 text-wrap "
                                    placeholder="Agrega un comentario..."required> </textarea>
                                <?php if($errors->has('content')): ?>
                                    <span class="invalid-feedback pt-1" role="alert">
                                        <strong><i class="fa-regular fa-circle-xmark fa-lg"></i>
                                            <?php echo e($errors->first('content')); ?></strong>
                                    </span>
                                <?php endif; ?>

                                <button type="submit" class="btn btn-link pt-0 col-sm-3 publicar-comentario">Publicar</button>

                            </form>
                            <hr>
                            <?php $__currentLoopData = $image->comments->sortByDesc('created_at'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p class="footer-comentarios">
                                    <strong><?php echo e($comment->user->nick . ' '); ?></strong>
                                    <span><?php echo e(\FormatTime::LongTimeFilter($comment->created_at)); ?></span>
                                    <br>
                                    <?php echo e($comment->content); ?>

                                    <?php if(Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id)): ?>
                                        <br>
                                        <a class="small text-secondary "
                                            href="<?php echo e(route('comment.delete', ['id' => $comment->id])); ?>">
                                            Eliminar
                                        </a>
                                    <?php endif; ?>
                                </p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </div>


                    </div>


                </div>
            </div>
        </div>


    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>