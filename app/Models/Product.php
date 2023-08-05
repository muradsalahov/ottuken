<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_promo_code',
        'product_link_id',
        'product_url',
        'product_name',
        'product_price',
        'product_price_number',
        'product_marketplace',
        'product_comments',
        'product_instock',
        'product_rating',
        'product_main_photo',
        'category_id',
        'subcategory_id',
        'brand_id',
        'company_id',
        'product_show_main',
        'description'
    ];

    public function productdocs()
    {
        return $this->hasMany(ProductDocs::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public $timestamps = true;
}