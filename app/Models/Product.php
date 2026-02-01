<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','model','category','brand','price','stock','description','image'];
    
    public function getPriceFormattedAttribute()
    {
        return number_format($this->price, 0, '', '.');
    }
    
    public function getCategoryIconAttribute()
    {
        $icons = [
            'telefonlar' => 'fas fa-mobile-alt text-blue-600',
            'akilli-saatler' => 'fas fa-clock text-green-600',
            'kulakliklar' => 'fas fa-headphones text-red-600',
            'tabletler' => 'fas fa-tablet-alt text-purple-600',
            'aksesuarlar' => 'fas fa-box text-yellow-600'
        ];
        return $icons[$this->category] ?? 'fas fa-box text-gray-600';
    }
}
