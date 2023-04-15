<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo e(asset('admin/layouts/plugins/overlayScrollbars/css/OverlayScrollbars.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/layouts/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/layouts/plugins/toastr/toastr.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/layouts/css/master.css')); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,400,600">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Exo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quattrocento&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>

    <link rel="shortcut icon" href="<?php echo e(asset(env('logo'))); ?>">


    <?php echo \Livewire\Livewire::styles(); ?>


    <style>
        body, * {
            font-family: "Exo", sans-serif;
        }
    </style>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed <?php if (is_impersonating($guard = null)) : ?> impersonating  <?php endif; ?>" style="font-family: Montserrat, sans-serif;">

<?php if (is_impersonating($guard = null)) : ?>
    <div class="leave-current-user-wrapper">
        <span><strong>Conectado Como: </strong> <?php echo e(auth()->user()->name); ?></span>
        <a href="<?php echo e(route('admin.settings.users.logout-as')); ?>" class="text-white">X Sair da Sessão</a>
    </div>

    <style>
        body.impersonating{
            padding-top: 50px;
        }
        .leave-current-user-wrapper {
            display: flex;
            justify-content: space-between;
            position: absolute;
            top: 0;
            width: 100%;
            background: #000;
            z-index: 999999;
            padding: 10px 20px;
            text-align: center;
            color: #fff
        }
    </style>
<?php endif; ?>

<?php if(session('success')): ?>
    <?php $__env->startPush('scripts'); ?>
        <script>
            toastr["success"]("<?php echo e(session('success')); ?>")
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php if(session('error')): ?>
    <?php $__env->startPush('scripts'); ?>
        <script>
            toastr["error"]("<?php echo e(session('error')); ?>")
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<div class="wrapper">

    <?php echo $__env->make('admin.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="content-wrapper">
        <div class="container-fluid pt-3">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    <?php echo $__env->make('admin.layouts.assets.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>

<script src="<?php echo e(asset('admin/layouts/plugins/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/layouts/plugins/overlayScrollbars/js/OverlayScrollbars.js')); ?>"></script>
<script src="<?php echo e(asset('admin/layouts/plugins/toastr/toastr.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/layouts/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/layouts/js/master.js')); ?>"></script>
<script src="<?php echo e(asset('admin/layouts/plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script>

<script>
    $(document).ready(function () {
        setInterval(() => {
            $.ajax({
                url: '/admin/notifications',
                success: function(response) {
                    shownNotifications = $('.notification_dropdown .timeline li');

                    if(response.notifications.length > shownNotifications.length) {
                        $.each(response.notifications, function(i, notification) {
                            let date = new Date(notification.created_at);

                           $newNotification = `
                                <li>
                                    <a href="${notification.data.url}">
                                        <div class="timeline-panel">
                                            <div class="media-body">
                                                <h6 class="mb-1">${notification.data.title}</h6>
                                                <small class="d-block">${date.toLocaleDateString('pt-BR')}</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            `;

                            $('.notification_dropdown .timeline').append($newNotification);
                            $('.notification_dropdown .nav-link').addClass('show-notifcations-indicatior');
                            $('.notification_dropdown .nav-link .notifications-count').text(response.unreadCount);
                        });
                    }
                }
            })
        }, 10000);

        $('.notification_dropdown .nav-link').on('click', function() {
            $.ajax({
                url: '/admin/notifications/readAll',
                success: function(response) {
                    if(response.success) {
                        $('.notification_dropdown .nav-link').removeClass('show-notifcations-indicatior');
                        $('.notification_dropdown .nav-link .notifications-count').text('');
                    }
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function () {
        bsCustomFileInput.init();
    });

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>


<?php echo \Livewire\Livewire::scripts(); ?>

<?php echo $__env->yieldPushContent('scripts'); ?>

</body>

</html>
<?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/layouts/master.blade.php ENDPATH**/ ?>