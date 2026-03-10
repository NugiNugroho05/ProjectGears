<?= $this->extend('layout/admin_layout') ?>
<?= $this->section('admin_content') ?>

<div class="d-flex justify-content-between mb-3">
    <h3>Detail Pesanan #ORD-<?= $order['id'] ?></h3>
    <a href="<?= base_url('admin/orders') ?>" class="btn btn-secondary">Kembali</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h5>Informasi Pelanggan</h5>
                <p><strong>Nama:</strong> <?= $order['first_name'] ?></p>
                <p><strong>Alamat:</strong> <?= $order['address'] ?></p>
            </div>
            <div class="col-md-6">
                <h5>Informasi Pesanan</h5>
                <p><strong>Total:</strong> Rp <?= number_format($order['total_price'],0,',','.') ?></p>
                <p><strong>Status:</strong> 
                    <span class="badge bg-<?= ($order['status'] == 'Pending') ? 'warning text-dark' : 'success' ?>">
                        <?= $order['status'] ?>
                    </span>
                </p>
                <p><strong>Metode Pembayaran:</strong> <?= $order['payment_method'] ?></p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>