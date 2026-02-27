<?= $this->extend('layout/page_layout'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid carousel bg-light px-0">
    <div class="row g-0 justify-content-end">
        <div class="col-12 col-lg-7 col-xl-9">
            <div class="header-carousel owl-carousel bg-light py-5">
                <div class="row g-0 header-carousel-item align-items-center">
                    <div class="col-xl-6 carousel-img wow fadeInLeft" data-wow-delay="0.1s">
                        <img src="<?= base_url('assets/img/carousel-1.png') ?>" class="img-fluid w-100" alt="Image">
                    </div>
                    <div class="col-xl-6 carousel-content p-4">
                        <h4 class="text-uppercase fw-bold mb-4 wow fadeInRight" data-wow-delay="0.1s" style="letter-spacing: 3px;">Save Up To Rp 4.000.000</h4>
                        <h1 class="display-3 text-capitalize mb-4 wow fadeInRight" data-wow-delay="0.3s">On Selected Laptops & Desktop</h1>
                        <p class="text-dark wow fadeInRight" data-wow-delay="0.5s">Terms and Condition Apply</p>
                        <a href="<?= base_url('shop') ?>" class="btn btn-primary rounded-pill py-3 px-5 wow fadeInRight" data-wow-delay="0.7s">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-4 text-start">
                    <h1>Our Products</h1>
                </div>
            </div>
            
            <div class="row g-4 mt-2">
                <?php 
                // Cek apakah variabel $products dikirim dari Home Controller
                if (isset($products) && !empty($products)) : 
                    foreach ($products as $p) : 
                ?>
                        <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="rounded position-relative fruite-item border border-secondary">
                                <div class="fruite-img">
                                    <a href="<?= base_url('single/' . $p['id']) ?>">
                                        <img src="<?= base_url('assets/img/' . $p['image']) ?>" class="img-fluid w-100 rounded-top" alt="<?= $p['name'] ?>" onerror="this.src='<?= base_url('assets/img/fruite-item-5.jpg') ?>';">
                                    </a>
                                </div>
                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                                    <?= $p['category'] ?>
                                </div>
                                <div class="p-4 border border-secondary border-top-0 rounded-bottom text-start">
                                    <a href="<?= base_url('single/' . $p['id']) ?>">
                                        <h4><?= $p['name'] ?></h4>
                                    </a>
                                    <p class="text-truncate"><?= $p['description'] ?? 'Produk unggulan dari Gears.' ?></p>
                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                        <p class="text-dark fs-5 fw-bold mb-0">Rp <?= number_format($p['price'], 0, ',', '.') ?></p>
                                        
                                        <a href="<?= base_url('cart/add/' . $p['id']) ?>" class="btn border border-secondary rounded-pill px-3 text-primary">
                                            <i class="fa fa-shopping-bag me-2 text-primary"></i> Add
                                        </a>
                                    </div>
                                    <small class="text-muted mt-2 d-block">Stock: <?= $p['stock'] ?></small>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="col-12 text-center py-5">
                        <div class="alert alert-warning">
                            <h5>Koneksi ke database <strong>db_gears</strong> berhasil, tapi data produk belum ada atau belum dikirim dari Controller.</h5>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>      
    </div>
</div>

<div class="container-fluid banner bg-secondary my-5">
    <div class="container py-5">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <div class="py-4">
                    <h1 class="display-3 text-white">Big Sale!</h1>
                    <p class="fw-normal display-3 text-dark mb-4">In Our Store</p>
                    <p class="mb-4 text-dark">Dapatkan elektronik terbaik di db_gears dengan harga spesial.</p>
                    <a href="<?= base_url('shop') ?>" class="btn border-2 border-white rounded-pill text-white py-3 px-5">BUY NOW</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="<?= base_url('assets/img/baner-1.png') ?>" class="img-fluid w-100 rounded" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>