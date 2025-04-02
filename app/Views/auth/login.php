<?= $this->extend("layouts/auth"); ?>

<?= $this->section('content'); ?>
<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url(); ?>"><b>ARMS</b></a>
    </div>

    <div class="card shadow">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <?php if (session()->getFlashdata('errors')) : ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                            <li><?= esc($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('login/authenticate'); ?>" method="post">
                <?= csrf_field(); ?>

                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" id="password" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fas fa-lock"></i></div>
                    </div>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-secondary" id="togglePassword" onclick="togglePassword()">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" id="confirm_password" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fas fa-lock"></i></div>
                    </div>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-secondary" id="toggleConfirmPassword" onclick="toggleConfirmPassword()">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-sign-in-alt"></i> Sign In
                    </button>
                </div>
            </form>

            <p class="mb-1 text-center">
                <a href="<?= base_url('forgot-password'); ?>">I forgot my password</a>
            </p>
            <p class="mb-0 text-center">
                <a href="<?= base_url('register'); ?>" class="text-center">Don't have an account? Register</a>
            </p>
        </div>
    </div>
</div>

<script>
    // Toggle password visibility
    function togglePassword() {
        var passwordField = document.getElementById('password');
        var toggleIcon = document.getElementById('togglePassword');
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleIcon.innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            passwordField.type = 'password';
            toggleIcon.innerHTML = '<i class="fas fa-eye"></i>';
        }
    }

    // Toggle confirm password visibility
    function toggleConfirmPassword() {
        var confirmPasswordField = document.getElementById('confirm_password');
        var toggleIcon = document.getElementById('toggleConfirmPassword');
        if (confirmPasswordField.type === 'password') {
            confirmPasswordField.type = 'text';
            toggleIcon.innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            confirmPasswordField.type = 'password';
            toggleIcon.innerHTML = '<i class="fas fa-eye"></i>';
        }
    }
</script>

<?= $this->endSection(); ?>
