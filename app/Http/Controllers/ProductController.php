<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(12);
        $categories = Category::all();
        $brands = Brand::all();
        return view('products.index', compact('products', 'categories', 'brands'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
}