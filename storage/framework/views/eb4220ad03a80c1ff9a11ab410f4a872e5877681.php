<aside class="main-sidebar sidebar-dark-info elevation-4" style="overflow-x: hidden">
    <a href="/" class="brand-link">

        <img src="<?php echo e(asset(env('logo'))); ?>"
             alt="Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-size: 15px"><?php echo e(env("nome_sistema")); ?></span>


    </a>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent" data-widget="treeview"
                role="menu" data-accordion="false">
                <center>
                    <li>
                        <a href="/" class="nav-link"><button type="button" class="btn btn-success">Faça Seu Jogo</button></a>
                    </li>
                </center>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['read_sale', 'read_gain'])): ?>
                    <li class="nav-item has-treeview <?php if(request()->is('admin/dashboards/*')): ?> <?php endif; ?>">
                        <a href="#" class="nav-link <?php if(request()->is('admin/dashboards/*')): ?>menu-open <?php endif; ?>">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>
                                Dashboards
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_extract')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.dashboards.ranking.index')); ?>"
                                    class="nav-link <?php if(request()->is('admin/ranking')): ?> active <?php endif; ?>">
                                    <i class="fas fa-star nav-icon"></i>
                                    <p>Ranking</p>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_extract')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.dashboards.extracts.points.index')); ?>"
                                    class="nav-link <?php if(request()->is('admin/dashboards/extracts/points')): ?> active <?php endif; ?>">
                                    <i class="fas fa-star nav-icon"></i>
                                    <p>Pontos</p>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if(\App\Helper\UserValidate::iAmAdmin()): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.dashboards.extracts.winning-ticket')); ?>"
                                       class="nav-link <?php if(request()->is('admin/dashboards/extracts/winning-ticket')): ?> active <?php endif; ?>">
                                        <i class="fas fa-file-alt nav-icon"></i>
                                        <p>Bilhetes Premiados</p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_gain')): ?>
                            <li class="nav-item">
                                <a href="/admin/dashboards/Reportday" class="nav-link">
                                <i class="nav-icon fas fa-list-alt "></i>
                                    <p>
                                        Vendas da Rede
                                    </p>
                                </a>
                            </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.dashboards.gains.index')); ?>"
                                       class="nav-link <?php if(request()->is('admin/dashboards/gains*')): ?> active <?php endif; ?>">
                                        <i class="fas fa-hand-holding-usd nav-icon"></i>
                                        <p>Ganhos</p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_sale')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.dashboards.sales.index')); ?>"
                                       class="nav-link <?php if(request()->is('admin/dashboards/sales*')): ?> active <?php endif; ?>">
                                        <i class="fas fa-funnel-dollar nav-icon"></i>
                                        <p>Vendas</p>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['read_client', 'read_competition', 'read_type_game', 'read_game'])): ?>
                    <li class="nav-item has-treeview <?php if(request()->is('admin/bets/*')): ?> menu-open <?php endif; ?>">
                        <a href="#" class="nav-link <?php if(request()->is('admin/bets/*')): ?> active <?php endif; ?>">
                            <i class="nav-icon fas fa-ticket-alt"></i>
                            <p>
                                Apostas
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_client')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.bets.clients.index')); ?>"
                                       class="nav-link <?php if(request()->is('admin/bets/clients*')): ?> active <?php endif; ?>">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p>Clientes</p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_client')): ?>
                                <li class="nav-item">
                                 <a href="<?php echo e(route('admin.bets.validate-games.index')); ?>"
                                   class="nav-link <?php if(request()->is('admin/bets/validate-games*')): ?> active <?php endif; ?>">
                                     <i class="fas fa-check nav-icon"></i>
                                     <p>Validar Jogo</p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_competition')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.bets.competitions.index')); ?>"
                                       class="nav-link <?php if(request()->is('admin/bets/competitions*')): ?> active <?php endif; ?>">
                                        <i class="fas fa-trophy nav-icon"></i>
                                        <p>Concursos</p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_type_game')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.bets.type_games.index')); ?>"
                                       class="nav-link <?php if(request()->is('admin/bets/type_games*')): ?> active <?php endif; ?>">
                                        <i class="fas fa-tags nav-icon"></i>
                                        <p>Tipos de Jogo</p>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_game')): ?>
                                <li class="nav-item has-treeview <?php if(request()->is('admin/bets/games*')): ?> menu-open <?php endif; ?>">
                                    <a href="#"
                                       class="nav-link">
                                        <i class="fas fa-ticket-alt nav-icon"></i>
                                        <p>Jogos</p>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <?php if(\App\Models\TypeGame::count() > 0): ?>
                                            <?php $__currentLoopData = \App\Models\TypeGame::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="nav-item">
                                                    <a href="<?php echo e(route('admin.bets.games.index', ['type_game' => $menu->id])); ?>"
                                                       class="nav-link <?php if(request()->is('admin/bets/games/'. $menu->id) || request()->is('admin/bets/games/create/'. $menu->id)): ?> active <?php endif; ?>">
                                                        <i class="far fa-dot-circle nav-icon"></i>
                                                        <p><?php echo e($menu->name); ?></p>
                                                    </a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['read_payments_commission', 'read_payments_draw'])): ?>
                                <li class="nav-item has-treeview <?php if(request()->is('admin/bets/payments*')): ?> menu-open <?php endif; ?>">
                                    <a href="#"
                                       class="nav-link">
                                        <i class="fas fa-dollar-sign nav-icon"></i>
                                        <p>Pagamentos</p>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_payments_commission')): ?>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.bets.payments.commissions.index')); ?>"
                                                   class="nav-link <?php if(request()->is('admin/bets/payments/commissions')): ?> active <?php endif; ?>">
                                                    <i class="fas fa-comments-dollar nav-icon"></i>
                                                    <p>Comissões</p>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_payments_draw')): ?>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.bets.payments.draws.index')); ?>"
                                                   class="nav-link <?php if(request()->is('admin/bets/payments/draws')): ?> active <?php endif; ?>">
                                                    <i class="fas fa-donate nav-icon"></i>
                                                    <p>Prêmios</p>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_draw')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.bets.draws.index')); ?>"
                                       class="nav-link <?php if(request()->is('admin/bets/draws*')): ?> active <?php endif; ?>">
                                        <i class="fas fa-hand-scissors nav-icon"></i>
                                        <p>Sorteios</p>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['read_user', 'read_role', 'read_permission'])): ?>
                    <li class="nav-item has-treeview <?php if(request()->is('admin/reports/*')): ?> menu-open <?php endif; ?>">
                        <a href="#" class="nav-link <?php if(request()->is('admin/reports/*')): ?> active <?php endif; ?>">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Relatórios
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_user')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.reports.used.dozens')); ?>"
                                    class="nav-link <?php if(request()->is('admin/settings/used-dozens*')): ?> active <?php endif; ?>">
                                    <i class="fas fa-star nav-icon"></i>
                                    <p>Dezenas Utilizadas</p>
                                </a>

                                <a href="<?php echo e(route('admin.reports.points-by-user')); ?>"
                                    class="nav-link <?php if(request()->is('admin/settings/points-by-user*')): ?> active <?php endif; ?>">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>Pontos por Cliente</p>
                                </a>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_extract')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.dashboards.extracts.index')); ?>"
                                       class="nav-link <?php if(request()->is('admin/dashboards/extracts/')): ?> active <?php endif; ?>">
                                        <i class="fas fa-file-alt nav-icon"></i>
                                        <p>Extrato</p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(\App\Helper\UserValidate::iAmAdmin()): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.dashboards.extracts.manualRecharge')); ?>"
                                       class="nav-link <?php if(request()->is('admin/dashboards/extracts/manual-recharge')): ?> active <?php endif; ?>">
                                        <i class="fas fa-file-alt nav-icon"></i>
                                        <p>Extrato Recarga Manual</p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(\App\Helper\UserValidate::iAmAdmin()): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.dashboards.customer.balance')); ?>"
                                        class="nav-link <?php if(request()->is('admin/dashboards/custome/balance')): ?> active <?php endif; ?>">
                                        <i class="fas fa-file-alt nav-icon"></i>
                                        <p>Saldo de Clientes</p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(\App\Helper\UserValidate::iAmAdmin()): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.dashboards.extracts.sales')); ?>"
                                       class="nav-link <?php if(request()->is('admin/dashboards/extracts/sales')): ?> active <?php endif; ?>">
                                        <i class="fas fa-file-alt nav-icon"></i>
                                        <p>Extrato de Vendas</p>
                                    </a>
                                </li>
                            <?php endif; ?>

                            </li>
                            <?php endif; ?>

                        </ul>
                    </li>
                <?php endif; ?>
                    <li class="nav-link ">
                        <a href="<?php echo e(route('admin.dashboards.wallet.index')); ?>"
                        class="nav-link  <?php if(request()->is('admin/dashboards/wallet/index*')): ?> <?php endif; ?>">
                        <i class="nav-icon fas fa-wallet"></i>
                        <i class="fas fa-dice-d8 "></i>
                            <p>
                                Carteira
                            </p>
                        </a>
                    </li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['read_user', 'read_role', 'read_permission'])): ?>
                <li class="nav-item has-treeview <?php if(request()->is('admin/settings/*')): ?> menu-open <?php endif; ?>">
                    <a href="#" class="nav-link <?php if(request()->is('admin/settings/*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Configurações
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_permission')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.settings.permissions.index')); ?>"
                                   class="nav-link <?php if(request()->is('admin/settings/permissions*')): ?> active <?php endif; ?>">
                                    <i class="fas fa-user-lock nav-icon"></i>
                                    <p>Permissões</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_role')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.settings.roles.index')); ?>"
                                   class="nav-link <?php if(request()->is('admin/settings/roles*')): ?> active <?php endif; ?>">
                                    <i class="fas fa-user-tag nav-icon"></i>
                                    <p>Funções</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_user')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.settings.users.index')); ?>"
                                   class="nav-link <?php if(request()->is('admin/settings/users*')): ?> active <?php endif; ?>">
                                    <i class="fas fa-user nav-icon"></i>
                                    <p>Usuários</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_user')): ?>

                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.settings.qualifications.index')); ?>"
                                class="nav-link <?php if(request()->is('admin/settings/qualifications*')): ?> active <?php endif; ?>">
                                <i class="fas fa-star nav-icon"></i>
                                <p>Qualificações</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            </ul>
        </nav>
    </div>
</aside>


<?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>