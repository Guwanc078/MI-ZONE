<?php
namespace App\Http\Controllers;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $sessionId = session()->getId();
        $cartItems = CartItem::with('product')->where('session_id', $sessionId)->get();
        
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
        
        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add($id)
    {
        $sessionId = session()->getId();
        $product = Product::findOrFail($id);
        
        $cartItem = CartItem::where('session_id', $sessionId)
            ->where('product_id', $id)
            ->first();
        
        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            CartItem::create([
                'session_id' => $sessionId,
                'product_id' => $id,
                'quantity' => 1
            ]);
        }
        
        return redirect()->route('cart.index')->with('success', 'Ürün sepete eklendi');
    }

    public function update(Request $request, $id)
    {
        $cartItem = CartItem::findOrFail($id);
        
        if ($request->quantity > 0) {
            $cartItem->update(['quantity' => $request->quantity]);
        } else {
            $cartItem->delete();
        }
        
        return redirect()->route('cart.index');
    }

    public function destroy($id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->delete();
        return redirect()->route('cart.index');
    }
}