<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $product = Product::find($productId);
 
        if (!$product) {
            return response()->json(['success' => 'Producto no encontrado: ID' . $product]);
        }

        $quantity = $request->input('quantity', 1); // Valor por defecto 1 si no se envía una cantidad

        if ($quantity <= 0 || !is_numeric($quantity)) {
            return response()->json(['error' => 'Cantidad no válida'], 400); // Código 400 para error
        }

        $cart = session()->get('cart', []);

        // Si el producto ya está en el carrito, aumenta la cantidad
        if (isset($cart[$productId])) {
            Log::info($quantity);
            $cart[$productId]['quantity'] = $quantity;
            $quantity = $cart[$productId]['quantity'];
        } else {
            // Si no está, agrégalo al carrito
            Log::info("Error");
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
            ];
            //$quantity = 1;
        }

        session()->put('cart', $cart);
        Log::info('Respuesta JSON', ['success' => 'Producto agregado al carrito', 'quantity' => $quantity]);

        return response()->json(['success' => 'Producto agregado al carrito', 'quantity' => $quantity]);
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);
        $cartItems = Product::whereIn('id', array_keys($cart))->get();
        $totalPrice = 0;

        foreach ($cartItems as $item) {
            $totalPrice += $item->price * $cart[$item->id]['quantity'];
        }

        return view('cart', compact('cartItems', 'totalPrice', 'cart'));
    }

    public function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Producto eliminado del carrito');
    }

    public function viewProducts()
    {
        $products = Product::all(); // Obtener todos los productos
        return view('products', compact('products'));
    }

    public function products_quantity()
    {

        //return view('products_quantity', compact('products')); 
    }
}
