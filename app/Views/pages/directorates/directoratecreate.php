<?= $this->extend("layouts/app"); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Directorate</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('directorates') ?>">Directorates</a></li>
                        <li class="breadcrumb-item active">Add New Directorate</li>
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
                            <h3 class="card-title"><i class="fas fa-plus"></i> Add Directorate</h3>
                        </div>
                        <div class="card-body">
                            <!-- Directorate Form -->
                            <form action="<?= base_url('directorates/store') ?>" method="post">
                                <?= csrf_field(); ?>
                                
                                <div class="form-group">
                                    <label for="code">Directorate Code <span class="text-danger">*</span></label>
                                    <input type="text" name="code" id="code" class="form-control" placeholder="Enter Directorate Code" value="<?= old('code'); ?>" required>
                                    <?php if(session()->getFlashdata('errors')['code'] ?? false): ?>
                                        <small class="text-danger"><?= session()->getFlashdata('errors')['code']; ?></small>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="name">Directorate Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Directorate Name" value="<?= old('name'); ?>" required>
                                    <?php if(session()->getFlashdata('errors')['name'] ?? false): ?>
                                        <small class="text-danger"><?= session()->getFlashdata('errors')['name']; ?></small>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group text-right">
                                    <a href="<?= base_url('directorates') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Directorate</button>
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
