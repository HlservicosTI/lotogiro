<?php $__env->startSection('title', 'Usuários'); ?>

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
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_user')): ?>
                <a href="<?php echo e(route('admin.settings.users.create')); ?>">
                    <button class="btn btn-info my-2">Novo Usuário</button>

                </a>
            <?php endif; ?>
            <div class="table-responsive extractable-cel">
                <table class="table table-striped table-hover table-sm" id="user_table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
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

    <div class="modal fade" id="modal_delete_user" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Deseja excluir este usuário?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Está ação não pode ser revertida
                </div>
                <div class="modal-footer">
                    <form id="destroy" action="" method="POST">
                        <?php echo method_field('DELETE'); ?>
                        <?php echo csrf_field(); ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <script type="text/javascript">

        $(document).on('click', '#btn_delete_user', function () {
            var user = $(this).attr('user');
            var url = '<?php echo e(route("admin.settings.users.destroy", ":user")); ?>';
            url = url.replace(':user', user);
            $("#destroy").attr('action', url);
        });

        $(document).ready(function () {
            var table = $('#user_table').DataTable({
                language: {
                    url: '<?php echo e(asset('admin/layouts/plugins/datatables-bs4/language/pt_Br.json')); ?>'
                },
                processing: true,
                serverSide: true,
                ajax: "<?php echo e(route('admin.settings.users.index')); ?>",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/pages/settings/user/index.blade.php ENDPATH**/ ?>