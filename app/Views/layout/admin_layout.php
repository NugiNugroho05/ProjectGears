<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Gears</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .sidebar { min-height: 100vh; background: #212529; color: white; padding-top: 20px; }
        .sidebar a { color: #ccc; text-decoration: none; display: block; padding: 10px 20px; }
        .sidebar a:hover { background: #343a40; color: white; border-left: 4px solid #0d6efd; }
        .active-link { background: #0d6efd !important; color: white !important; }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 p-0 sidebar shadow">
            <h4 class="text-center fw-bold">GEARS ADMIN</h4>
            <hr class="bg-light">
            <a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-home me-2"></i> Dashboard</a>
            <a href="<?= base_url('admin/product') ?>"><i class="fa fa-box me-2"></i> Master Stock</a>
            <a href="<?= base_url('admin/stock/laptop') ?>"><i class="fa fa-laptop me-2"></i> Laptops</a>
            <a href="<?= base_url('admin/stock/electronics') ?>"><i class="fa fa-mobile me-2"></i> Electronics</a>
            <a href="<?= base_url('admin/orders') ?>"><i class="fa fa-shopping-cart me-2"></i> Orders</a>
            <a href="<?= base_url('/') ?>"><i class="fa fa-sign-out-alt me-2"></i> Back to Site</a>
        </div>
        <div class="col-md-10 p-4">
            <?= $this->renderSection('admin_content') ?>
        </div>
    </div>
</div>
</body>
</html>