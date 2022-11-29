<?php

namespace App\Models\ChildUser;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kodeine\Metable\Metable;

class Administration extends Model
{
    use HasFactory, Metable;
    protected $fillable = [
        'reg_no',
        'user_id',
        'role_id',
        'phone',
        'address',
    ];
}
