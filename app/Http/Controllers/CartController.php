<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $totalItems = array_sum(array_column($cart, 'quantity'));

        $data = [
            'title' => 'Cart',
            'totalItems' => $totalItems,
            'cart' => $cart,
        ];

        return view('pages.cart.index', $data);
    }

    public function addToCart($id)
    {
        $document = Document::findOrFail($id);
        $cart = session()->get('cart', []);

        $cart[$id] = [
            "nama" => $document->nama,
            "harga" => $document->harga,
        ];

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Document has been added to cart');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.index')->with('success', 'Dokumen dihapus dari keranjang');
    }

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return response()->json(['success' => true]);
    }

    public function getCartTotal()
    {
        $cart = session()->get('cart', []);
        $totalItems = array_sum(array_column($cart, 'quantity'));

        return response()->json([
            'success' => true,
            'totalItems' => $totalItems
        ]);
    }
}
