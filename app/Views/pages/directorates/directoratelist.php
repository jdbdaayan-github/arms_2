<?= $this->extend("layouts/app"); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Directorates List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Directorates</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Directorates List Table -->
                <div class="col-12">
                    <div class="card shadow-sm" style="border-top: 3px solid #ddd;">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title"><i class="fas fa-sitemap"></i> List of Directorates</h3>
                            <a href="<?= base_url('directorates/create') ?>" class="btn btn-primary btn-md ml-auto">
                                <i class="fas fa-plus"></i> Add New
                            </a>
                        </div>
                        <div class="card-body">
                            <!-- Success Alert -->
                            <?php if (session()->getFlashdata('success')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('success'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Directorate Code</th>
                                        <th>Directorate Name</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($directorates as $directorate): ?>
                                    <tr>
                                        <td><?= esc($directorate['code']); ?></td>
                                        <td><?= esc($directorate['name']); ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('directorates/view/' . $directorate['id']) ?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> View</a>
                                            <a href="<?= base_url('directorates/edit/' . $directorate['id']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="<?= base_url('directorates/delete/' . $directorate['id']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>
