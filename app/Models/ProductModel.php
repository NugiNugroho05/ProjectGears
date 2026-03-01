<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
<<<<<<< HEAD
    protected $table      = 'products'; // Pastikan nama tabel di DB lo 'products'
    protected $primaryKey = 'id';
    
    // Wajib diisi biar save() bisa jalan
    protected $allowedFields = ['name', 'category', 'price', 'stock', 'description', 'image'];
=======
    // Nama tabel di database db_gears
    protected $table      = 'products';
    
    // Primary key-nya
    protected $primaryKey = 'id';

    // Kolom mana saja yang boleh diisi/diakses
    protected $allowedFields = ['name', 'category', 'price', 'stock', 'image', 'description'];
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
}