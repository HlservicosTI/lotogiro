

<?php $__env->startSection('title', trans('admin.games.listing-page-title')); ?>

<?php $__env->startSection('content'); ?>
    <div class="col bg-white p-3">
        <div class="row">
            <div class="col">
                <div class="p-3 bg-body shadow-sm rounded border border-1">
                    <div class="d-flex justify-content-between">
                        <div class="float-start">
                            <h5 class="value">Total de apostas feitas</h5>
                            <p class="mb-0" style="font-size: 20px;"><b><?php echo e($total_bets); ?></b></p>
                        </div>
                        <div class="float-end d-inline-block bg-light shadow-light rounded-3 p-2">
                            <i style="font-size: 1rem" class="bi bi-file-text-fill"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="p-3 bg-body shadow-sm rounded border border-1">
                    <div class="d-flex justify-content-between">
                        <div class="float-start">
                            <h5 class="value">Valor Apostado</h5>
                            <p class="mb-0" style="font-size: 20px;"><?php echo e('R$ ' . number_format($total_apostado, 2, '.', ',')); ?></p>
                        </div>
                        <div class="float-end d-inline-block bg-light shadow-light rounded-3 p-2">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="p-2 bg-body shadow-sm rounded border border-1">
                    <div class="d-flex justify-content-between">
                        <div class="float-start">
                            <h4 class="value">Prêmio Cliente</h4>
                            <p class="text-dark" class="mb-0"><?php echo e('R$' . number_format($total_apostado - $lucro_prejuizo, 2, '.', ',')); ?></p>
                        </div>
                        <div class="float-end d-inline-block bg-light shadow-light rounded-3 p-2">
                            <i class="bi bi-hand-thumbs-up-fill text-success"></i>
                            <i class="bi bi-hand-thumbs-down-fill text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="p-2 bg-body shadow-sm rounded border border-1">
                    <div class="d-flex justify-content-between">
                        <div class="float-start">
                            <h4 class="value">Lucro/Prejuizo(Casa)</h4>
                            <?php if($lucro_prejuizo > 0): ?>
                                <p class="text-success" class="mb-0"><?php echo e('R$' . number_format($lucro_prejuizo, 2, '.', ',')); ?></p>
                            <?php elseif($lucro_prejuizo == 0): ?>
                                <p class="mb-0" style="font-size: 20px;"><?php echo e('R$' . number_format($lucro_prejuizo, 2, '.', ',')); ?></p>
                            <?php else: ?>
                                <p class="text-danger" class="mb-0" style="font-size: 20px;"><?php echo e('R$' . number_format($lucro_prejuizo, 2, '.', ',')); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="float-end d-inline-block bg-light shadow-light rounded-3 p-2">
                            <i class="bi bi-hand-thumbs-up-fill text-success"></i>
                            <i class="bi bi-hand-thumbs-down-fill text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <h3>Visão Detalhada do Cliente <?php echo e($user->name); ?> <?php echo e($user->last_name); ?> #<?php echo e($user->id); ?></h3>
                <table id="table" class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th aria-controls="widget-options" scope="col">Concurso</th>
                            <th scope="col"></th>
                            <th scope="col">Tipo de Jogo</th>
                            <th scope="col"></th>
                            <th scope="col">Valor Apostado</th>
                            <th scope="col"></th>
                            <th scope="col">Prêmio</th>
                            <th scope="col"></th>
                            <?php if($user_type === 'user_id'): ?>
                            <th scope="col">Cliente</th>
                            <th scope="col"></th>
                            <?php endif; ?>
                            <th scope="col">Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row">
                                    <td><?php echo e($user['competition_id']); ?></td>
                                </th>
                                <th scope="row">
                                    <td><?php echo e($user['type_game']); ?></td>
                                </th>
                                <th scope="row">
                                    <td><?php echo e('R$' . number_format($user['value_game'], 2, '.', ',')); ?></td>
                                </th>
                                <th scope="row">
                                    <?php if($user['award_game'] != NULL): ?>
                                        <td><?php echo e('R$' . number_format($user['award_game'], 2, '.', ',')); ?></td>
                                    <?php else: ?>
                                        <td>R$0,00</td>
                                    <?php endif; ?>
                                </th>
                                <?php if($user_type === 'user_id'): ?>
                                <th scope="row">
                                    <td><?php echo e($user['client_name'] == ' ' ? 'Cliente excluído' : $user['client_name']); ?></td>
                                </th>
                                <?php endif; ?>
                                <th scope="row">
                                    <td><?php echo e($user['date_game']); ?></td>
                                </th>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="<?php echo e(route('admin.dashboards.customer.dashboard.winners')); ?>"><button type="button" class="btn btn-secondary"><i class="bi bi-arrow-left-square-fill"></i></button></a>
                <a href="<?php echo e(route('admin.dashboards.customer.get.pdf',['id' => $id_user,'date_initial' => $date_initial, 'date_final' => $date_final])); ?>"><button type="button" class="btn btn-danger"><i class="bi bi-filetype-pdf"></i></button></a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.min.css"
        integrity="sha512-bkB9w//jjNUnYbUpATZQCJu2khobZXvLP5GZ8jhltg7P/dghIrTaSJ7B/zdlBUT0W/LXGZ7FfCIqNvXjWKqCYA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"
    />
        <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        #filterForm {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        #filterForm .form-row {
            justify-content: flex-end;
            align-items: flex-end;
            margin: 0;
        }

        @media(max-width: 467px) {
            #filterForm .form-row {
                flex-direction: column;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function(){
        $('#table').DataTable({
              "language": {
                  "search": 'Buscar',
                  "lengthMenu": "Mostrando _MENU_ registros por página",
                  "zeroRecords": "Nada encontrado",
                  "info": "Mostrando página _PAGE_ de _PAGES_",
                  "infoEmpty": "Nenhum registro disponível",
                  "infoFiltered": "(filtrado de _MAX_ registros no total)",
              }
          });
    });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/pages/dashboards/customer/detailed-view-user.blade.php ENDPATH**/ ?>