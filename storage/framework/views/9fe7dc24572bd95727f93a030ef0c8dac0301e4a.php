<div>
    <div wire:loading.delay class="overlayLoading">
        <div class="spinner"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card-header indica-card">
                <?php echo e(trans('admin.sales-extract.page-header')); ?>

            </div>
        </div>
    </div>
    <div class="row" style="margin-left: 10px;margin-right: 10px;">
        <div class="col-md-2">
            <div class="form-group">
                <select wire:model="range" class="custom-select" id="range" name="range">
                    <option value="0"><?php echo e(trans('admin.daily')); ?></option>
                    <option value="1"><?php echo e(trans('admin.yesterday')); ?></option>
                    <option value="2"><?php echo e(trans('admin.weekly')); ?></option>
                    <option value="3"><?php echo e(trans('admin.monthly')); ?></option>
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
        <?php $__empty_1 = true; $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-sm-12 col-md-4">
            <div class="alert" style="background-color: <?php echo e($dado['gameColor']); ?>; color:#FFF;">
                <strong><?php echo e($dado['gameName']); ?></strong>
                <strong style="float: right;"><?php echo e($dado['fullGain']); ?></strong>
                <hr class="message-inner-separator">
                <p>
                    <button class="btn btn-light btn-block" type="button" data-toggle="collapse"
                            data-target="#dados<?php echo e($dado['game']); ?>" aria-expanded="false"
                            aria-controls="dados<?php echo e($dado['game']); ?>">
                        <?php echo e(trans('admin.see-data')); ?>

                    </button>
                </p>
                <div class="col">
                    <div class="collapse multi-collapse" id="dados<?php echo e($dado['game']); ?>">
                        <div class="card card-body" style="color: #000">
                            <p><strong><?php echo e(trans('admin.tickets-sold')); ?>:</strong> <?php echo e($dado['total']); ?></p>
                            <p><strong><?php echo e(trans('admin.total-received')); ?>:</strong> <?php echo e($dado['payed']); ?></p>
                            <p><strong><?php echo e(trans('admin.winner-tickets')); ?>:</strong> <?php echo e($dado['drawed']); ?></p>
                            <p><strong><?php echo e(trans('admin.total-paid')); ?>:</strong> <?php echo e($dado['drawedPayed']); ?></p>
                        </div>

                        <p>
                            <button class="btn btn-light btn-block" type="button" data-toggle="collapse"
                                    data-target="#detalhes<?php echo e($dado['game']); ?>" aria-expanded="false"
                                    aria-controls="detalhes<?php echo e($dado['game']); ?>">
                                <?php echo e(trans('admin.more-details')); ?>

                            </button>
                        </p>
                        <div class="col">
                            <div class="collapse multi-collapse" id="detalhes<?php echo e($dado['game']); ?>">
                                <?php $__currentLoopData = $dado['unities']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card card-body" style="color: #000">
                                    <div class="btn bg-blue light mb-2">
                                        <strong><?php echo e(trans('admin.dozens')); ?>:</strong> <?php echo e($unities['dezenas']); ?>

                                    </div>
                                    <div>
                                        <p><strong><?php echo e(trans('admin.tickets-sold')); ?>:</strong> <?php echo e($unities['vendido']); ?></p>
                                        <p><strong><?php echo e(trans('admin.total-received')); ?>:</strong> <?php echo e($unities['total']); ?></p>
                                        <p><strong><?php echo e(trans('admin.winner-tickets')); ?>:</strong> <?php echo e($unities['drawed']); ?></p>
                                        <p><strong><?php echo e(trans('admin.total-paid')); ?>:</strong> <?php echo e($unities['payed']); ?></p>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-sm-12"><p><?php echo e(trans('admin.sales-extract.zero-games-sold')); ?>.</p></div>
        <?php endif; ?>
    </div>
</div>


<?php $__env->startPush('scripts'); ?>
    <style>
        .spinner {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            border: 9px solid;
            border-color: #dbdcef;
            border-right-color: #32689a;
            animation: spinner-d3wgkg 1s infinite linear;
            margin-left: calc(50% - 56px);
            margin-top: calc(25% - 56px);
        }
        .overlayLoading{
            min-width: 100%;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 99999;
            background-image: repeating-linear-gradient(45deg, #32689a 0, #32689a 3px, transparent 0, transparent 50%);
            background-size: 21px 21px;
            background-color: #333333;
            opacity: .9;
        }

        @keyframes  spinner-d3wgkg {
            to {
                transform: rotate(1turn);
            }
        }
    </style>
<?php $__env->stopPush(); ?>

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

<?php $__env->stopPush(); ?>
<?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/livewire/pages/dashboards/extract/sales.blade.php ENDPATH**/ ?>