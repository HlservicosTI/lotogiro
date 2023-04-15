<?php $__env->startSection('title', trans('admin.extracts.page-title')); ?>

<?php $__env->startSection('content'); ?>
    <?php $__errorArgs = ['success'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <?php $__env->startPush('scripts'); ?>
        <script>
            toastr["success"]("<?php echo e($message); ?>")
        </script>
    <?php $__env->stopPush(); ?>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <?php $__errorArgs = ['error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <?php $__env->startPush('scripts'); ?>
        <script>
            toastr["error"]("<?php echo e($message); ?>")
        </script>
    <?php $__env->stopPush(); ?>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <div class="row bg-white p-3">
        <div class="col-md-12">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('pages.dashboards.extract.table')->html();
} elseif ($_instance->childHasBeenRendered('nvxbTSm')) {
    $componentId = $_instance->getRenderedChildComponentId('nvxbTSm');
    $componentTag = $_instance->getRenderedChildComponentTagName('nvxbTSm');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('nvxbTSm');
} else {
    $response = \Livewire\Livewire::mount('pages.dashboards.extract.table');
    $html = $response->html();
    $_instance->logRenderedChild('nvxbTSm', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
    <div class="modal fade" id="modal_delete_game" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><?php echo e(trans('admin.exclude-game-title')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo e(trans('admin.exclude-game-text')); ?>

                </div>
                <div class="modal-footer">
                    <form id="destroy" action="" method="POST">
                        <?php echo method_field('DELETE'); ?>
                        <?php echo csrf_field(); ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(trans('admin.exclude-game-cancel')); ?></button>
                        <button type="submit" class="btn btn-danger"><?php echo e(trans('admin.exclude-game-confirm')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <script type="text/javascript">
        $(document).on('click', '#btn_delete_game', function () {
            var game = $(this).attr('game');
            var url = '<?php echo e(route("admin.bets.games.destroy", ":game")); ?>';
            url = url.replace(':game', game);
            $("#destroy").attr('action', url);
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/pages/dashboards/extracts/index.blade.php ENDPATH**/ ?>