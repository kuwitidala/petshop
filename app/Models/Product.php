<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'category_id',
        'image',
        'structure',
        'description',
        'shortDescription',
        'pet',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class, 'product_id', 'id');
    }

}