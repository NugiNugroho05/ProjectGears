<?= $this->extend('layout/page_layout'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Shop</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
        <li class="breadcrumb-item active text-white">Shop</li>
    </ol>
</div>
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <h1 class="mb-4">Our Products</h1>
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4 justify-content-start">
                    
                    <?php if (isset($products) && !empty($products)) : ?>
                        <?php foreach ($products as $p) : ?>
                            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="rounded position-relative fruite-item border border-secondary">
                                    <div class="fruite-img">
                                        <a href="<?= base_url('single/' . $p['id']) ?>">
                                            <img src="<?= base_url('assets/img/' . $p['image']) ?>" class="img-fluid w-100 rounded-top" alt="<?= $p['name'] ?>">
                                        </a>
                                    </div>
                                    <div class="p-4 border-top-0 rounded-bottom">
                                        <h4><?= $p['name'] ?></h4>
                                        <p><?= substr($p['description'], 0, 50) ?>...</p>
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
                                <h3>Produk tidak ditemukan.</h3>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>