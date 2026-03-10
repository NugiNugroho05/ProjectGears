<?= $this->extend('layout/admin_layout') ?>
<?= $this->section('admin_content') ?>
<h2>Dashboard Overview</h2>
<div class="row mt-4 text-white">
    <div class="col-md-4">
        <div class="card bg-primary p-3">
            <h5>Total Produk</h5>
            <h1><?= $total_products ?></h1>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-danger p-3">
            <h5>Low Stock (< 5)</h5>
            <h1><?= $low_stock ?></h1>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success p-3">
            <h5>New Orders</h5>
            <h1><?= $new_orders ?></h1>
        </div>
    </div>
</div>
<?= $this->endSection() ?>