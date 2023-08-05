<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'photo',
        'favicon'
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public $timestamps = true;
}
