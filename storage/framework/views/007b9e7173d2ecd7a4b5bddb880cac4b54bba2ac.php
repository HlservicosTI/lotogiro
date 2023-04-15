<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card-header indica-card">
                <?php echo e(trans('admin.extracts.manual-recharge')); ?>

            </div>
        </div>
    </div>
    <div class="row" style="margin-left: 10px;margin-right: 10px;">
        <div class="col-md-4">
            <div class="form-group">
                <select wire:model="adminSelected" class="custom-select" id="user" name="user">
                    <option value="0"><?php echo e(trans('admin.all-admins')); ?></option>
                    <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($admin['id']); ?>"><?php echo e($admin['name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <select wire:model="range" class="custom-select" id="range" name="range">
                    <option value="0"><?php echo e(trans('admin.all')); ?></option>
                    <option value="1"><?php echo e(trans('admin.monthly')); ?></option>
                    <option value="2"><?php echo e(trans('admin.weekly')); ?></option>
                    <option value="3"><?php echo e(trans('admin.daily')); ?></option>
                    <option value="4"><?php echo e(trans('admin.custom')); ?></option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
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

    <div class="row bg-white p-3">
        <div class="col-md-12 extractable-cel">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered table-lg">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('admin.extracts.table-date-header')); ?></th>
                        <th><?php echo e(trans('admin.extracts.table-responsible-header')); ?></th>
                        <th><?php echo e(trans('admin.extracts.table-user-header')); ?></th>
                        <th><?php echo e(trans('admin.extracts.table-value-header')); ?></th>
                        <th><?php echo e(trans('admin.extracts.table-wallet-header')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $transacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($transact->data); ?></td>
                            <td><?php echo e($transact->responsavel); ?></td>
                            <td><?php echo e($transact->usuario); ?></td>
                            <td><?php echo e($transact->value); ?></td>
                            <td><?php echo e($transact->wallet == 'balance' ? trans('admin.balance') : trans('admin.bonus')); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <?php echo e(trans('admin.entries-not-found')); ?>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5">
                            <div class="row">
                                <div class="col-sm-12 col-md-9">
                                    <?php echo e($transacts->links()); ?>

                                </div>
                                <div class="col-sm-12 col-md-3 text-right text-bold">
                                    <?php echo e(trans('admin.total')); ?>: R$ <?php echo e($transacts->valueTotal); ?>

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


<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('admin/layouts/plugins/daterangepicker/moment.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <script src="<?php echo e(asset('admin/layouts/plugins/select2/js/select2.min.js')); ?>"></script>

    <script>
        $(document).ready(function () {
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

<?php $__env->stopPush(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/livewire/pages/dashboards/extract/manual-recharge.blade.php ENDPATH**/ ?>