<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\BrandModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->ProductModel = new ProductModel();
        $this->CartModel = new CartModel();
        $this->BrandModel = new BrandModel();
    }

    public function index()
    {
        $keyword = Request()->keyword;
        if ($keyword) {
            $search = $this->ProductModel->allDataSearch($keyword);
        } else {
            $search = $this->ProductModel->allData();
        }

        $data = [
            'products' => $search,
            'cart' => Auth::check() ? $this->CartModel->cart() : "",
            'brands' => $this->BrandModel->all(),
            'qtyResult' => $search->count(),
        ];

        return view('home', $data);
    }

    public function detail(ProductModel $id_product)
    {
        $data = [
            'product' => $id_product,
            'cart' => Auth::check() ? $this->CartModel->cart() : "",
        ];
        return view('detail', $data);
    }

    public function brand(BrandModel $brand)
    {
        $data = [
            'brands' => $this->BrandModel->all(),
            'products' => $brand->products,
            'brand' => $this->BrandModel->find($brand->id_brand),
            'cart' => Auth::check() ? $this->CartModel->cart() : "",
        ];

        return view('brand', $data);
    }
}
