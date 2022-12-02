<?php

namespace App\Models\User;

use App\Models\ChildUser\Administration;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UserRole extends Model
{
    use HasFactory;
    const STATUS = [
        'active' => 1,
        'inactive' => 0,
    ];
    protected $fillable = [
        'role',
        'description',
        'status',
    ];
    /**
     * @return [type]
     */
    public static function boot()
    {
        parent::boot();
        // registering a callback to be executed upon the creation of an activity AR
        static::creating(function ($user_role) {
            // produce a slug based on the activity title
            $slug = Str::slug($user_role->role);
            // check to see if any other slugs exist that are the same & count them
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            // if other slugs exist that are the same, append the count to the slug
            $user_role->slug = $count ? "{$slug}-{$count}" : $slug;
        });
        // registering a callback to be executed upon the creation of an activity AR
        static::updating(function ($user_role) {
            // produce a slug based on the activity title
            $slug = Str::slug($user_role->role);
            // check to see if any other slugs exist that are the same & count them
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            // if other slugs exist that are the same, append the count to the slug
            $user_role->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }
    /**
     * @return [type]
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

}
