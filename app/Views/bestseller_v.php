<?= $this->extend('layout/page_layout'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Bestseller Products</h1>
</div>
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="row g-4">
            <?php if (!empty($products)) : ?>
                <?php foreach ($products as $p) : ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="rounded fruite-item border border-secondary">
                            <div class="fruite-img">
                                <a href="<?= base_url('single/' . $p['id']) ?>">
                                    <img src="<?= base_url('assets/img/' . $p['image']) ?>" class="img-fluid w-100 rounded-top" alt="<?= $p['name'] ?>">
                                </a>
                            </div>
                            <div class="p-4">
                                <h4><?= $p['name'] ?></h4>
                                <p class="text-dark fs-5 fw-bold">Rp <?= number_format($p['price'], 0, ',', '.') ?></p>
                                <a href="<?= base_url('cart/add/' . $p['id']) ?>" class="btn border border-secondary rounded-pill px-3 text-primary">Add</a>
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