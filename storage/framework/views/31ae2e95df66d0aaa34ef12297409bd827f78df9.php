<div>
    <div class="col-md-12 p-4 faixa-jogos">
        <h3 class="text-center text-bold">CARTEIRA</h3>
    </div>
    <div class="row bg-white p-3">
        <div class="col-md-12">
            <div class="card-header indica-card">
                Pedidos de Recarga
            </div>
            <div class="table-responsive extractable-cel">
                <table class="table table-striped table-hover table-bordered table-lg">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>Usuário</th>
                        <th>Valor</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($order->data); ?></td>
                            <td><?php echo e($order->user); ?></td>
                            <td><?php echo e($order->value); ?></td>
                            <td><?php echo e($order->statusTxt); ?></td>
                            <td width="5%" align="center">
                                <a href="<?php echo e(route('admin.dashboards.wallet.order-detail', $order->reference)); ?>"
                                   type="button"
                                   class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                    Detalhes
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <?php endif; ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php echo e($orders->links()); ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('styles'); ?>
    <style>

        @media  screen and (max-width: 760px) {
            .btn-info {
                font-size: 9px;
            }
            tbody tr td {
                font-size: 9px;
            }
        }



    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/livewire/pages/dashboards/wallet/recharge/orders.blade.php ENDPATH**/ ?>