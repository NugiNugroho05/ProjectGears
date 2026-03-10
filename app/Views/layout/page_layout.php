<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('layout/head') ?>
</head>

<body>
    <!-- Navbar -->
    <?= $this->include('layout/navbar') ?>
    <!-- Content -->
    <?= $this->renderSection('content') ?>
    <!-- Footer -->
    <?= $this->include('layout/footer'); ?>
</body>

</html>