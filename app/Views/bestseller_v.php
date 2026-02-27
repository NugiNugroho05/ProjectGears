<?= $this->extend('layout/page_layout'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Bestseller Products</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
        <li class="breadcrumb-item active text-white">Bestseller</li>
    </ol>
</div>
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <h1 class="mb-4">Top Selling Items</h1>
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4 justify-content-start">
                    
                    <?php if (isset($products) && !empty($products) && is_array($products)) : ?>
                        <?php foreach ($products as $p) : ?>
                            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
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
                                <h3>Belum ada produk terlaris.</h3>
                                <p>Pastikan data produk sudah ada di database <strong>db_gears</strong>.</p>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>