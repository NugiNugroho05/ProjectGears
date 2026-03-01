<?= $this->extend('layout/admin_layout') ?>
<?= $this->section('admin_content') ?>

<div class="d-flex justify-content-between mb-3">
    <h3>Orders Management</h3>
</div>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID Order</th>
                    <th>Customer</th>
                    <th>Alamat</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($orders)): ?>
                    <?php foreach($orders as $order): ?>
                    <tr>
                        <td>#ORD-<?= $order['id'] ?></td>
                        <td><?= $order['first_name'] ?></td>
                        <td><?= $order['address'] ?></td>
                        <td>Rp <?= number_format($order['total_price'],0,',','.') ?></td>
                        <td>
                            <?php if($order['status'] == 'Pending'): ?>
                                <span class="badge bg-warning text-dark">Pending</span>
                            <?php elseif($order['status'] == 'Shipped'): ?>
                                <span class="badge bg-info text-dark">Shipped</span>
                            <?php elseif($order['status'] == 'Completed'): ?>
                                <span class="badge bg-success">Completed</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <form action="<?= base_url('admin/orders/update/'.$order['id']) ?>" method="post" class="d-inline">
                                <select name="status" class="form-select form-select-sm d-inline w-auto" style="width: 120px;">
                                    <option value="Pending" <?= $order['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                    <option value="Shipped" <?= $order['status'] == 'Shipped' ? 'selected' : '' ?>>Shipped</option>
                                    <option value="Completed" <?= $order['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </form>
                            
                            <a href="<?= base_url('admin/orders/delete/'.$order['id']) ?>" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('Yakin ingin menghapus pesanan #ORD-<?= $order['id'] ?>?')">
                               Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Belum ada pesanan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>