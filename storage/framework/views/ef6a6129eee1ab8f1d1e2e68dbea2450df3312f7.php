<?php $__env->startSection('title', trans('admin.games.create-page-title')); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-md-12">
        <section class="content">
            <form action="<?php echo e(route('admin.bets.games.store')); ?>" method="POST" id="form_game">
                <?php echo csrf_field(); ?>
                <?php echo method_field('POST'); ?>
                <?php echo $__env->make('admin.pages.bets.game._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </form>
        </section>
    </div>
<!-- INICIO MODAL  Editar Evento -->
         <div class="modal fade" id="modal-enviar">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
              <h4 class="modal-title"><?php echo e(trans('admin.games.create-game-xml')); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
              <form action="<?php echo e(route('admin.bets.games.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

             
              <div class="form-row">
              <div class="form-group col-md-12">
                <label for="client"><?php echo e(trans('admin.customer')); ?></label>
                <select class="custom-select <?php $__errorArgs = ['client'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="client" id="clients" required>
                    <option selected value=""><?php echo e(trans('admin.customer')); ?></option>
                    <?php if(isset($clients) && $clients->count() > 0): ?>
                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($client->id); ?>"><?php echo e(\App\Helper\Mask::addMaskCpf($client->cpf) .' - '. $client->name.' '. $client->last_name . ' - ' . $client->email . ' - '. \App\Helper\Mask::addMaksPhone($client->ddd.$client->phone)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </select>
              </div>
              </div>
               <div class="row">
              <div class="col-12">
              <?php echo e(trans('admin.file')); ?>:
              <input class="form-control"  type="file" value="" name="arq" required>
              <input type="hidden" class="form-control" id="type_game" name="type_game" value="<?php echo e($typeGame->id); ?>">
              <input hidden value="1" id="xml" name="xml"> 
              </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-info"><?php echo e(trans('admin.create')); ?></button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(trans('admin.close')); ?></button>

                </form>
              </div>
            </div>
             <!--/.modal-content -->
          </div>
           <!--/.modal-dialog -->
        </div>
        <!-- /.modal -->
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>

    <script>



    </script>

<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/pages/bets/game/create.blade.php ENDPATH**/ ?>