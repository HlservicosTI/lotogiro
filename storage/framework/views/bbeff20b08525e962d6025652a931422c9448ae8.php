<?php $__env->startSection('title', trans('admin.register.page-title')); ?>

<?php $__env->startSection('content'); ?>
    <style type="text/css">
        .login-page,
        .register-page {
          align-items: center;
          background-image: url(/admin/images/painel/super-lotogiro03.jpg);
          background-size: cover;
          display: flex;
          flex-direction: column;
          height: 100vh;
          justify-content: center;
        }
    </style>
    <div class="col-lg-6 col-md-12 mt-5">
        <div class="login-logo">

            <img src="<?php echo e(asset(env('logo'))); ?>" alt="" width="300" height="150">

        </div>
        <div class="card">
            <div class="card-body">
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
                    <?php if($indicator->name): ?>
                    <div class="alert alert-default-primary text-center text-bold fade show">
                        <?php echo e(trans('admin.register.referred-by')); ?> <?php echo e($indicator->name); ?>

                    </div>
                    <?php endif; ?>
                </div>
                <h3 class="login-box-msg"><?php echo e(trans('admin.register.page-header')); ?></h3>

                <form method="POST" action="<?php echo e(route('register')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="indicator" id="indicator" value="<?php echo e($indicator->id); ?>">
                    <div class="form-group row">

                        <div class="col-sm-12 col-md-12">
                            <label for="email" class="col-form-label text-md-left"><?php echo e(trans('admin.register.email-label')); ?></label>
                            <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>
                            <?php if($errors->has('email')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <label for="name" class="col-form-label text-md-left"><?php echo e(trans('admin.register.name-label')); ?></label>
                            <input id="name" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" required autofocus>
                            <?php if($errors->has('name')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <label for="last_name" class="col-form-label text-md-left"><?php echo e(trans('admin.register.last-name-label')); ?></label>
                            <input id="last_name" type="text" class="form-control<?php echo e($errors->has('last_name') ? '
                            is-invalid' : ''); ?>" name="last_name" value="<?php echo e(old('last_name')); ?>" required autofocus>
                            <?php if($errors->has('last_name')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('last_name')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    

                    <div class="form-group row">

                        <div class="col-sm-12 col-md-6">
                            <label for="pix" class="col-form-label text-md-left"><?php echo e(trans('admin.register.pix-label')); ?></label>
                            <input id="pix" type="text" class="form-control" name="pix" value="" autofocus placeholder="(opcional)">
                        </div>
                        
                        <div class="col-sm-6 col-md-6">
                            <label for="phone" class="col-form-label text-md-left"><?php echo e(trans('admin.register.phone-label')); ?></label>
                            <input id="phone" type="text"
                                   class="form-control<?php echo e($errors->has('phone') ? 'is-invalid' : ''); ?>"
                                   name="phone" value="<?php echo e(old('phone')); ?>" required>
                            <?php if($errors->has('phone')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('phone')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 col-md-6">
                            <label for="password" class="col-form-label text-md-left"><?php echo e(trans('admin.register.password-label')); ?></label>
                            <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
                            <?php if($errors->has('password')): ?>
                                <span class="invalid-feedback">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <label for="password-confirm" class="col-form-label text-md-left"><?php echo e(trans('admin.register.confirm-password-label')); ?></label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                        </div>
                    </div>


                    <?php if(config('settings.reCaptchStatus')): ?>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-4">
                                <div class="g-recaptcha" data-sitekey="<?php echo e(config('settings.reCaptchSite')); ?>"></div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                <?php echo e(trans('admin.register.button')); ?>

                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<script src="<?php echo e(asset('admin/layouts/plugins/jquery/jquery.min.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>
<script>
    $(document).ready(function(){
        let selector = document.getElementById("phone");
        Inputmask("(99) 9 9999-9999").mask(selector);
    });
</script>

<?php echo $__env->make('admin.layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/pages/auth/register.blade.php ENDPATH**/ ?>