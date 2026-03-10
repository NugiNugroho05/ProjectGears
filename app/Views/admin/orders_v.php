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
                    <th>Payment</th> 
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
                        <td class="text-center">
                            <span class="badge bg-info text-dark"><?= $order['payment_method'] ?></span>
                        </td>
                        <td>Rp <?= number_format($order['total_price'],0,',','.') ?></td>
                        <td>
                            <form action="<?= base_url('admin/orders/updateStatus/'.$order['id']) ?>" method="post">
                                <select name="status" class="form-control form-control-sm" onchange="this.form.submit()">                
                                    <option value="pending" <?= $order['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                                    <option value="process" <?= $order['status'] == 'process' ? 'selected' : '' ?>>Process</option>
                                    <option value="completed" <?= $order['status'] == 'completed' ? 'selected' : '' ?>>Completed</option>
                                    <option value="cancelled" <?= $order['status'] == 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                                </select>                
                            </form>
                        </td>                
                        <td>                
                            <a href="<?= base_url('admin/orders/view/'.$order['id']) ?>" class="btn btn-sm btn-primary">Detail</a>
                            <a href="<?= base_url('admin/orders/delete/'.$order['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Order?')">Hapus</a>
                        </td>                
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">Belum ada pesanan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        
        <div class="d-flex justify-content-center mt-3">
            <?php if(isset($pager)): ?>
                <?= $pager->links() ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>