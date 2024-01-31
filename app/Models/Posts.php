<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'slug',
        'image',
        'sub_title',
        'discription',
        'video',
        'cookingtime',
        'calories',
        'category_id',
        'user_id',
        'published_at',
        'created_at',
        'updated_at'
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
