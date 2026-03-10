<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    
    // Pastikan 'password' ada di allowedFields
    protected $allowedFields = ['username', 'password', 'role'];

    // Optional: Tambahkan validasi bawaan model
    protected $validationRules = [
        'username' => 'required|min_length[3]|is_unique[users.username]',
        'password' => 'required|min_length[6]'
    ];
}