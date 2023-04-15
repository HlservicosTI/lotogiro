<?php $__env->startSection('title', trans('admin.dashboard.page-title')); ?>

<?php $__env->startSection('content'); ?>
<div class="row bg-white p-3">
    <div class="col-md-12 p-4 faixa-jogos">
        <h3 class="text-center text-bold"><?php echo e(trans('admin.dashboard.page-title')); ?></h3>
    </div>

    
    <?php if($User['type_client'] == 1): ?>
    <div class="card-deck" style="width: 100%; margin-bottom: 30px; margin-left: auto;
                margin-right: auto">

        <div class="card text-white bg-success mb-6">
            <div class="card-body">
                <h5 class="card-title text-bold"><?php echo e(trans('admin.dashboard.games-done-title')); ?></h5>
                <i class="nav-icon fas fa-chart-line" style="float: right; font-size: 50px"></i>
                <p class="card-text"><?php echo e($JogosFeitos); ?></p>
            </div>
        </div>
        <div class="card text-white bg-danger mb-6" style="">
            <div class="card-body text-bold">
                <h5 class="card-title"><?php echo e(trans('admin.dashboard.balance-title')); ?></h5> <i class="nav-icon fas fa-chart-line" style="float: right; font-size: 50px"></i>
                <p class="card-text">R$<?php echo e($saldo); ?></p>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="col-md-12 p-4">
    <div class="card w-100">
        <div class="card-header indica-card">
            Indicações
        </div>
        <div class="container">
            <div class="row">
                <?php if($User['type_client'] != 1): ?>
                <div class="card-body col-lg-12 col-sm-12">
                    <div class="col-lg-12 my-2 ">
                        <div class="form-group">
                            <input type="text" class="form-control" id="link_copy" value="<?php echo e(route('games.bet', ['user' => auth()->id()])); ?>">
                        </div>
                    </div>
                </div>
                <!-- button copiar link -->
                <div class="card-body col-lg-4 col-sm-5">
                    <div class="col-lg-12 my-2 alert bg-light indica-corpo" style="float:left;">  
                    <p class="mensagem"><?php echo e(trans('admin.dashboard.copy-link-message')); ?></p>
                        <button type="button" id="btn_copy_link" class="btn btn-info btn-block"><?php echo e(trans('admin.copy-link-button')); ?></button>
                    </div>
                </div> 

                <!-- button seus indicados 
                <div class="card-body col-lg-4 col-sm-6">
                    <div class="col-lg-12 my-2 indica-corpo bg-light-2" style="color: #fff;" role="alert">
                    <p class="mensagem"><?php echo e(trans('admin.dashboard.referrals-message')); ?></p>
                        <a href="<?php echo e(route('admin.settings.users.indicated')); ?>" class="btn btn-block btn-info"> 
                            <?php echo e(trans('admin.dashboard.referrals-button')); ?>

                        </a>
                    </div>
                </div> -->

                <!--
                <div class="card-body col-lg-6 col-sm-12">
                    <div class="col-lg-12 my-2 alert bg-light indica-corpo" style="float:right;">
                        <a href="https://api.whatsapp.com/send?text=Segue link para criar um jogo: <?php echo e(route('games.bet', ['user' => auth()->id()])); ?>" target="_blank" style="text-decoration: none !important;">
                            <button type="button" class="btn btn-info btn-block">
                                <?php echo e(trans('admin.dashboard.copy-whatsapp-button')); ?>

                            </button>
                            <p class="mensagem"><?php echo e(trans('admin.dashboard.copy-whatsapp-message')); ?></p>
                        </a>
                    </div>
                </div> -->

                <!-- button indique e ganhe -->
                <?php endif; ?>
                <div class="card-body col-lg-4 col-sm-6">
                    <div class="col-lg-12 my-2 alert bg-light indica-corpo" role="alert" >
                        <input id="linkDeIndicacao" style="display:none;" type="text" readonly class="link_copy_link" value="<?php echo e(env('APP_URL')); ?>/admin/indicate/<?php echo e(auth()->user()->id); ?>" />
                        <p class="mensagem"><?php echo e(trans('admin.dashboard.referral-message')); ?></p>
                        <button type="button" id="btn_copy_link2" class="btn btn-info btn-block" onclick="CopyMe(getUrl())"><?php echo e(trans('admin.dashboard.referral-button-text')); ?> </button>
                        
                    </div>
                </div> 
                
                <!-- button seus indicados -->
                     <div class="card-body col-lg-4 col-sm-6">
                    <div class="col-lg-12 my-2 indica-corpo bg-light-2" style="color: #fff;" role="alert">
                    <p class="mensagem"><?php echo e(trans('admin.dashboard.referrals-message')); ?></p>
                        <a href="<?php echo e(route('admin.settings.users.indicated')); ?>" class="btn btn-block btn-info">
                            <?php echo e(trans('admin.dashboard.referrals-button')); ?> 
                        </a>
                    </div> 
                </div> 
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 p-4">
    <div class="card w-100">
        <div class="card-header indica-card">
            <?php echo e(trans('admin.dashboard.points-title')); ?>

        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo e(number_format($balances['personal_balance'],2,',','.')); ?></h3>
                            <p><?php echo e(trans('admin.dashboard.personal-points')); ?></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="small-box-footer p-2"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="small-box btn-danger">
                        <div class="inner">
                            <h3><?php echo e(number_format($balances['group_balance'],2,',','.')); ?></h3>
                            <p><?php echo e(trans('admin.dashboard.group-points')); ?></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="small-box-footer p-2"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="small-box btn-success">
                        <div class="inner">
                            <h3><?php echo e(number_format($balances['total_balance'],2,',','.')); ?></h3>
                            <p><?php echo e(trans('admin.dashboard.total-points')); ?></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="small-box-footer p-2"></span>
                    </div>
                </div>
                <?php if ($qualificationAtived) : ?>
                    <div class="col-md-6">
                        <div class="small-box btn-primary">
                            <div class="inner">
                                <h3><?php echo e($qualificationAtived->getQualification()->description); ?></h3>
                                <p><?php echo e(trans('admin.dashboard.your-qualification')); ?><?php if (!is_null($goalCalculation)) : ?><br /><?php echo e(trans('admin.dashboard.personal-points-used')); ?> ( <?php echo e($goalCalculation['personalPoints']); ?> ) / <?php echo e(trans('admin.dashboard.group-points-used')); ?> ( <?php echo e($goalCalculation['groupPoints']); ?> )<?php endif; ?></p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <span class="small-box-footer p-2"></span>
                        </div>
                    </div>
                    <?php if ($nextGoal !== false) : ?>
                        <div class="col-md-6">
                            <div class="small-box btn-secondary">
                                <div class="inner">
                                    <h3><?php echo e($nextGoal['totalDiff']); ?></h3>
                                    <p><?php echo e(trans('admin.dashboard.points-next-qualification')); ?><br /><?php echo e(trans('admin.dashboard.personal-points-used')); ?> ( <?php echo e($nextGoal['personalPoints']); ?> ) / <?php echo e(trans('admin.dashboard.group-points-used')); ?> ( <?php echo e($nextGoal['groupPoints']); ?> )</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-arrow-up"></i>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?php echo e(floor(round($nextGoal['percentage'],0))); ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo e(floor(round($nextGoal['percentage'],0))); ?>%</div>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="col-md-6">
                            <div class="small-box btn-secondary">
                                <div class="inner">
                                    <h3><?php echo e(trans('admin.dashboard.max-points-title')); ?></h3>
                                    <p><?php echo e(trans('admin.dashnoard.max-points-text')); ?><br />&nbsp;</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-trophy"></i>
                                </div>
                                <span class="small-box-footer p-2"></span>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

  <!--  <div class="card w-100">
        <div class="card-header indica-card d-flex justify-content-between align-items-center">
            <div class="col"><span>Ranking</span></div>

            <?php $htmlRanking = '' ?>

            <?php if(is_array($rankings) && count($rankings) > 0): ?>
            <?php $__currentLoopData = $rankings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ranking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php ++$key; $htmlRanking .= "{$key} {$ranking->name} - R$ {$ranking->total},%0a"; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <div class="col text-right">
                <a href="https://api.whatsapp.com/send?text=<?php echo e($htmlRanking); ?>" class="btn btn-success">Compartilhar</a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php if(is_array($rankings) && count($rankings) > 0): ?>
                    <?php $__currentLoopData = $rankings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ranking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p>#<?php echo e(++$key); ?> <?php echo e($ranking->name); ?> - R$ <?php echo e($ranking->total); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div> -->
</div>

</div>

<div class="col-md-15">
    <?php if(\App\Models\TypeGame::count() > 0): ?>
    <div class="row">
        <?php $__currentLoopData = \App\Models\TypeGame::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeGame): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6 my-2">
            <a href="<?php echo e(route('admin.bets.games.create', ['type_game' => $typeGame->id])); ?>">
                <button class="btn btn-block text-white" style="background-color: <?php echo e($typeGame->color); ?>;"><?php echo e($typeGame->name); ?></button>
            </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php else: ?>
    <div class="col-md-12 p-3 text-center">
        <?php echo e(trans('admin.dashboard.games-not-found')); ?>

    </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    *:focus {
        outline: none;
    }

    .link_copy_link {
        width: 100%;
        padding: .5em 0 .5em 0;
        border: 1px solid #007bff;
        font-size: 24px;
        text-align: center;
    }

    .link_copy_link:active,
    .link_copy_link:focus,
    .link_copy_link:focus-visible {
        border: 1px solid #00c054 !important;
    }

    .bg-light-2 {
        background-color: #f8f9fa !important;
    }

    .indica-corpo {
        padding: 35px;
    }

    .mensagem {
        color: #000;
        font-size: 10px;
        text-align: center;
        margin-top: 10px;
    }

    @media  screen and (max-width: 600px) {
        .faixa-jogos {
            background: url(https://superlotogiro.com/images/super-lotogiro01.jpg) auto;
            background-position: center;
        }


        .btn {
            padding: 10px;

        }

        .indica-corpo {
            padding: 0px;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    const copiedUrlText = "<?php echo e(trans('admin.dashboard.copied-url')); ?>";

    $('#btn_copy_link').click(function() {
        var link = document.getElementById("link_copy");
        link.select();
        document.execCommand('copy');
        Swal.fire(
            copiedUrlText,
            '',
            'success'
        );
    });

    function CopyMe(TextToCopy) {
        var TempText = document.createElement("input");
        TempText.value = TextToCopy;
        document.body.appendChild(TempText);
        TempText.select();

        document.execCommand("copy");
        document.body.removeChild(TempText);
        Swal.fire(
            copiedUrlText,
            '',
            'success'
        );
    };

    function getUrl() {
        return document.getElementById("linkDeIndicacao").value;
    };

    (function() {
        function copy(element) {
            return function() {
                document.execCommand('copy', false, element.select());
            };
        };

        var linkIndicate = document.querySelector('.link_copy_link');
        var copyUrlIndicate = copy(linkIndicate);
        linkIndicate.addEventListener('click', copyUrlIndicate, false);

    }());
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/pages/home.blade.php ENDPATH**/ ?>