<?php $__env->startSection('title', 'Saque - Solicitações'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row bg-white p-3">
        <div class="col-md-12">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('pages.dashboards.wallet.withdraw.admin-list')->html();
} elseif ($_instance->childHasBeenRendered('rU51tJk')) {
    $componentId = $_instance->getRenderedChildComponentId('rU51tJk');
    $componentTag = $_instance->getRenderedChildComponentTagName('rU51tJk');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('rU51tJk');
} else {
    $response = \Livewire\Livewire::mount('pages.dashboards.wallet.withdraw.admin-list');
    $html = $response->html();
    $_instance->logRenderedChild('rU51tJk', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/pages/dashboards/wallet/admin-list.blade.php ENDPATH**/ ?>