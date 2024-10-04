<div class="card pub-image">
    <div class="card-header card-home">

        <?php if($image->user->image): ?>
            <div class="avatar-container">
                <img class="avatar-form" src="<?php echo e(route('user.avatar', ['filename' => $image->user->image])); ?>" />
            </div>
        <?php else: ?>
            <div class="avatar-container">
                <img class="avatar-form" src="storage/defecto.webp" />
            </div>
        <?php endif; ?>

        <div class="data-user">
            <a href="<?php echo e(route('profile', ['id' => $image->user_id])); ?>">
                <?php echo e($image->user->nick); ?>

                <span class="separador">|</span>
                <span class="user-name"><?php echo e($image->user->name . ' ' . $image->user->surname); ?></span>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="image-container post-container">
            <a href="<?php echo e(route('image.detail', ['id' => $image->id])); ?>">
            <img class="post-image" src="<?php echo e(route('image.file', ['filename' => $image->image_path])); ?>" alt="">
        </div>

        <div class="btn-like-icons">
            <?php echo $__env->make('includes.btn_like', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

        <div class="btn-comentario">
            <a href="<?php echo e(route('image.detail', ['id' => $image->id])); ?>">
                <i class="fa-regular fa-comment fa-flip-horizontal fa-xl"></i>
            </a>
        </div>
        <div class="btn-comentario btn-send">
            <i class="fa-regular fa-paper-plane fa-xl"></i>
        </div>

        <div class="description">
            <strong><?php echo e($image->user->nick . ' '); ?></strong><?php echo e($image->description); ?>

        </div>
        <div class="footer-publicacion">
            
            <!--en ingles-->
            <?php echo e(\FormatTime::LongTimeFilter($image->created_at)); ?>

            <?php if(count($image->comments) == 0): ?>
            <?php elseif(count($image->comments) == 1): ?>
                <br><a href="<?php echo e(route('image.detail', ['id' => $image->id])); ?>">Ver
                    <?php echo e(count($image->comments)); ?> comentario <i class="fa-solid fa-angle-down fa-xs"></i></a>
            <?php else: ?>
                <br><a href="<?php echo e(route('image.detail', ['id' => $image->id])); ?>">Ver los
                    <?php echo e(count($image->comments)); ?> comentarios <i class="fa-solid fa-angle-down fa-xs"></i></a>
            <?php endif; ?>

            <form action="<?php echo e(route('comment.save')); ?>" method="post"
                class="row pl-3 justify-content-between align-items-start  form-comentario-detail">
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
        </div>



    </div>
</div>
