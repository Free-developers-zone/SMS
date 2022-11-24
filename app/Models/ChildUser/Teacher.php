<?php

namespace App\Models\ChildUser;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kodeine\Metable\Metable;

class Teacher extends Model
{
    use HasFactory, Metable;
    protected $fillable = [
        'reg_no',
        'role_id',
        'name',
        'email',
        'password',
        'phone',
        'address',
        'current_school',
    ];
    /**
     * @return [type]
     */
    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
