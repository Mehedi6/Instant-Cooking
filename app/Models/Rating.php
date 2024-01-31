<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'recipe_id',
        'review',
        'rating'
    ];
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    // public function recipe(){
    //     return $this->belongsTo('App\Recipe','recipe_id');
    // }
}
