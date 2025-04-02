<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add User</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User Information</h3>
                        </div>
                        <div class="card-body">
                            <?= \Config\Services::validation()->listErrors(); ?>
                            <form action="<?= site_url('users/store') ?>" method="post">
                                <?= csrf_field(); ?>

                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" name="firstname" class="form-control" value="<?= old('firstname') ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="middle">Middle Name</label>
                                    <input type="text" name="middle" class="form-control" value="<?= old('middle') ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" name="lastname" class="form-control" value="<?= old('lastname') ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="extension">Extension</label>
                                    <input type="text" name="extension" class="form-control" value="<?= old('extension') ?>">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?= old('email') ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="directorate">Directorate</label>
                                    <input type="text" name="directorate" class="form-control" value="<?= old('directorate') ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="office">Office</label>
                                    <input type="text" name="office" class="form-control" value="<?= old('office') ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" value="<?= old('username') ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Add User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>
