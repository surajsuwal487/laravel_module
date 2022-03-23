<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = ['name', 'category_id', 'price', 'description'];

    public function catWithProduct()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\ProductFactory::new();
    }
}
