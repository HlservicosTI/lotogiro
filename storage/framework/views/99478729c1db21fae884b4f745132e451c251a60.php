<?php $__env->startSection('title', 'Relatório - Pontos por Usuário'); ?>

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
                <table class="table table-striped table-hover table-sm" id="user_table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Nível</th>
                        <th>Pontos Pessoais</th>
                        <th>Pontos de Equipe</th>
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
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('#user_table').DataTable({
                language: {
                    url: '<?php echo e(asset('admin/layouts/plugins/datatables-bs4/language/pt_Br.json')); ?>'
                },
                processing: true,
                serverSide: true,
                ajax: "<?php echo e(route('admin.reports.points-by-user')); ?>",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'level', name: 'level'},
                    {data: 'personal_balance', name: 'personal_balance'},
                    {data: 'group_balance', name: 'group_balance'},
                    // {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                dom: 'Bfrtip',
                buttons: [
                    'pdf', 'csv', 'excel'
                ]
            });
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/pages/reports/points-by-user.blade.php ENDPATH**/ ?>