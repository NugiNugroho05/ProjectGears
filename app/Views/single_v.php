<?= $this->extend('layout/page_layout') ?>
<?= $this->section('content') ?>
     <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Detail Produk</h1>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
            <li class="breadcrumb-item active text-white">Detail Produk</li>
        </ol>
    </div>
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-12 col-xl-12">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="border rounded">
                                <img src="<?= base_url('assets/img/'.$product['image']) ?>" class="img-fluid rounded w-100" alt="<?= $product['name'] ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="fw-bold mb-3"><?= $product['name'] ?></h4>
                            <p class="mb-3">Kategori: <?= $product['category'] ?></p>
                            <h5 class="fw-bold mb-3">Rp <?= number_format($product['price'],0,',','.') ?></h5>
                            
                            <p class="mb-4 text-muted">Stok: <?= $product['stock'] ?></p>

                            <p class="mb-4"><?= $product['description'] ?></p>

                            <a href="<?= base_url('cart/add/'.$product['id']) ?>" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary">
                                <i class="fas fa-shopping-cart me-2"></i> Add to cart
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>