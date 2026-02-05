<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function Product(){
        return $this->hasMany(Product::class);
    }

    public function parent(){
        return $this->belongsTo(Category::class ,'parent_id');
    }

    public function children(){
        return $this->hasMany(Category::class ,'parent_id');
    }
}
