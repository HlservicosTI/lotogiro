<div class="col bg-white p-3">
    <div id="table" class="row mt-5">
        <div class="col">
            <h2>Visão Detalhada do Cliente</h2>
            <table class="table table-sm">
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
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data_to_view; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                <th scope="row">
                                    <td><?php echo e($user['date_game']); ?></td>
                                </th>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/pages/dashboards/customer/dashboard-user-pdf.blade.php ENDPATH**/ ?>