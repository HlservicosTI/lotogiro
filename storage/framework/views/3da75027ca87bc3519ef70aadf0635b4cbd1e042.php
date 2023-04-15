<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item d-lg-none">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item pl-3">
            Saldo: R$<?php echo e(\App\Helper\Money::toReal(auth()->user()->balance)); ?> |
            Bônus:  R$<?php echo e(\App\Helper\Money::toReal(auth()->user()->bonus)); ?>

        </li>
        <li class="nav-item pl-3">
                        <a href="<?php echo e(route('admin.dashboards.wallet.recharge')); ?>" type="button" class="btn btn-block btn-success text-light
                        text-bold">
                            <i class="fas fa-piggy-bank"></i>
                            Recarregar 
                        </a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="https://wa.me/558196826967?text=Olá, Poderia me ajudar?">
               <i class="fas fa-regular fa-question"></i>
            </a>
        </li>
        <?php $unreadNotifications = auth()->user()->unreadNotifications; ?>

        <?php if(!empty(auth()->user()->notifications) && count(auth()->user()->notifications) > 0): ?>
            <li class="nav-item dropdown notification_dropdown">
                <a class="nav-link bell ai-icon <?php echo e($unreadNotifications->count() > 0 ? 'show-notifcations-indicatior' : ''); ?>" href="#" role="button" data-toggle="dropdown">
                    <svg id="icon-user" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>

                    
                        <div class="notifications-count"><?php echo e($unreadNotifications->count()); ?></div>
                    
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3" style="height:380px; overflow-y: auto">
                        <ul class="timeline">
                            <?php $__currentLoopData = auth()->user()->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a <?php if($notification->data['url']): ?> href="<?php echo e($notification->data['url']); ?>" <?php else: ?> href="javascript:;" <?php endif; ?>>
                                <div class="timeline-panel">
                                    <div class="media-body">
                                        <h6 class="mb-1"><?php echo e($notification->data['title']); ?></h6>
                                        <small class="d-block"><?php echo e($notification->created_at->diffForHumans()); ?></small>
                                    </div>
                                </div>
                                </a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <!--<a class="all-notification" href="#">See all notifications <i class="ti-arrow-right"></i></a>-->
                </div>
            </li>
        <?php endif; ?>

        <li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                   <?php echo e(App\Helper\Lang::getCurrentUserLangLabel()); ?>

                </a>

                <?php $availableLangs = App\Helper\Lang::getAvailableLangs() ?>
                <ul class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                    <?php if(is_array($availableLangs) && $availableLangs > 0): ?>
                        <?php $__currentLoopData = $availableLangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li style="padding: 5px 10px;">
                                <a href="<?php echo e(route('admin.changeLocale', $key)); ?>" style="color: #555; display: block"><?php echo e($label); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </ul>
            </li>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
               <i class="fas fa-cog"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                <p class="px-2 pt-1">
                    Olá, <?php echo e(auth()->user()->name); ?>

                </p>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_user')): ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo e(route('admin.settings.users.edit', ['user' => auth()->user()->id])); ?>">
                    <i class="fas fa-user mr-2"></i> Conta
                </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_all')): ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo e(route('admin.settings.users.edit', ['user' => auth()->user()->id])); ?>">
                    <i class="fas fa-user mr-2"></i> Conta
                </a>
                <?php endif; ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo e(route('admin.logout')); ?>">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/layouts/navbar.blade.php ENDPATH**/ ?>