<?php

namespace App\Models;

use App\Models\DetailOrderModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderModel extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id_order';
    public $timestamps = false;

    public function allData()
    {
        return DB::table('orders')->where('user_id', Auth::user()->id)->get();
    }

    public function allDetailData()
    {
        return DB::table('orders')->join('detail_orders', 'orders.id_order', '=', 'detail_orders.order_id')->join('products', 'products.id_product', '=', 'detail_orders.product_id')->where('user_id', Auth::user()->id)->get();
    }

    public function countData()
    {
        return DB::table('orders')->where('user_id', Auth::user()->id)->count();
    }

    public function detailOrder()
    {
        return $this->hasMany(DetailOrderModel::class, 'order_id', 'id_order');
    }

    public function getOrder($id_order)
    {
        return DB::table('orders')->where('id_order', $id_order)->first();
    }

    public function allOrders()
    {
        return DB::table('orders')->join('users', 'orders.user_id', '=', 'users.id')->get();
    }
}
