<?php $__env->startSection('title', 'Extrato de Recargas Manuais'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row bg-white p-3">
        <div class="col-md-12">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('pages.dashboards.extract.manual-recharge')->html();
} elseif ($_instance->childHasBeenRendered('vZVbLPq')) {
    $componentId = $_instance->getRenderedChildComponentId('vZVbLPq');
    $componentTag = $_instance->getRenderedChildComponentTagName('vZVbLPq');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('vZVbLPq');
} else {
    $response = \Livewire\Livewire::mount('pages.dashboards.extract.manual-recharge');
    $html = $response->html();
    $_instance->logRenderedChild('vZVbLPq', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/pages/dashboards/extracts/manualRecharge.blade.php ENDPATH**/ ?>