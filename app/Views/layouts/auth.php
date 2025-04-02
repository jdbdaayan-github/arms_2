<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE | Authentication</title>
    
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/adminlte.min.css'); ?>">
    
    <!-- FontAwesome (Updated Version) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        body {
            background-color: #f4f6f9;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
        .auth-container {
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="auth-container">
        <?= $this->renderSection('content'); ?>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE JS -->
    <script src="<?= base_url('assets/adminlte/dist/js/adminlte.min.js'); ?>"></script>
</body>
</html>
