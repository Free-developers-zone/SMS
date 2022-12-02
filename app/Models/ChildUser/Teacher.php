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
        'user_id',
        'role_id',
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
    /**
     * @return [type]
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
