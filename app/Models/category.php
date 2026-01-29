<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function Prooduct(){
        return $this->hasMany(Product::class);
    }
}
