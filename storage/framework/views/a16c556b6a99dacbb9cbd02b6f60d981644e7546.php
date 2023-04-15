<?php $__env->startSection('title', 'Relatório - Concursos'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row bg-white p-3">
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

            <div class="table-responsive extractable-cel">
                <table class="table table-striped table-hover table-sm" id="competition_table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Número</th>
                        <th>Tipo de Jogo</th>
                        <th>Data de Sorteio</th>
                        <th>Criação</th>
                        <th class="acoes">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('#competition_table').DataTable({
                language: {
                    url: '<?php echo e(asset('admin/layouts/plugins/datatables-bs4/language/pt_Br.json')); ?>'
                },
                processing: true,
                serverSide: true,
                ajax: "<?php echo e(route('admin.reports.used.dozens')); ?>",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'number', name: 'number'},
                    {data: 'type_game', name: 'type_game'},
                    {data: 'sort_date', name: 'sort_date'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/pages/reports/used-dozens.blade.php ENDPATH**/ ?>