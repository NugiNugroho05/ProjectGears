<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderItemModel extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = 'id';
    
    // Sesuaikan dengan screenshot image_ce2453.png
    protected $allowedFields = ['order_id', 'product_id', 'qty', 'price_at_purchase'];
}