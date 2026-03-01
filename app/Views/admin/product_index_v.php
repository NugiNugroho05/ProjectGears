<?= $this->extend('layout/admin_layout') ?>
<?= $this->section('admin_content') ?>
<div class="d-flex justify-content-between mb-3">
    <h3><?= $title ?? 'Daftar Produk' ?></h3>
    <a href="<?= base_url('admin/product/add') ?>" class="btn btn-primary">+ Add Items</a>
</div>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<table class="table table-white table-striped shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($products as $p): ?>
        <tr>
            <td><img src="<?= base_url('assets/img/'.$p['image']) ?>" width="50"></td>
            <td><?= $p['name'] ?></td>
            <td><?= $p['category'] ?></td>
            <td>Rp <?= number_format($p['price'],0,',','.') ?></td>
            <td><?= $p['stock'] ?></td>
            <td>
                <a href="<?= base_url('admin/product/edit/'.$p['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= base_url('admin/product/delete/'.$p['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>