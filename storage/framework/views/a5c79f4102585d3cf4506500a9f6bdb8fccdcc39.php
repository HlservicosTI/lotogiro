<?php $__env->startSection('title', trans('admin.games.listing-page-title')); ?>

<?php $__env->startSection('content'); ?>
    <div class="col bg-white p-3">
        <h1>Visão Detalhada de Clientes Premiados</h1>
        <hr/>
        <form method="POST" action="<?php echo e(route('admin.dashboards.customer.filter.winner')); ?>">
            <?php echo csrf_field(); ?>
            <div class="row mb-4">
                <div class="col">
                    <a href="<?php echo e(route('admin.dashboards.customer.balance')); ?>"><button type="button" class="btn btn-secondary"><i class="bi bi-arrow-left-square-fill"></i></button></a>
                    <div class="form-group w-25 mt-3">
                        <label for="exampleFormControlSelect1">Selecionar Cliente</label>
                        <select class="form-control" id="select-names" name="select_names">
                            <?php $__currentLoopData = $winners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $winner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($winner[0]); ?>"><?php echo e($winner[1]); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-2">
                    <label for="">Data Inicio</label>
                    <input type="date" id="initial_date" class="form-control" name="initial_date" value="initial_date">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="">Data Final</label>
                    <input type="date" id="final_date" class="form-control" name="final_date" value="initial_date">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-2">
                    <button  type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
            <div class="row mt-2">
                <p><b>Obs: Para filtrar todo o histórico do cliente, deixe os campos de data em branco, ou informe o intervalo desejado</b></p>
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.min.css"
        integrity="sha512-bkB9w//jjNUnYbUpATZQCJu2khobZXvLP5GZ8jhltg7P/dghIrTaSJ7B/zdlBUT0W/LXGZ7FfCIqNvXjWKqCYA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/pages/dashboards/customer/detailed-view.blade.php ENDPATH**/ ?>