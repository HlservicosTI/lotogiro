<?php $__env->startSection('title', 'Saque - Solicitações'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row bg-white p-3">
        <div class="col-md-12">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('pages.dashboards.wallet.recharge.orders')->html();
} elseif ($_instance->childHasBeenRendered('dHMhcwH')) {
    $componentId = $_instance->getRenderedChildComponentId('dHMhcwH');
    $componentTag = $_instance->getRenderedChildComponentTagName('dHMhcwH');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('dHMhcwH');
} else {
    $response = \Livewire\Livewire::mount('pages.dashboards.wallet.recharge.orders');
    $html = $response->html();
    $_instance->logRenderedChild('dHMhcwH', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/pages/dashboards/wallet/recharge-order.blade.php ENDPATH**/ ?>