<?php $__env->startSection('title', 'Extrato de Vendas'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row bg-white p-3">
        <div class="col-md-12">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('pages.dashboards.extract.sales')->html();
} elseif ($_instance->childHasBeenRendered('UlKHjPD')) {
    $componentId = $_instance->getRenderedChildComponentId('UlKHjPD');
    $componentTag = $_instance->getRenderedChildComponentTagName('UlKHjPD');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('UlKHjPD');
} else {
    $response = \Livewire\Livewire::mount('pages.dashboards.extract.sales');
    $html = $response->html();
    $_instance->logRenderedChild('UlKHjPD', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/pages/dashboards/extracts/sales.blade.php ENDPATH**/ ?>