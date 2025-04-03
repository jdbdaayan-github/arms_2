<?= $this->extend("layouts/auth"); ?>

<?= $this->section('content'); ?>
<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url(); ?>"><b>ARMS</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg mb-3">Sign in to start your session</p>

            <!-- Display errors -->
            <?php if (session()->getFlashdata('errors')) : ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                            <li><?= esc($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Display success message -->
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>

            <!-- Login form -->
            <form action="<?= base_url('login/authenticate'); ?>" method="post">
            <?= csrf_field(); ?>

            <div class="input-group mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                <div class="input-group-append">
                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <div class="input-group-append">
                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                </div>
            </div>

            <!-- CAPTCHA -->
            <div class="form-group mb-3">
                <img src="<?= $captcha_image; ?>" alt="CAPTCHA Image" class="img-fluid">
                <input type="text" name="captcha" class="form-control mt-2" placeholder="Enter CAPTCHA" required>
            </div>

            <!-- Remember Me checkbox -->
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember Me</label>
                    </div>
                </div>
            </div>
            
            <!-- Sign In button -->
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
            </div>
        </form>


            <p class="mb-1 text-center">
                <a href="<?= base_url('forgot-password'); ?>">I forgot my password</a>
            </p>
            <p class="mb-0 text-center">
                <a href="<?= base_url('register'); ?>" class="text-center">Don't have an account? Register</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<?= $this->endSection(); ?>
