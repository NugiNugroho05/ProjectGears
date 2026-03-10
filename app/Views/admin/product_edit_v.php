<?= $this->extend('layout/admin_layout') ?>
<?= $this->section('admin_content') ?>

<div class="card shadow-sm">
    <div class="card-header bg-dark text-white">
        <h3>Edit Produk: <?= $product['name'] ?></h3>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/product/update/'.$product['id']) ?>" method="post" enctype="multipart/form-data">
            
            <div class="mb-3 text-center">
                <img src="<?= base_url('assets/img/'.$product['image']) ?>" width="150" class="img-thumbnail">
                <br>
                <small class="text-muted">Gambar saat ini</small>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="category" class="form-select" required>
                        <option value="Laptop" <?= $product['category'] == 'Laptop' ? 'selected' : '' ?>>Laptop</option>
                        <option value="Electronics" <?= $product['category'] == 'Electronics' ? 'selected' : '' ?>>Electronics</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga (Rp)</label>
                    <input type="number" name="price" class="form-control" value="<?= $product['price'] ?>" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stock" class="form-control" value="<?= $product['stock'] ?>" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control" rows="4"><?= $product['description'] ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Ganti Gambar (Opsional)</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="text-end">
                <a href="<?= base_url('admin/product') ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-success">Update Produk</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>