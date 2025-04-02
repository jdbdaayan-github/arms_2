<?= $this->extend("layouts/app"); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Office</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('offices') ?>">Offices</a></li>
                        <li class="breadcrumb-item active">Add New Office</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card shadow-sm" style="border-top: 3px solid #ddd;">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-plus"></i> Add Office</h3>
                        </div>
                        <div class="card-body">
                            <!-- Office Form -->
                            <form action="<?= base_url('offices/store') ?>" method="post">
                                <?= csrf_field(); ?>
                                
                                <div class="form-group">
                                    <label for="office_code">Office Code <span class="text-danger">*</span></label>
                                    <input type="text" name="office_code" id="office_code" class="form-control" placeholder="Enter Office Code" value="<?= old('office_code'); ?>" required>
                                    <?php if(session()->getFlashdata('errors')['office_code'] ?? false): ?>
                                        <small class="text-danger"><?= session()->getFlashdata('errors')['office_code']; ?></small>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="office_name">Office Name <span class="text-danger">*</span></label>
                                    <input type="text" name="office_name" id="office_name" class="form-control" placeholder="Enter Office Name" value="<?= old('office_name'); ?>" required>
                                    <?php if(session()->getFlashdata('errors')['office_name'] ?? false): ?>
                                        <small class="text-danger"><?= session()->getFlashdata('errors')['office_name']; ?></small>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="directorate_id">Directorate <span class="text-danger">*</span></label>
                                    <select name="directorate_id" id="directorate_id" class="form-control" required>
                                        <option value="">Select Directorate</option>
                                        <?php foreach ($directorates as $directorate): ?>
                                            <option value="<?= $directorate['id'] ?>" <?= old('directorate_id') == $directorate['id'] ? 'selected' : ''; ?>>
                                                <?= esc($directorate['name']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if(session()->getFlashdata('errors')['directorate_id'] ?? false): ?>
                                        <small class="text-danger"><?= session()->getFlashdata('errors')['directorate_id']; ?></small>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group text-right">
                                    <a href="<?= base_url('offices') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Office</button>
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
