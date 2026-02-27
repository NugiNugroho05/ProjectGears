<?= $this->extend('layout/page_layout'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Checkout</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
        <li class="breadcrumb-item active text-white">Checkout</li>
    </ol>
</div>
<div class="container-fluid py-5">
    <div class="container py-5">
        
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?php if (isset($cart) && !empty($cart)) : ?>
            <form action="<?= base_url('checkout/placeOrder') ?>" method="post">
                <div class="row g-5">
                    <div class="col-md-12 col-lg-6 col-xl-7">
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item w-100">
                                    <label class="form-label my-3">First Name<sup>*</sup></label>
                                    <input type="text" name="first_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item w-100">
                                    <label class="form-label my-3">Last Name<sup>*</sup></label>
                                    <input type="text" name="last_name" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Address <sup>*</sup></label>
                            <input type="text" name="address" class="form-control" placeholder="House Number Street Name" required>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Town/City<sup>*</sup></label>
                            <input type="text" name="city" class="form-control" required>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Mobile<sup>*</sup></label>
                            <input type="tel" name="mobile" class="form-control" required>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Email Address<sup>*</sup></label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-lg-6 col-xl-5">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Products</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $totalHarga = 0;
                                    foreach ($cart as $id => $item) : 
                                        $subtotal = $item['price'] * $item['qty'];
                                        $totalHarga += $subtotal;
                                    ?>
                                        <tr>
                                            <th scope="row">
                                                <div class="d-flex align-items-center mt-2">
                                                    <img src="<?= base_url('assets/img/' . $item['image']) ?>" class="img-fluid rounded-circle" style="width: 50px; height: 50px;" alt="<?= $item['name'] ?>" onerror="this.src='<?= base_url('assets/img/fruite-item-5.jpg') ?>';">
                                                </div>
                                            </th>
                                            <td class="py-5"><?= $item['name'] ?></td>
                                            <td class="py-5">Rp <?= number_format($item['price'], 0, ',', '.') ?></td>
                                            <td class="py-5"><?= $item['qty'] ?></td>
                                            <td class="py-5">Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <th scope="row"></th>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark py-3">Subtotal</p>
                                        </td>
                                        <td class="py-5">
                                            <div class="py-3 border-bottom border-top">
                                                <p class="mb-0 text-dark">Rp <?= number_format($totalHarga, 0, ',', '.') ?></p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <input type="radio" class="form-check-input bg-primary border-0" id="Transfer-1" name="payment_method" value="Transfer" checked>
                                    <label class="form-check-label" for="Transfer-1">Bank Transfer</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                            <button type="submit" class="btn btn-primary border-secondary py-3 px-4 text-uppercase w-100 text-white">Place Order</button>
                        </div>
                    </div>
                </div>
            </form>
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