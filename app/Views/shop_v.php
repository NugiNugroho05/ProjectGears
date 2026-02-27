<?= $this->extend('layout/page_layout'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Shop Page</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
        <li class="breadcrumb-item active text-white">Shop</li>
    </ol>
</div>
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <h1 class="mb-4">Electro Shop</h1>
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h4>Categories</h4>
                                    <ul class="list-unstyled fruite-categorie">
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="#"><i class="fas fa-laptop me-2"></i>Laptops</a>
                                                <span>(<?= isset($products) && is_array($products) ? count(array_filter($products, fn($p) => $p['category'] == 'Laptop')) : '0' ?>)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="#"><i class="fas fa-mobile-alt me-2"></i>Electronics</a>
                                                <span>(<?= isset($products) && is_array($products) ? count(array_filter($products, fn($p) => $p['category'] == 'Electronics')) : '0' ?>)</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="row g-4 justify-content-start">
                            
                            <?php if (isset($products) && !empty($products) && is_array($products)) : ?>
                                <?php foreach ($products as $p) : ?>
                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                        <div class="rounded position-relative fruite-item border border-secondary">
                                            <div class="fruite-img">
                                                <a href="<?= base_url('single/' . $p['id']) ?>">
                                                    <img src="<?= base_url('assets/img/' . $p['image']) ?>" class="img-fluid w-100 rounded-top" alt="<?= $p['name'] ?>" onerror="this.src='<?= base_url('assets/img/fruite-item-1.jpg') ?>';">
                                                </a>
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                                                <?= $p['category'] ?>
                                            </div>
                                            <div class="p-4 rounded-bottom">
                                                <a href="<?= base_url('single/' . $p['id']) ?>">
                                                    <h4><?= $p['name'] ?></h4>
                                                </a>
                                                <p class="text-truncate"><?= $p['description'] ?? 'High quality product from Gears.' ?></p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">Rp <?= number_format($p['price'], 0, ',', '.') ?></p>
                                                    
                                                    <a href="<?= base_url('cart/add/' . $p['id']) ?>" class="btn border border-secondary rounded-pill px-3 text-primary">
                                                        <i class="fa fa-shopping-bag me-2 text-primary"></i> Add
                                                    </a>
                                                </div>
                                                <small class="text-muted d-block mt-2">Stock: <?= $p['stock'] ?></small>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="col-12 text-center py-5">
                                    <div class="alert alert-warning">
                                        <h3>Belum ada produk di database.</h3>
                                        <p>Pastikan tabel <code>products</code> sudah diisi via HeidiSQL.</p>
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-6">
                <div class="text-center bg-primary rounded position-relative">
                    <img src="<?= base_url('assets/img/product-banner-1.jpg') ?>" class="img-fluid w-100 rounded" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center rounded p-4" style="background: rgba(0,0,0,0.3);">
                        <h3 class="display-5 text-white">Gadget Pro</h3>
                        <a href="<?= base_url('shop') ?>" class="btn btn-primary rounded-pill align-self-center py-2 px-4">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="text-center bg-primary rounded position-relative">
                    <img src="<?= base_url('assets/img/product-banner-2.jpg') ?>" class="img-fluid w-100 rounded" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center rounded p-4" style="background: rgba(0,0,0,0.3);">
                        <h2 class="display-2 text-secondary">SALE</h2>
                        <a href="<?= base_url('shop') ?>" class="btn btn-secondary rounded-pill align-self-center py-2 px-4">Get Offer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>