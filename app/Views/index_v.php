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
                        <h4 class="text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Best Electronics</h4>
                        <h1 class="display-3 text-capitalize mb-4">Latest Gadgets & Gears</h1>
                        <a href="<?= base_url('shop') ?>" class="btn btn-primary rounded-pill py-3 px-5">Shop Now</a>
                    </div>
                </div>
                <div class="row g-0 header-carousel-item align-items-center">
                    <div class="col-xl-6 carousel-img wow fadeInLeft" data-wow-delay="0.1s">
                        <img src="<?= base_url('assets/img/carousel-2.png') ?>" class="img-fluid w-100" alt="Image">
                    </div>
                    <div class="col-xl-6 carousel-content p-4">
                        <h4 class="text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Premium Quality</h4>
                        <h1 class="display-3 text-capitalize mb-4">High Performance Laptops</h1>
                        <a href="<?= base_url('shop') ?>" class="btn btn-primary rounded-pill py-3 px-5">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <h1 class="mb-4">Featured Products</h1>
        <div class="row g-4">
            <?php if (!empty($products)) : ?>
                <?php foreach ($products as $p) : ?>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
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
                                        <i class="fa fa-shopping-bag me-2"></i> Add
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="d-flex justify-content-center mt-5">
            <?= $pager->links() ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>