<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class School extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'student_capacity',
        'teacher_capacity',
        'phone',
        'email',
        'address',
        'state',
        'province',
        'district',
        'zone',
        'division',
        'description',
    ];
    /**
     * @return [type]
     */
    public static function boot()
    {
        parent::boot();
        // registering a callback to be executed upon the creation of an activity AR
        static::creating(function ($name) {
            // produce a slug based on the activity title
            $slug = Str::slug($name->name);
            // check to see if any other slugs exist that are the same & count them
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            // if other slugs exist that are the same, append the count to the slug
            $name->slug = $count ? "{$slug}-{$count}" : $slug;
        });
        // registering a callback to be executed upon the creation of an activity AR
        static::updating(function ($name) {
            // produce a slug based on the activity title
            $slug = Str::slug($name->name);
            // check to see if any other slugs exist that are the same & count them
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            // if other slugs exist that are the same, append the count to the slug
            $name->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }
    /**
     * @return [type]
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    /**
     * @return [type]
     */
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
