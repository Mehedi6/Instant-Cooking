<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $guarded=['created_at','deleted_at','updated_at'];
    public function posts()
    {
        return $this->hasMany(Posts::class, 'category_id');
    }
}
