<div>
    <div class="col-md-12 p-4 faixa-jogos">
        <h3 class="text-center text-bold">CARTEIRA</h3>
    </div>
    <div class="row bg-white p-3">
        <div class="col-md-12">
            <div class="card-header indica-card">
                Extrato de Saldo | <?php echo e(auth()->user()->name); ?> - Saldo Total: <?php echo e(\App\Helper\Money::toReal
                (auth()->user()->balance)); ?>

            </div>
            <div class="table-responsive extractable-cel" >
                
                <table x-data="{data: <?php if ((object) ('trasacts') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e('trasacts'->value()); ?>')<?php echo e('trasacts'->hasModifier('defer') ? '.defer' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e('trasacts'); ?>')<?php endif; ?>}" class="table table-striped table-hover table-bordered table-lg" id="statementBalance_table">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>Responsável</th>
                        <th>Valor</th>
                        <th>Valor Anterior</th>
                        <th>Obs</th>
                    </tr>
                    </thead>
                    <tbody>
                        <template x-for="history in data">
                            <tr>
                                <td x-text="history.data"></td>
                                <td x-text="history.responsavel"></td>
                                <td x-text="history.value"></td>
                                <td x-text="history.old_value"></td>
                                <td x-text="history.obs"></td>
                            </tr>
                        </template>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="<?php echo e($paginate['prev']); ?>" class="btn btn-info btn-block
                                        <?php if(is_null($paginate['prev'])): ?> disabled <?php endif; ?>">Anterior</a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="<?php echo e($paginate['next']); ?>" class="btn btn-info btn-block
                                        <?php if(is_null($paginate['next'])): ?> disabled <?php endif; ?>">Próxima</a>
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
                margin-bottom: 10px;
            }

            .indica-card {
                font-size: 13px;
            }
        }

    </style>
<?php $__env->stopPush(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/livewire/pages/dashboards/wallet/extract/table.blade.php ENDPATH**/ ?>