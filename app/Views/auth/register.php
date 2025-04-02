<?= $this->extend("layouts/auth"); ?>

<?= $this->section('content'); ?>
<div class="register-box">
    <div class="register-logo">
        <a href="<?= base_url(); ?>"><b>ARMS</b></a>
    </div>

    <div class="card shadow">
        <div class="card-body register-card-body">
            <p class="text-center">Register new account</p>

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

            <form action="<?= base_url('register/store') ?>" method="post">
                <?= csrf_field(); ?>

                <div class="input-group mb-3">
                    <input type="text" name="firstname" class="form-control" placeholder="First Name" value="<?= old('firstname'); ?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="middlename" class="form-control" placeholder="Middle Name" value="<?= old('middlename'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="lastname" class="form-control" placeholder="Last Name" value="<?= old('lastname'); ?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="extension" class="form-control" placeholder="Extension (Jr, Sr, III)" value="<?= old('extension'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fas fa-user-tag"></i></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="directorate" class="form-control" placeholder="Directorate" value="<?= old('directorate'); ?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fas fa-building"></i></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="office" class="form-control" placeholder="Office" value="<?= old('office'); ?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fas fa-briefcase"></i></div>
                    </div>
                </div>

                <hr>

                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?= old('username'); ?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fas fa-user-circle"></i></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fas fa-lock"></i></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fas fa-lock"></i></div>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-user-plus"></i> Register
                    </button>
                </div>

                <p class="text-center">
                    <a href="<?= base_url('login'); ?>">Already have an account?</a>
                </p>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
