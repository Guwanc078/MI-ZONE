<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'model',
        'category_id',
        'brand_id',
        'color_id',
        'price',
        'stock',
        'description',
        'image'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    
    public function getPriceFormattedAttribute()
    {
        return number_format($this->price, 0, '', '.');
    }
}