<?= $this->extend('layout/admin_layout') ?>
<?= $this->section('admin_content') ?>
<h3>Add New Product</h3>
<div class="card p-4 shadow-sm mt-3">
    <form action="<?= base_url('admin/product/save') ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Nama Produk</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Category</label>
                <select name="category" class="form-control">
                    <option value="Laptop">Laptop</option>
                    <option value="Electronics">Electronics</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label></label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Stock</label>
                <input type="number" name="stock" class="form-control" required>
            </div>
            <div class="col-md-12 mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label>Product Image</label>
                <input type="file" name="image" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-success">Save Product</button>
        <a href="<?= base_url('admin/product') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<?= $this->endSection() ?>