<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'products'; // Pastikan nama tabel di DB lo 'products'
    protected $primaryKey = 'id';
    
    // Wajib diisi biar save() bisa jalan
    protected $allowedFields = ['name', 'category', 'price', 'stock', 'description', 'image'];
}