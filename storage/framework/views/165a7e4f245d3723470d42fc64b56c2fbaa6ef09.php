<div>
    <div class="col-md-12 p-4 faixa-jogos">
        <h3 class="text-center text-bold"><?php echo e(trans('admin.draws.table-title')); ?></h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="col-md-1 commisao-icon text-center">
                        <i class="fas fa-calendar nav-icon"></i>
                    </div>
                    <div class="col-md-11 commisao-input">
                        <input wire:model="dateStart" type="text"
                               class="form-control <?php $__errorArgs = ['dateStart'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               id="date_start"
                               name="dateStart"
                               autocomplete="off"
                               maxlength="50"
                               placeholder="Data Inicial"
                               onchange="this.dispatchEvent(new InputEvent('input'))">
                        <?php $__errorArgs = ['dateStart'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                                <?php echo e($message); ?>

                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div class="col-md-1 commisao-icon text-center">
                        <i class="fas fa-calendar nav-icon"></i>
                    </div>
                    <div class="col-md-11 commisao-input">
                        <input wire:model="dateEnd" type="text"
                               class="form-control date <?php $__errorArgs = ['dateEnd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               id="date_end"
                               name="dateEnd"
                               autocomplete="off"
                               maxlength="50"
                               placeholder="Data Final"
                               onchange="this.dispatchEvent(new InputEvent('input'))">
                        <?php $__errorArgs = ['dateEnd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                                <?php echo e($message); ?>

                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div wire:loading wire:target="pay" class="col-md-12 text-center">
            <div class="alert alert-warning" role="alert">
                <button class="btn" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <?php echo e(trans('admin.draws.export-payments-loader')); ?>

                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-1">
            <select wire:model="perPage" class="custom-select" id="per_page">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
        </div>
        <div class="form-group offset-md-5 col-md-6 text-right">
            <button wire:click="pay" type="button" class="btn btn-danger"><?php echo e(trans('admin.draws.export-payments-button')); ?></button>
        </div>
    </div>
    <div class="card card-info">
        <div class="card-header indica-card">
            <h3 class="card-title"><?php echo e(trans('admin.draws.payment-info-title')); ?></h3>
        </div>
        <div class="card-body">
            <div class="row">
                    <div class="col-md-6">   
                        <b><?php echo e(trans('admin.draws.game-count')); ?>:</b> <?php echo e($games->count()); ?>

                    </div>
                    <div class="col-md-6">
                        <b><?php echo e(trans('admin.total')); ?>:</b> R$<?php echo e(\App\Helper\Money::toReal($value)); ?>

                    </div>
            </div>
        </div>
    </div>  
    <div class="row">
        <div class="col-md-12 extractable-cel">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-sm" id="game_table">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('admin.draws.table-id')); ?></th>
                        <th><?php echo e(trans('admin.draws.table-game-type')); ?></th>
                        <th><?php echo e(trans('admin.draws.table-game-customer-document')); ?></th>
                        <th><?php echo e(trans('admin.draws.table-customer')); ?></th>
                        <th><?php echo e(trans('admin.draws.table-user')); ?></th>
                        <th><?php echo e(trans('admin.draws.table-competition')); ?></th>
                        <th><?php echo e(trans('admin.draws.table-numbers')); ?></th>
                        <th><?php echo e(trans('admin.draws.table-prize')); ?></th>
                        <th><?php echo e(trans('admin.draws.table-created-at')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <?php echo e($game->id); ?>

                            </td>
                            <td>
                                <?php echo e($game->typeGame->name); ?>

                            </td>
                            <td>
                                <?php echo e(\App\Helper\Mask::addMaskCpf($game->client->cpf)); ?>

                            </td>
                            <td>
                                <?php echo e($game->client->name . ' ' . $game->client->last_name); ?>

                            </td>
                            <td>
                                <?php echo e($game->user->name . ' ' . $game->user->last_name); ?>

                            </td>
                            <td>
                                <?php echo e($game->competition->id); ?>

                            </td>
                            <td>
                                <?php echo e($game->numbers); ?>

                            </td>
                            <td>
                                <?php echo e('R$' . \App\Helper\Money::toReal($game->premio)); ?>

                            </td>
                            <td>
                                <?php echo e(\Carbon\Carbon::parse($game->created_at)->format('d/m/Y')); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td class="text-center" colspan="9">
                                <?php echo e(trans('admin.entries-not-found')); ?>.
                            </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div>
                <?php echo e($games->links()); ?>

            </div>
        </div>
    </div>
</div>


<?php $__env->startPush('scripts'); ?>

    <script src="<?php echo e(asset('admin/layouts/plugins/daterangepicker/moment.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>

    <script>
        var i18n = {
            previousMonth: 'Mês anterior',
            nextMonth: 'Próximo mês',
            months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            weekdays: ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'],
            weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb']
        };

        var dateStart = new Pikaday({
            field: document.getElementById('date_start'),
            format: 'DD/MM/YYYY',
            i18n: i18n,
        });
        var dateEnd = new Pikaday({
            field: document.getElementById('date_end'),
            format: 'DD/MM/YYYY',
            i18n: i18n,
        });
    </script>

<?php $__env->stopPush(); ?>
<?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/livewire/pages/bets/payments/draw/table.blade.php ENDPATH**/ ?>