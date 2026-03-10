<div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<div class="container-fluid px-5 d-none border-bottom d-lg-block">
    <div class="row gx-0 align-items-center">
        <div class="col-lg-4 text-center text-lg-start mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <a href="#" class="text-muted me-2"> Bantuan</a><small> / </small>
                <a href="#" class="text-muted mx-2"> Dukungan</a>
                </div>
        </div>
        <div class="col-lg-4 text-center d-flex align-items-center justify-content-center">
            <small class="text-dark"></small>
            <a href="#" class="text-muted"></a>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle text-muted me-2" data-bs-toggle="dropdown"><small>IDR</small></a>
                    <div class="dropdown-menu rounded">
                        <a href="#" class="dropdown-item"> Rupiah (IDR)</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle text-muted mx-2" data-bs-toggle="dropdown"><small>English</small></a>
                    <div class="dropdown-menu rounded">
                        <a href="#" class="dropdown-item"> English</a>
                        <a href="#" class="dropdown-item"> Indonesia</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid px-5 py-4 d-none d-lg-block">
    <div class="row gx-0 align-items-center text-center">
        <div class="col-md-4 col-lg-3 text-center text-lg-start">
            <div class="d-inline-flex align-items-center">
                <a href="<?= base_url('/') ?>" class="navbar-brand p-0">
                    <h1 class="display-5 text-primary m-0"><i class="fas fa-shopping-bag text-secondary me-2"></i>Electro</h1>
                </a>
            </div>
        </div>
        <div class="col-md-4 col-lg-6 text-center">
            <div class="position-relative ps-4">
                <div class="d-flex border border-secondary rounded-pill">
                    <input class="form-control border-0 rounded-pill w-100 py-3" type="text" placeholder="Search Looking For?">
                    <button type="button" class="btn btn-primary rounded-pill py-3 px-5" style="border: 0;"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 text-center text-lg-end">
            <div class="d-inline-flex align-items-center">
                <a href="<?= base_url('cart') ?>" class="text-muted d-flex align-items-center justify-content-center">
                    <span class="rounded-circle btn-md-square border border-secondary">
                        <i class="fas fa-shopping-cart text-primary"></i>
                    </span> 
                    
                    <?php
                    // Ambil data session cart
                    $session = session();
                    $cart = $session->get('cart') ?? [];
                    
                    // Hitung total harga
                    $totalPrice = 0;
                    foreach ($cart as $item) {
                        $totalPrice += ($item['price'] * $item['qty']);
                    }
                    ?>
                    
                    <span class="text-dark ms-2 fw-bold">Rp <?= number_format($totalPrice, 0, ',', '.') ?></span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid nav-bar p-0">
    <div class="row gx-0 bg-primary px-5 align-items-center">
        <div class="col-lg-3 d-none d-lg-block">
            <div class="navbar navbar-light position-relative" style="width: 250px;">
                <div class="border-0 fs-4 w-100 px-0 text-start text-white p-3">
                    <h4 class="m-0 text-white"><i class="fa fa-box me-2"></i>Available Products</h4>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-9">
            <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars fa-1x text-white"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="<?= base_url('/') ?>" class="nav-item nav-link text-white">Home</a>
                        <a href="<?= base_url('shop') ?>" class="nav-item nav-link text-white">Shop</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="<?= base_url('bestseller') ?>" class="dropdown-item">Bestseller</a>
                                <a href="<?= base_url('cart') ?>" class="dropdown-item">Cart Page</a>
                                </div>
                        </div>
                        </div>
                    <a href="" class="btn btn-secondary rounded-pill py-2 px-4 px-lg-3 text-white"><i class="fa fa-mobile-alt me-2"></i> +62 812 3456 7890</a>
                </div>
            </nav>
        </div>
    </div>
</div>