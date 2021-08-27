<?php

namespace App\Models;

use App\Models\ProductModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BrandModel extends Model
{
    use HasFactory;

    protected $table = 'brand';
    protected $primaryKey = 'id_brand';
    public $timestamps = false;

    public function allData()
    {
        return DB::table('brand')->get();
    }

    public function getBrand($id_brand)
    {
        return DB::table('brand')->where('id_brand', $id_brand)->first();
    }

    public function products()
    {
        return $this->hasMany(ProductModel::class, 'id_brand', 'id_brand');
    }
}
