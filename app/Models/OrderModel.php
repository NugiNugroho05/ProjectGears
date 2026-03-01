<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    
    // Sesuaikan dengan screenshot image_cda7fe.png
    protected $allowedFields = ['first_name', 'address', 'payment_method', 'total_price', 'status', 'created_at'];
}