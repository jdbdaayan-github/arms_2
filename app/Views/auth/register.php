<?= $this->extend("layouts/auth"); ?>

<?= $this->section('title') ?>
    Register
<?= $this->endSection() ?>

<?= $this->section('content'); ?>
<div class="register-box" style="width: 100%;">
    <div class="register-logo">
        <a href="<?= base_url(); ?>"><b>ARMS</b></a>
    </div>

    <div class="card shadow">
        <div class="card-body register-card-body">
            <p class="login-box-msg mb-3">Register new account</p>

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

            <form action="<?= base_url('register') ?>" method="post">
                <?= csrf_field(); ?>

                <div class="input-group mb-3">
                    <input type="text" name="firstname" class="form-control" placeholder="First Name" value="<?= set_value('firstname'); ?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="middlename" class="form-control" placeholder="Middle Name" value="<?= set_value('middlename'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="lastname" class="form-control" placeholder="Last Name" value="<?= set_value('lastname'); ?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="extension" class="form-control" placeholder="Extension (Jr, Sr, III)" value="<?= set_value('extension'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fas fa-user-tag"></i></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <select name="directorate" id="directorate" class="form-control" required>
                        <option value="" disabled selected>Select Directorate</option>
                        <?php foreach ($directorates as $directorate): ?>
                            <option value="<?= $directorate['id']; ?>" <?= set_value('directorate') == $directorate['id'] ? 'selected' : ''; ?>>
                                <?= esc($directorate['code']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fas fa-building"></i></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <select name="office" id="office" class="form-control" required>
                        <option value="" disabled selected>Select Office</option>
                    </select>
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fas fa-briefcase"></i></div>
                    </div>
                </div>

                <hr>

                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?= set_value('username'); ?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fas fa-user-circle"></i></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
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
                <div class="form-group text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-user-plus"></i> Register
                    </button>
                </div>

                <p class="text-center mt-3">
                    <a href="<?= base_url('login'); ?>">Already have an account?</a>
                </p>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        // Trigger when directorate changes
        $('#directorate').change(function() {
            var directorateId = $(this).val();
            if(directorateId) {
                // AJAX request to fetch offices based on the selected directorate
                $.ajax({
                    url: '<?= base_url('register/getOfficesbyID'); ?>', // URL to get offices based on directorate
                    type: 'GET',
                    data: { directorate_id: directorateId },
                    success: function(response) {
                        var officeSelect = $('#office');
                        officeSelect.empty(); // Clear previous options
                        officeSelect.append('<option value="" disabled selected>Select Office</option>');

                        // Loop through the response to add new options
                        $.each(response.offices, function(index, office) {
                            officeSelect.append('<option value="' + office.id + '">' + office.code + '</option>');
                        });
                    }
                });
            } else {
                // Reset office options if no directorate is selected
                $('#office').empty().append('<option value="" disabled selected>Select Office</option>');
            }
        });
    });
</script>
<?= $this->endSection(); ?>