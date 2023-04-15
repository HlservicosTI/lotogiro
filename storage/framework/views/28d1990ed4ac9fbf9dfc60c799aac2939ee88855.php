<?php $__env->startSection('title', 'Pagamentos - Prêmios'); ?>

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
    $html = \Livewire\Livewire::mount('pages.bets.payments.draw.table')->html();
} elseif ($_instance->childHasBeenRendered('CWMVw9y')) {
    $componentId = $_instance->getRenderedChildComponentId('CWMVw9y');
    $componentTag = $_instance->getRenderedChildComponentTagName('CWMVw9y');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('CWMVw9y');
} else {
    $response = \Livewire\Livewire::mount('pages.bets.payments.draw.table');
    $html = $response->html();
    $_instance->logRenderedChild('CWMVw9y', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/pages/bets/payment/draw/index.blade.php ENDPATH**/ ?>