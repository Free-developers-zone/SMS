<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSecondary extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'role_id',
        'reg_no',
        'first_name',
        'last_name',
        'NIC',
        'phone',
        'address_1',
        'address_2',
        'city',
        'state',
        'country',
        'zip',
    ];
}
