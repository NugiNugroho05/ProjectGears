<?= $this->extend('layout/page_layout'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Shopping Cart</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
        <li class="breadcrumb-item active text-white">Cart</li>
    </ol>
</div>
<div class="container-fluid py-5">
    <div class="container py-5">
        
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?php if (isset($cart) && !empty($cart)) : ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $totalHarga = 0;
                        foreach ($cart as $id => $item) : 
                            $subtotal = $item['price'] * $item['qty'];
                            $totalHarga += $subtotal;
                        ?>
<<<<<<< HEAD
                        <tr>
                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    <img src="<?= base_url('assets/img/'.$item['image']) ?>" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                </div>
                            </th>
                            <td>
                                <p class="mb-0 mt-4"><?= $item['name'] ?></p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">Rp <?= number_format($item['price'], 0, ',', '.') ?></p>
                            </td>
                            <td>
                                <div class="input-group quantity mt-4" style="width: 100px;">
                                    <input type="text" class="form-control form-control-sm text-center border-0" value="<?= $item['qty'] ?>" readonly>
                                </div>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">Rp <?= number_format($subtotal, 0, ',', '.') ?></p>
                            </td>
                            <td>
                                <a href="<?= base_url('cart/remove/'.$id) ?>" class="btn btn-md rounded-circle bg-light border mt-4" onclick="return confirm('Hapus item ini?')">
                                    <i class="fa fa-times text-danger"></i>
                                </a>
                            </td>
                        </tr>
=======
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="<?= base_url('assets/img/' . $item['image']) ?>" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="<?= $item['name'] ?>" onerror="this.src='<?= base_url('assets/img/fruite-item-5.jpg') ?>';">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4"><?= $item['name'] ?></p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">Rp <?= number_format($item['price'], 0, ',', '.') ?></p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <input type="text" class="form-control form-control-sm text-center border-0" value="<?= $item['qty'] ?>" readonly>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">Rp <?= number_format($subtotal, 0, ',', '.') ?></p>
                                </td>
                                <td>
                                    <a href="<?= base_url('cart/remove/' . $id) ?>" class="btn btn-md rounded-circle bg-light border mt-3">
                                        <i class="fa fa-times text-danger"></i>
                                    </a>
                                </td>
                            </tr>
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
<<<<<<< HEAD
            
=======

>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
            <div class="row g-4 justify-content-end">
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 me-4">Total Harga:</h5>
                                <p class="mb-0 fw-bold">Rp <?= number_format($totalHarga, 0, ',', '.') ?></p>
                            </div>
                        </div>
                        <a href="<?= base_url('checkout') ?>" class="btn btn-primary rounded-pill px-4 py-3 text-uppercase mb-4 ms-4">Proceed Checkout</a>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="text-center py-5">
                <div class="alert alert-warning">
                    <h3>Keranjang belanja Anda masih kosong!</h3>
                    <p>Silakan tambahkan produk terlebih dahulu di halaman shop.</p>
                </div>
                <a href="<?= base_url('shop') ?>" class="btn btn-primary mt-3">Kembali ke Shop</a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection(); ?>