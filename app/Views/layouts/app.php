<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminLTE | Dashboard</title>
    
    <!-- Link to AdminLTE CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/adminlte.min.css'); ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    
    <!-- Additional CSS -->
    <?= isset($css) ? implode('', $css) : ''; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?= view('layouts/partials/navbar'); ?>

        <!-- Sidebar -->
        <?= view('layouts/partials/sidebar'); ?>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Content goes here -->
                    <?= $this->renderSection('content'); ?>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <?= view('layouts/partials/footer'); ?>

    </div>

    <!-- jQuery (necessary for AdminLTE and Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- AdminLTE JS -->
    <script src="<?= base_url('assets/adminlte/dist/js/adminlte.min.js'); ?>"></script>
    
    <!-- Additional JS -->
    <?= isset($js) ? implode('', $js) : ''; ?>
</body>
</html>
