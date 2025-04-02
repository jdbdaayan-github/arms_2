<?= $this->extend("layouts/app"); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Offices List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Offices</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Offices List Table -->
                <div class="col-12">
                    <div class="card shadow-sm" style="border-top: 3px solid #ddd;">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title"><i class="fas fa-building"></i> List of Offices</h3>
                            <a href="<?= base_url('offices/create') ?>" class="btn btn-primary btn-sm ml-auto">
                                <i class="fas fa-plus"></i> Add New Office
                            </a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Office Code</th>
                                        <th>Office Name</th>
                                        <th>Directorate</th> <!-- New Column -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($offices as $office): ?>
                                    <tr>
                                        <td><?= esc($office['code']); ?></td>
                                        <td><?= esc($office['name']); ?></td>
                                        <td><?= esc($office['directorate_code']); ?></td> <!-- New Column Data -->
                                        <td>
                                            <a href="<?= base_url('offices/view/' . $office['id']) ?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> View</a>
                                            <a href="<?= base_url('offices/edit/' . $office['id']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="<?= base_url('offices/delete/' . $office['id']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</a>
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
