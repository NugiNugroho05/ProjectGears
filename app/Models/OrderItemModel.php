<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderItemModel extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = 'id';
    
    // app/Models/OrderItemModel.php
    protected $allowedFields = ['order_id', 'product_id', 'quantity', 'price'];
}