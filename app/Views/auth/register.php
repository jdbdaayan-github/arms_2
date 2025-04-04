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

<script>
    // JavaScript to handle dynamic office options based on directorate
    document.getElementById('directorate').addEventListener('change', function() {
        let directorateId = this.value;

        // Make an AJAX request to fetch offices based on directorate
        fetch(`<?= base_url('directorates/getOffices'); ?>/${directorateId}`)
            .then(response => response.json())
            .then(data => {
                // Get the office select element
                const officeSelect = document.getElementById('office');
                
                // Clear previous office options
                officeSelect.innerHTML = '<option value="" disabled selected>Select Office</option>';
                
                // Populate new office options based on the response
                data.offices.forEach(office => {
                    const option = document.createElement('option');
                    option.value = office.id;
                    option.textContent = office.code + "-" + office.name;
                    officeSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching offices:', error));
    });
</script>

<?= $this->endSection(); ?>