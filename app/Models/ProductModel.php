<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductModel extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id_product';
    public $timestamps = false;

    public function allData()
    {
        return DB::table('products')->join('brand', 'brand.id_brand', '=', 'products.id_brand')->get();
    }

    public function allDataSearch($keywoard)
    {
        return DB::table('products')->where('name', 'like', '%' . $keywoard . '%')->orwhere('price', 'like', '%' . $keywoard . '%')->orwhere('description', 'like', '%' . $keywoard . '%')->get();
    }

    public function getProduct($id_product)
    {
        return DB::table('products')->where('id_product', $id_product)->first();
    }

    public function qtyFromBrand($id_brand)
    {
        return DB::table('products')->where('id_brand', $id_brand)->count();
    }

    public function brand()
    {
        return $this->belongsTo(BrandModel::class, 'id_brand', 'id_brand');
    }
}
