<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    protected $fillable =[
        'recipe_name',
        'category',
        'recipe_description',
        'ing',
        'cookingtime',
        'image',
        'video',
        'link',
        'allergy',
        'nutrition',
        'user_id',
    ];
    public function setCatAttribute($value)
    {
        $this->attributes['ing'] = json_encode($value);
    }
  
    /**
     * Get the categories
     *
     */
    public function getCatAttribute($value)
    {
        return $this->attributes['ing'] = json_decode($value);
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'user_favorites', 'recipe_id', 'user_id');
    }
}

