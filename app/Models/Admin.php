<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory;

    protected $fillable = [
    'username',
    'email',
    'first_name',
    'last_name',
    'password',
    'admin_type',
    'avatar',
    'account_status',
];


protected $casts = [
    'last_login_at' => 'datetime',
];

}
