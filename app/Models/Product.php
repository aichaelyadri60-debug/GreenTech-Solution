<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category_id',
        'image',
        'ai_generated',
    ];


    public function Category(){
        return $this->belongsTo(Category::class);
    }


    public function favoritedBy()
    {
        return $this->belongsToMany(
            User::class,'favories','product_id','user_id'
        )->withTimestamps();
    }
}
