<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card-header indica-card">
                <?php echo e(trans('admin.period')); ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <select wire:model="range" class="custom-select" id="range" name="range">
                    <option></option>
                    <option value="1"><?php echo e(trans('admin.monthly')); ?></option>
                    <option value="2"><?php echo e(trans('admin.weekly')); ?></option>
                    <option value="3"><?php echo e(trans('admin.daily')); ?></option>
                    <option value="4"><?php echo e(trans('admin.custom')); ?></option>
                </select>
            </div>
        </div>
        <div class="col-md-8">
            <form wire:submit.prevent="submit">
                <div class="form-row">
                    <div class="form-group col-md-6 <?php if($range != 4): ?> d-none <?php endif; ?>">
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
                    <div class="form-group col-md-6 <?php if($range != 4): ?> d-none <?php endif; ?>">
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
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?php echo e($extracts->count()); ?></h3>
                    <p><?php echo e(trans('admin.transactions-quantity')); ?></p>
                </div>
                <div class="icon">
                    <i class="fas fa-balance-scale-left"></i>
                </div>
                <span class="small-box-footer p-2"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="small-box <?php if($value < 0): ?> bg-danger <?php else: ?> bg-success <?php endif; ?>">
                <div class="inner">
                    <h3>R$<?php echo e(\App\Helper\Money::toReal($value)); ?></h3>
                    <p><?php echo e(trans('admin.balance')); ?></p>
                </div>
                <div class="icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <span class="small-box-footer p-2"></span>
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
        <div class="form-group offset-md-8 col-md-3">
            <button wire:click="getReport" type="button" class="btn btn-info btn-block"><?php echo e(trans('admin.generate-report')); ?></button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 extractable-cel">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-sm" id="game_table">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('admin.extracts.table-id-header')); ?></th>
                        <th><?php echo e(trans('admin.extracts.table-type-header')); ?></th>
                        <th><?php echo e(trans('admin.extracts.table-value-header')); ?></th>
                        <th><?php echo e(trans('admin.extracts.table-description-header')); ?></th>
                        <th><?php echo e(trans('admin.extracts.table-user-header')); ?></th>
                        <th><?php echo e(trans('admin.extracts.table-customer-header')); ?></th>
                        <th><?php echo e(trans('admin.extracts.table-creation-header')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $extracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <?php echo e($extract->id); ?>

                            </td>
                            <td>
                                <?php if($extract->type == 1): ?>
                                    <span class="text-success"><?php echo e(trans('admin.credit')); ?></span>
                                <?php elseif($extract->type == 2): ?>
                                    <span class="text-danger"><?php echo e(trans('admin.debit')); ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                R$<?php echo e(\App\Helper\Money::toReal($extract->value)); ?>

                            </td>
                            <td>
                                <?php echo e($extract->description); ?> do tipo: <?php echo e($extract->typeGame->name ?? null); ?>

                            </td>
                            <td>
                                <?php echo e(!empty($extract->user->name) ? $extract->user->name .' '. $extract->user->last_name: null); ?>

                            </td>
                            <td>
                                <?php echo e(!empty($extract->client->name) ? $extract->client->name .' '. $extract->client->last_name: null); ?>

                            </td>
                            <td>
                                <?php echo e(\Carbon\Carbon::parse($extract->created_at)->format('d/m/Y')); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td class="text-center" colspan="9">
                                <?php echo e(trans('admin.entries-not-found')); ?>

                            </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div>
                <?php echo e($extracts->links()); ?>

            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>

    <script src="<?php echo e(asset('admin/layouts/plugins/daterangepicker/moment.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <script src="<?php echo e(asset('admin/layouts/plugins/select2/js/select2.min.js')); ?>"></script>


    <script>

        $(document).ready(function () {
            $('#user').select2({
                theme: "bootstrap"
            });
            $('#range').select2({
                placeholder: "Please select a country"
            });
        });

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
<?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/livewire/pages/dashboards/extract/table.blade.php ENDPATH**/ ?>