<?php

namespace App\Models;

use App\Models\OrderModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailOrderModel extends Model
{
    use HasFactory;

    protected $table = 'detail_orders';
    protected $primaryKey = 'id_detailOrder';
    public $timestamps = false;

    public function allDetailData($id_order)
    {
        return DB::table('detail_orders')->join('products', 'products.id_product', '=', 'detail_orders.product_id')->join('orders', 'orders.id_order', '=', 'detail_orders.order_id')->where('order_id', $id_order)->get();
    }

    public function order()
    {
        return $this->belongsTo(OrderModel::class, 'order_id', 'id_order');
        // return DB::table('detail_orders')->join('orders', 'orders.id_order', '=', 'detail_orders.order_id')->join('products', 'products.id_product', '=', 'detail_orders.product_id')->get();
    }
}
