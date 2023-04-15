<?php $__env->startSection('title', 'Recarga - Adicione Saldo'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row bg-white p-3">
        <div class="col-md-12">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('pages.dashboards.wallet.recharge.table')->html();
} elseif ($_instance->childHasBeenRendered('7PCluek')) {
    $componentId = $_instance->getRenderedChildComponentId('7PCluek');
    $componentTag = $_instance->getRenderedChildComponentTagName('7PCluek');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('7PCluek');
} else {
    $response = \Livewire\Livewire::mount('pages.dashboards.wallet.recharge.table');
    $html = $response->html();
    $_instance->logRenderedChild('7PCluek', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        function showSuccessMiniAlert(message) {
            toastr.success(message, "Aeee! \\o/", {
                timeOut: 5000,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                positionClass: "toast-top-right",
                preventDuplicates: !0,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            })
        }

        function copyText() {
            if (navigator.userAgent.match(/ipad|ipod|iphone/i)) {
                var $input = $('#input_output');
                $input.val();
                var el = $input.get(0);
                var editable = el.contentEditable;
                var readOnly = el.readOnly;
                el.contentEditable = true;
                el.readOnly = false;
                var range = document.createRange();
                range.selectNodeContents(el);
                var sel = window.getSelection();
                sel.removeAllRanges();
                sel.addRange(range);
                el.setSelectionRange(0, 999999);
                el.contentEditable = editable;
                el.readOnly = readOnly;

                var successful = document.execCommand('copy');
                $input.blur();
                var msg = successful ? 'successful ' : 'un-successful ';
            }
            else{

                var copyTextarea = $('#input_output');
                copyTextarea.select();

                var successful = document.execCommand('copy');
                var msg = successful ? 'successful ' : 'unsuccessful';
            }

            showSuccessMiniAlert('Código copiado');
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/pages/dashboards/wallet/recharge.blade.php ENDPATH**/ ?>