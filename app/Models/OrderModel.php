<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    
    // Pastikan field di sini sesuai dengan nama kolom di database tabel 'orders'
    protected $allowedFields = ['first_name', 'address', 'payment_method', 'total_price', 'status', 'created_at'];
}