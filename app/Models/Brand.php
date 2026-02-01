<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'logo', 'is_sponsor', 'sort_order'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeSponsors($query)
    {
        return $query->where('is_sponsor', true)->orderBy('sort_order');
    }
}