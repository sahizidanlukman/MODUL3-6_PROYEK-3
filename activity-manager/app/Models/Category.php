<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    // Method relasi ke model Activity
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}