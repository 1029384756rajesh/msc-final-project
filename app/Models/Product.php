<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "name",
        "short_description",
        "description",
        "category_id",
        "image_url",
        "price",
        "stock"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
