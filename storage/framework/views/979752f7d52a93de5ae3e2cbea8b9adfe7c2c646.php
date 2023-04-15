<?php $__env->startSection('title', 'Extrato de Vendas'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row bg-white p-3">
        <div class="col-md-12">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('pages.dashboards.extract.winning-ticket')->html();
} elseif ($_instance->childHasBeenRendered('m0gf1sA')) {
    $componentId = $_instance->getRenderedChildComponentId('m0gf1sA');
    $componentTag = $_instance->getRenderedChildComponentTagName('m0gf1sA');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('m0gf1sA');
} else {
    $response = \Livewire\Livewire::mount('pages.dashboards.extract.winning-ticket');
    $html = $response->html();
    $_instance->logRenderedChild('m0gf1sA', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/pages/dashboards/extracts/winningTicket.blade.php ENDPATH**/ ?>