<?php $__env->startSection('title', 'Carteira'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row bg-white p-3">
        <div class="col-md-12">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('pages.dashboards.wallet.table')->html();
} elseif ($_instance->childHasBeenRendered('tAWZbWE')) {
    $componentId = $_instance->getRenderedChildComponentId('tAWZbWE');
    $componentTag = $_instance->getRenderedChildComponentTagName('tAWZbWE');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('tAWZbWE');
} else {
    $response = \Livewire\Livewire::mount('pages.dashboards.wallet.table');
    $html = $response->html();
    $_instance->logRenderedChild('tAWZbWE', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/pages/dashboards/wallet/index.blade.php ENDPATH**/ ?>