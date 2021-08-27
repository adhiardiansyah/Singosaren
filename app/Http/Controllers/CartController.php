<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->CartModel = new CartModel();
    }

    public function addToCart()
    {
        $num = $this->CartModel->where('product_id', Request()->product_id)->first();

        $cart = $num ? CartModel::find($num->id_cart) : new CartModel;
        $cart->product_id = Request()->product_id;
        $cart->user_id = Auth::user()->id;
        $cart->price = Request()->price;
        $cart->qty = $num ? $num->qty + 1 : 1;

        $cart->save();

        return redirect()->to('/')->with('pesan', 'Berhasil ditambahkan.');
    }

    public function addToCart2()
    {
        $num = $this->CartModel->where('product_id', Request()->product_id)->first();

        $cart = $num ? CartModel::find($num->id_cart) : new CartModel;
        $cart->product_id = Request()->product_id;
        $cart->user_id = Auth::user()->id;
        $cart->price = Request()->price;
        $cart->qty = $num ? $num->qty + 1 : 1;

        $cart->save();

        return redirect()->to('/detail' . '/' . Request()->product_id)->with('pesan', 'Berhasil ditambahkan.');
    }

    public function buyNow()
    {
        $num = $this->CartModel->where('product_id', Request()->product_id)->first();

        $cart = $num ? CartModel::find($num->id_cart) : new CartModel;
        $cart->product_id = Request()->product_id;
        $cart->user_id = Auth::user()->id;
        $cart->price = Request()->price;
        $cart->qty = $num ? $num->qty + 1 : Request()->qty;

        $cart->save();

        return redirect()->to('/cart')->with('pesan', 'Berhasil ditambahkan.');
    }

    public function cart()
    {
        $data = [
            'cart' => $this->CartModel->cart(),
        ];
        return view('cart', $data);
    }

    public function updateCart()
    {
        $cart = $this->CartModel->find(Request()->id_cart);
        $cart->qty = Request()->qty;

        $cart->save();

        return redirect()->to('/cart')->with('pesan', 'Berhasil diperbarui.');
    }

    public function deleteCart($id_cart)
    {
        $cart = $this->CartModel->find($id_cart);

        $cart->delete();

        return redirect()->to('/cart')->with('pesan', 'Berhasil dihapus.');
    }
}
