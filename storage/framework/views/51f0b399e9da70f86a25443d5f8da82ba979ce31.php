<?php $__env->startSection('title', trans('admin.games.listing-page-title')); ?>

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
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_client')): ?>
                <a href="<?php echo e(route('admin.bets.games.create', ['type_game' => $typeGame])); ?>">
                    <button class="btn btn-info my-2"><?php echo e(trans('admin.games.new-game-button')); ?></button>
                </a>
            <?php endif; ?>
            <div class="table-responsive extractable-cel">
                <div class="filter-wrapper">
                    <form class="form" id="filterForm">
                        <div class="form-row no-gutters">
                            <div class="form-group col">
                                <label for="client_id"><?php echo e(trans('admin.games.customer-input-label')); ?></label>
                                
                                <input type="text" id="client_id" name="client_id" class="selectize" />
                            </div>
                            <div class="form-group col">
                                <label for="user_id"><?php echo e(trans('admin.games.user-input-label')); ?></label>
                                

                                <input type="text" id="user_id" name="user_id" class="selectize" />
                            </div>
                            <div class="form-group col">
                                <label for="startDate"><?php echo e(trans('admin.games.initial-date-input-label')); ?></label>
                                <input type="date" name="startDate" id="startDate" class="form-control" />
                            </div>
                            <div class="form-group col">
                                <label for="endDate"><?php echo e(trans('admin.games.end-date-input-label')); ?></label>
                                <input type="date" name="endDate" id="endDate" class="form-control" />
                            </div>
                            <div class="form-group col">
                                <button class="btn btn-primary" id="filterBtn"><?php echo e(trans('admin.games.filter-button-label')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>

                <table class="table table-striped table-hover table-sm" id="game_table">
                    <thead>
                    <tr>
                        <th></th>
                        <th><?php echo e(trans('admin.games.table-id-header')); ?></th>
                        <th><?php echo e(trans('admin.games.table-game-type-header')); ?></th>
                        <th><?php echo e(trans('admin.games.table-client-document-header')); ?></th>
                        <th><?php echo e(trans('admin.games.table-client-header')); ?></th>
                        <th><?php echo e(trans('admin.games.table-user-header')); ?></th>
                        <th><?php echo e(trans('admin.games.table-created-header')); ?></th>
                        <th class="acoes"><?php echo e(trans('admin.games.table-actions-header')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

                <div class="row-actions">
                    <div class="form-group actions-wrapper col-12 col-sm-2">
                        <select name="table-actions" id="tableActions" class="form-control">
                            <option value=""><?php echo e(trans('admin.select')); ?></option>
                            <option value="delete"><?php echo e(trans('admin.delete')); ?></option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_delete_game" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><?php echo e(trans('admin.exclude-game-title')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo e(trans('admin.exclude-game-text')); ?>

                </div>
                <div class="modal-footer">
                    <form id="destroy" action="" method="POST">
                        <?php echo method_field('DELETE'); ?>
                        <?php echo csrf_field(); ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(trans('admin.exclude-game-cancel')); ?></button>
                        <button type="submit" class="btn btn-danger"><?php echo e(trans('admin.exclude-game-confirm')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.min.css" integrity="sha512-bkB9w//jjNUnYbUpATZQCJu2khobZXvLP5GZ8jhltg7P/dghIrTaSJ7B/zdlBUT0W/LXGZ7FfCIqNvXjWKqCYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js" integrity="sha512-pF+DNRwavWMukUv/LyzDyDMn8U2uvqYQdJN0Zvilr6DDo/56xPDZdDoyPDYZRSL4aOKO/FGKXTpzDyQJ8je8Qw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $('#tableActions').on('change', function() {
            const actionSelector = $(this);

            let selectedGames = $('.game-checkbox:checked');

            if(selectedGames.length > 0) {
                switch(actionSelector.val()) {
                    case 'delete':
                        massDelete(selectedGames);
                        break;
                }
            } else {
                actionSelector.val('');

                Swal.fire({
                    text: '<?php echo e(trans("admin.games.no-games-selected-error")); ?>',
                    icon: 'error'
                });
            }
        });

        function massDelete(selectedGames) {
            Swal.fire({
                text: '<?php echo e(trans("admin.games.mass-delete-confirmation")); ?>',
                confirmButtonText: '<?php echo e(trans("admin.remove")); ?>',
                icon: 'question',
                focusConfirm: false,
            }).then((result) => {
                let ids = [];

                $.each(selectedGames, function(i, selectedGame) {
                    ids[i] = selectedGame.value;
                });

                if(result.isConfirmed) {
                    $.ajax({
                        method: 'POST',
                        url: '<?php echo e(route("admin.bets.games.massDelete")); ?>',
                        data: {
                            ids: ids
                        },
                        success: function(response) {
                            if(response.success) {
                                Swal.fire({
                                    text: response.message,
                                    icon: 'success'
                                }).then((result) => {
                                    if(result.isConfirmed || result.isDismissed) {
                                        document.location.reload(true);
                                    }
                                });
                            }
                        },
                        error: function(xhr) {
                            Swal.fire({
                                text: xhr.responseJSON.error,
                                icon: 'error'
                            });
                        }
                    });
                }
            });
        }

        $(document).on('click', '#btn_delete_game', function () {
            var game = $(this).attr('game');
            var url = '<?php echo e(route("admin.bets.games.destroy", ":game")); ?>';
            url = url.replace(':game', game);
            $("#destroy").attr('action', url);
        });

        $('#btn_copy_link').click(function () {
            var link = document.getElementById("link_copy");
            link.select();
            document.execCommand('copy');
        });

        function initTable(formData) {
            <?php $__errorArgs = ['messageHashGame'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#modal_hash_game').modal('show')
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            if ($.fn.dataTable.isDataTable('#game_table')) {
                $('#game_table').DataTable().destroy();
            }

            var table = $('#game_table').DataTable({
                language: {
                    url: '<?php echo e(asset('admin/layouts/plugins/datatables-bs4/language/pt_Br.json')); ?>'
                },
                retrieve: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e(route('admin.bets.games.index', ['type_game' => $typeGame])); ?>",
                    data: function(d){
                        d.form = formData;
                    }
                },
                columns: [
                    {data: 'mass_action', name: 'mass_action', orderable: false, searchable: false},
                    {data: 'id', name: 'id'},
                    {data: 'type', name: 'type'},
                    {data: 'client_cpf', name: 'client_cpf'},
                    {data: 'client', name: 'client'},
                    {data: 'user', name: 'user'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        }

        $(document).ready(function () {
            initTable('');

            let selects = [
                {
                    id: '#client_id',
                    url: '<?php echo e(route('admin.settings.clients.list.select')); ?>'
                },
                {
                    id: '#user_id',
                    url: '<?php echo e(route('admin.settings.users.list.select')); ?>'
                }
            ];

            $.each(selects, function(i, select) {
                $(select.id).selectize({
                    valueField: "id",
                    labelField: "text",
                    searchField: "text",
                    options: [],
                    placeholder: "<?php echo e(trans('admin.search')); ?>",
                    maxItems: 1,
                    // closeAfterSelect: true,
                    // selectOnTab: true,
                    load: function (query, callback) {
                        if (!query.length || query.length < 3) return callback();

                        $.ajax({
                            url: select.url,
                            type: "GET",
                            dataType: 'json',
                            data: {
                                q: query,
                                field: 'name',
                            },
                            error: function () {
                                callback();
                            },
                            success: function (res) {
                                callback(res.data);
                            },
                        });
                    }
                });
            });
        });

        $('#filterForm').on('submit', function(e) {
            e.preventDefault();

            let formData = $(this).serialize();

            initTable(formData);
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/pages/bets/game/index.blade.php ENDPATH**/ ?>