<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    // Nama tabel di database db_gears
    protected $table      = 'products';
    
    // Primary key-nya
    protected $primaryKey = 'id';

    // Kolom mana saja yang boleh diisi/diakses
    protected $allowedFields = ['name', 'category', 'price', 'stock', 'image', 'description'];
}