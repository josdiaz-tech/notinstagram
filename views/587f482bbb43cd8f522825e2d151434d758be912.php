<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4">
           <i class="fa-regular fa-comment"></i>
            <div class="card">
                <div class="card-header bg-warning">

                </div>

<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
  Tooltip on top
</button>
                <div class="card-body">
                    <div class="row align-items-center justify-content-between">
                        <span class="col-5  h1 font-weight-bold">45</span>
                        
                        <h6 class="col-5">
                            <a href="" class="badge badge-pill badge-secondary p-2">Ver descripcion</a>
                        </h6>
                       
                    </div>

                    <div class="row  align-items-center justify-content-between">
                        <span class="col-7 h5 text-muted font-weight-bold">Valencia</span>
                        <span class="col-4 font-weight-bold h5">ABIERTA</span>
                    </div>
                    
                    <div class="row align-items-center">
                        <span class="col-8 text-muted h6">04/05/2023</span>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>


        <div class="row justify-content-center">
            <img src = "..\storage\app\images\escalamiento.svg" alt="imagen" 
             height="600"
            class="" />
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>