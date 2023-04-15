<?php $__env->startSection('title', 'Visualizar Sorteio'); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <?php $__errorArgs = ['success'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <?php $__env->startPush('scripts'); ?>
                <script>
                    toastr["success"]("<?php echo e($message); ?>")
                </script>
            <?php $__env->stopPush(); ?>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <?php $__errorArgs = ['error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <?php $__env->startPush('scripts'); ?>
                <script>
                    toastr["error"]("<?php echo e($message); ?>")
                </script>
            <?php $__env->stopPush(); ?>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Jogo</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <tbody>
                                    <tr>
                                        <td>
                                            Id
                                        </td>
                                        <td>
                                            Tipo de Jogo
                                        </td>
                                        <td>
                                            Concurso
                                        </td>
                                        <td>
                                            Números
                                        </td>
                                        <td>
                                            Data Sorteio
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo e($draw->id); ?>

                                        </td>
                                        <td>
                                            <?php echo e($draw->typeGame->name); ?>

                                        </td>
                                        <td>
                                            <?php echo e($draw->competition->number); ?>

                                        </td>
                                        <td>
                                            <?php echo e($draw->numbers); ?>

                                        </td>
                                        <td>
                                            <?php echo e(\Carbon\Carbon::parse($draw->competition->sort_date)->format('d/m/Y H:i:s')); ?>

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php if(isset($games)): ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-sm" id="result_table">
                                        <thead>
                                        <tr>
                                            <th>Jogo</th>
                                            <th>Pix</th>
                                            <th>Nome</th>
                                            <th>Valor Aposta</th>
                                            <th>Valor Prêmio</th>
                                            <th>Recibo</th>
                                        </tr>
                                        </thead>
                                        <?php if(isset($games)): ?>
                                            <tbody>
                                            <?php if($games->count() > 0): ?>
                                                <?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($game->id); ?></td>
                                                        <td><?php echo e($game->client->pix); ?></td>
                                                        <td><?php echo e($game->client->name . ' ' . $game->client->last_name); ?></td>
                                                        <td><?php echo e(\App\Helper\Money::toReal($game->value)); ?></td>
                                                        <td><?php echo e(\App\Helper\Money::toReal($game->premio)); ?></td>
                                                        <td width="180">
                                                            <a href="<?php echo e(route('admin.bets.games.receipt', ['game' => $game->id, 'format' => 'pdf', 'prize' => true])); ?>">
                                                                <button class="btn btn-info btn-sm">
                                                                    Gerar Pdf
                                                                </button>
                                                            </a>
                                                            <a href="<?php echo e(route('admin.bets.games.receipt', ['game' => $game, 'format' => 'txt', 'prize' => true])); ?>">
                                                                <button type="button" class="btn btn-info btn-sm">
                                                                    Gerar Txt
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <tr class="text-center">
                                                    <td colspan="5"> Não houve nenhum ganhador para os números: <?php echo e($draw->numbers); ?></td>
                                                </tr>
                                            <?php endif; ?>
                                            </tbody>
                                        <?php endif; ?>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <a href="<?php echo e(route('admin.bets.draws.index')); ?>">
                <button type="button" class="btn btn-block btn-outline-secondary">Voltar a tela principal</button>
            </a>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        .btn-beat-number {
            width: 100%;
        }
    </style>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>

    <script src="<?php echo e(asset('admin/layouts/plugins/inputmask/jquery.inputmask.min.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            $('#cpf').inputmask("999.999.999-99");
            $('#phone').inputmask("(99) 9999[9]-9999");
        });
    </script>

<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/pages/bets/draw/read.blade.php ENDPATH**/ ?>