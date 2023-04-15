<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>

  <div class="container-login100">

        <?php if(session('SenhaRecuperada')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('SenhaRecuperada')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
        <div class="wrap-login100">

            <div class="card-body login-card-body">
            <?php if(session('success')): ?>
            <div class="col-md-12 alert alert-success" style=" margin-right:0%;" role="alert">
                <?php echo e(session('success')); ?>

            </div>
            <?php endif; ?>
            <div class="login-logo mt-md-5">

            <img src="<?php echo e(asset(env('logo'))); ?>" alt="" width="150" height="150">

        </div>
                <div class="col-md-12 px-4">
                    <?php $__errorArgs = ['success'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <?php echo e($message); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <?php if(session('erro')): ?>
                    <div class="col-md-12 alert alert-danger" style=" margin-right:0%;" role="alert">
                        <?php echo e(session('erro')); ?>

                    </div>
                    <?php endif; ?>
                    <?php $__errorArgs = ['error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-default-danger alert-dismissible fade show">
                        <?php echo e($message); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <h3 class="login-box-msg">Login</h3>

                <form method="POST" action="<?php echo e(route('admin.post.login')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="wrap-input100">
                        <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> input100" name="email"
                               placeholder="E-mail">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <?php echo e($message); ?>

                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="wrap-input100">
                        <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> input100"
                               name="password" placeholder="Senha">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <?php echo e($message); ?>

                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember"
                                       id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="remember">
                                    <?php echo e(trans('admin.keep-connected')); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="login100-form-btn">Acessar</button>
                        </div>
                    </div>
                </form>

                <a href="<?php echo e(route('forget.password.get')); ?>"><?php echo e(trans('admin.forgot-password-link')); ?></a>

                <div class="row">
                    <div class="col-sm-12">
                        <p class="mb-1 text-bold">
                            <?php echo e(trans('admin.register-label')); ?><br>
                            <a class="btn btn-block btn-info right"
                               href="<?php echo e(route('register')); ?>">
                                <?php echo e(trans('admin.register-button')); ?>

                            </a>
                        </p>

                        <a href="https://wa.me/558196826967?text=Olá, poderia me ajudar?"
                           class="btn btn-block btn-success"
                           title="Precisa de ajuda?"
                           target="_blank">
                            <i style="border:none;"class="fa fa-whatsapp"></i> Precisa de ajuda?
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/pages/auth/login.blade.php ENDPATH**/ ?>