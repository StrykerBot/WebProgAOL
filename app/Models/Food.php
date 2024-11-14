<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';
    public function categories(){
        return $this->belongsToMany(Category::class, 'categories_foods', 'food_id', 'category_id');
    }
}
