<div class="row">
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
    </div>
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title"><?php echo e(trans('admin.game')); ?></h3>
            </div>
            <div class="card-body">
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('pages.bets.game.form', ['typeGame' => $typeGame ?? null , 'clients' => $clients ?? null, 'game' => $game ?? null])->html();
} elseif ($_instance->childHasBeenRendered('1fMKpOO')) {
    $componentId = $_instance->getRenderedChildComponentId('1fMKpOO');
    $componentTag = $_instance->getRenderedChildComponentTagName('1fMKpOO');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('1fMKpOO');
} else {
    $response = \Livewire\Livewire::mount('pages.bets.game.form', ['typeGame' => $typeGame ?? null , 'clients' => $clients ?? null, 'game' => $game ?? null]);
    $html = $response->html();
    $_instance->logRenderedChild('1fMKpOO', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <a href="<?php echo e(route('admin.bets.games.index', ['type_game' => $typeGame->id])); ?>">
            <button type="button" class="btn btn-block btn-info"><?php echo e(trans('admin.back-to-main-page')); ?></button>
        </a>
    </div>
    <div class="col-md-6 mb-3">
        <button type="submit" id="button_game" onclick="mudarListaNumerosGeral()"
                class="btn btn-block btn-success"><?php if(request()->is('admin/bets/games/create/'.$typeGame->id)): ?> 
                <?php echo e(trans('admin.games.insert-game-button')); ?>

                <?php else: ?>  
                <?php echo e(trans('admin.games.update-game-button')); ?>

                <?php endif; ?> 
            </button>
    </div>
</div>


<?php $__env->startPush('scripts'); ?>

    <script src="<?php echo e(asset('admin/layouts/plugins/inputmask/jquery.inputmask.min.js')); ?>"></script>
    <script>
        var formID = document.getElementById("form_game");
        var send = $("#button_game");

        $(formID).submit(function(event){
            if (formID.checkValidity()) {
                send.attr('disabled', 'disabled');
            }
        });

        $(document).ready(function () {
            $('#cpf').inputmask("999.999.999-99");
            $('#phone').inputmask("(99) 9999[9]-9999");
        });
    </script>

<?php $__env->stopPush(); ?>

<?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/pages/bets/game/_form.blade.php ENDPATH**/ ?>