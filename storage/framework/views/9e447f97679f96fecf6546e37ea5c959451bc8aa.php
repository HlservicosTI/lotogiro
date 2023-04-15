<div>
    <div class="col-md-12 p-4 faixa-jogos">
        <h3 class="text-center text-bold">CARTEIRA</h3>
    </div>
    <div class="row bg-white p-3">
        <div class="col-md-12">
            <div class="card-header indica-card">
                Solicitações de Saque
            </div>
            <div class="table-responsive extractable-cel">
                <table class="table table-striped table-hover table-bordered table-lg">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>Responsável</th>
                        <?php if(\App\Helper\UserValidate::iAmAdmin()): ?>
                            <th>Pix</th>
                        <?php endif; ?>
                        <th>Valor</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $withdraws; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($withdraw->data); ?></td>
                            <td><?php echo e($withdraw->responsavel); ?></td>
                            <?php if(\App\Helper\UserValidate::iAmAdmin()): ?>
                                <th><?php echo e($withdraw->pix); ?></th>
                            <?php endif; ?>
                            <td><?php echo e($withdraw->value); ?></td>
                            <td><?php echo e($withdraw->statusTxt); ?></td>
                            <?php if(\App\Helper\UserValidate::iAmAdmin()): ?>
                            <td width="5%" align="center">
                                <?php if($withdraw->status === 0): ?>
                                    <button wire:click="withdrawDone(<?php echo e($withdraw->id); ?>)" type="button" class="btn
                                        btn-warning">
                                        <i class="fa fa-check-circle"></i>
                                        Feito
                                    </button>
                                <?php else: ?>
                                    <button disabled type="button" class="btn btn-success"><i class="fa
                                    fa-check-circle"></i></button>
                                <?php endif; ?>
                                <?php endif; ?>
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
                                    <?php echo e($withdraws->links()); ?>

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
            .btn {
                font-size: 9px;
            }

            tbody tr td {
                font-size: 9px;
            }

            tbody tr th {
                font-size: 9px;
            }
        }

        

    </style>
<?php $__env->stopPush(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/livewire/pages/dashboards/wallet/withdraw/admin-list.blade.php ENDPATH**/ ?>