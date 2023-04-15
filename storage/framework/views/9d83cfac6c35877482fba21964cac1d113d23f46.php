

<?php $__env->startSection('title', trans('admin.games.listing-page-title')); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col bg-white p-3 overflow-auto">
        <div class="row">
            <div class="col">
                <h2>Saldo de Clientes</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>Controle o acesso dos clientes por aqui!</p>
            </div>
            <div class="col-md-6 col-12">
                <div class="row busca-container">
                    <div class="col-2">
                        <select class="change-busca form-control" name="busca-per-page" data-busca-param="perPage">
                            <option value="10" <?php echo e($perPage == '10' ? 'selected' : ''); ?> >10</option>
                            <option value="20" <?php echo e($perPage == '20' ? 'selected' : ''); ?> >20</option>
                            <option value="50" <?php echo e($perPage == '50' ? 'selected' : ''); ?> >50</option>
                            <option value="100" <?php echo e($perPage == '100' ? 'selected' : ''); ?> >100</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <select class="change-busca form-control" name="busca-intervalo" data-busca-param="intervalo">
                            <option value="30" <?php echo e($intervalo == '30' ? 'selected' : ''); ?> >30 dias</option>
                            <option value="60" <?php echo e($intervalo == '60' ? 'selected' : ''); ?> >60 dias</option>
                            <option value="90" <?php echo e($intervalo == '90' ? 'selected' : ''); ?> >90 dias</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" name="user_name" placeholder="Buscar..." id="busca-autocomplete" />
                        <input type="hidden" id="busca-autocomplete-id">
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-success" id="busca-limpar">Limpar</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="row">
                    <div class="col border-left border-top">
                        <p>Para ter uma visão detalhada dos clientes premiados<br><a href="<?php echo e(route('admin.dashboards.customer.dashboard.winners')); ?>">Clique Aqui!</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Nome</th>
                            <th scope="col"></th>
                            <th scope="col">Sobrenome</th>
                            <th scope="col"></th>
                            <th scope="col">Número</th>
                            <th scope="col"></th>
                            <th scope="col">Email</th>
                            <th scope="col"></th>
                            <th scope="col">Jogos Feitos <br />(Quantidade)</th>
                            <th scope="col">Valor Apostado</th>
                            <th scope="col">Premios Recebidos</th>
                            <th scope="col"></th>
                            <th scope="col">Lucro/<br />Prejuízo</th>
                            <th scope="col">Cliente de<br />Risco</th>
                            <th scope="col" class="text-center">Comissão</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col">Bloquear/<br>Desbloquear</th>
                            <th scope="col"></th>
                            <th scope="col">Contato Realizado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row">
                                    <td><?php echo e($user['name']); ?></td>
                                </th>
                                <th scope="row">
                                    <td><?php echo e($user['last_name']); ?></td>
                                </th>
                                <th scope="row">
                                    <td><?php echo e($user['phone']); ?></td>
                                </th>
                                <th scope="row">
                                    <td><?php echo e($user['email']); ?></td>
                                </th>
                                <th>
                                <td><?php echo e($user['total_jogos']); ?></td>
                                <td>R$ <?php echo e(number_format($user['total_apostado'], 2, '.', ',')); ?></td>
                                <td>R$ <?php echo e(number_format($user['total_soma_premios'], 2, '.', ',')); ?></td>
                                <td>
                                    <?php if($user['lucro_prejuizo'] > 0): ?>
                                        <td class="text-danger">R$ <?php echo e(number_format($user['lucro_prejuizo'], 2, '.', ',')); ?></td>
                                    <?php elseif($user['lucro_prejuizo'] == 0): ?>
                                        <td>R$ <?php echo e(number_format($user['lucro_prejuizo'], 2, '.', ',')); ?></td>
                                    <?php else: ?>
                                        <td class="text-success">R$ <?php echo e(number_format(abs($user['lucro_prejuizo']), 2, '.', ',')); ?></td>
                                    <?php endif; ?>

                                    <?php if($user['lucro_prejuizo'] <= (2 * $user['total_apostado'])): ?>
                                        <td><button type="button" class="btn btn-success disabled"><i
                                                    class="bi bi-check-square-fill"></i></button></td>
                                    <?php elseif($user['lucro_prejuizo'] > (2 * $user['total_apostado']) && $user['lucro_prejuizo'] <= (3 * $user['total_apostado'])): ?>
                                        <td><button type="button" class="btn btn-warning disabled text-light"><i
                                                    class="bi bi-exclamation-triangle-fill"></i></button></td>
                                    <?php else: ?>
                                        <td><button type="button" class="btn btn-danger disabled text-light"><i
                                                    class="bi bi-exclamation-triangle-fill"></i></button></td>
                                    <?php endif; ?>
                            </th>
                            <th>
                                <form action="<?php echo e(route('admin.dashboards.customer.save', ['id' => $user->id])); ?>"
                                    method="POST">
                                    <?php echo method_field('PUT'); ?>
                                    <?php echo csrf_field(); ?>
                                    <div>
                                        <input type="number" name="commission" value="<?php echo $user['commission']; ?>" />
                                        <td><button type="submit" class="btn btn-primary text-light"><i
                                        class="bi bi-check2-square"></i></button></td>
                                    </div>
                                </form>
                            <th>
                                <?php if($user['is_active'] == 0): ?>
                                    <td><a type="button" href="<?php echo e(route('admin.dashboards.customer.unlock', ['id' => $user->id])); ?>"
                                    class="btn btn-danger text-light"><i class="bi bi-lock-fill"></i></a></td>
                                <?php elseif($user['is_active'] == 1): ?>
                                    <td><a type="button" href="<?php echo e(route('admin.dashboards.customer.lock', ['id' => $user->id])); ?>"
                                    class="btn btn-success text-light"><i class="bi bi-unlock-fill"></i></button></td>
                                <?php endif; ?>
                            </th>
                            <th>
                                <?php if($user['contact_made'] == 0): ?>
                                    <td><a type="button" href="<?php echo e(route('admin.dashboards.customer.contact.made', ['id' => $user->id])); ?>"
                                    class="btn btn-danger text-light"><i class="bi bi-x-square-fill"></i></a></td>
                                <?php elseif($user['contact_made'] == 1): ?>
                                    <td><a type="button" href="<?php echo e(route('admin.dashboards.customer.contact.not.made', ['id' => $user->id])); ?>"
                                    class="btn btn-success text-light"><i class="bi bi-check-square-fill"></i></button></td>
                                <?php endif; ?>
                            </th>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php if($users->withQueryString()->links()->paginator->hasPages()): ?>
                    <div class="mt-4 p-4 box has-text-centered">
                        <?php echo e($users->links()); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.min.css"
    integrity="sha512-bkB9w//jjNUnYbUpATZQCJu2khobZXvLP5GZ8jhltg7P/dghIrTaSJ7B/zdlBUT0W/LXGZ7FfCIqNvXjWKqCYA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"
    />
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

        .busca-container {
            height: 100%;
            align-items: flex-end;
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
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $('.change-busca').change(function() {
        const value = $(this).val();
        const param = $(this).attr('data-busca-param');
        const newUrl = new URL(window.location.href);
        
        newUrl.searchParams.set(param, value);
        if (param === 'perPage') newUrl.searchParams.set('page', 1);

        window.location.href = newUrl.toString();
    });

    $('#busca-limpar').click(function() {
        const url = window.location.href.split('?');
        let params = '';

        if (url[1]) {
            params = url[1].split('&').filter((i) => !i.includes('user')).join('&');
            params = `?${params}`;
        }

        window.location.href = url[0]+params;
    });

    $('#busca-autocomplete').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: `<?php echo e(url('/')); ?>/users/winners?busca=${$('#busca-autocomplete').val()}`,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    response(Object.values(data).map((i) => ({ label: `${i.name} ${i.last_name} | ${i.email}`, value: i.id })));
                }
            });
        },
        select: function (event, ui) {
            $("#busca-autocomplete").val(ui.item.label);

            const newUrl = new URL(window.location.href);

            newUrl.searchParams.set('user', ui.item.value);
            window.location.href = newUrl.toString();

            return false;
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/pages/dashboards/customer/index.blade.php ENDPATH**/ ?>