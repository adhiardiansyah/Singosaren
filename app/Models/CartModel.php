<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartModel extends Model
{
    use HasFactory;

    protected $table = 'cart';
    protected $primaryKey = 'id_cart';
    public $timestamps = false;
    protected $guarded = ['id_cart', 'product_id'];

    public function countData()
    {
        return DB::table('cart')->where('user_id', Auth::user()->id)->count('qty');
    }

    public function cart()
    {
        return DB::table('cart')->join('products', 'products.id_product', '=', 'cart.product_id')->where('user_id', Auth::user()->id)->get();
    }

    public function cartDelete()
    {
        return DB::table('cart')->where('user_id', Auth::user()->id)->delete();
    }
}
