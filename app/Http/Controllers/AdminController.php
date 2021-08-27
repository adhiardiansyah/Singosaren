<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use App\Models\OrderModel;
use App\Models\UsersModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\DetailOrderModel;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->OrderModel = new OrderModel();
        $this->DetailOrderModel = new DetailOrderModel();
        $this->ProductModel = new ProductModel();
        $this->BrandModel = new BrandModel();
        $this->UsersModel = new UsersModel();
    }

    public function order()
    {
        $data = [
            'order' => $this->OrderModel->allOrders(),
        ];

        return view('admin/order', $data);
    }

    public function detailOrder($id_order)
    {
        $data = [
            'order' => $this->DetailOrderModel->allDetailData($id_order),
        ];
        return view('admin/detailorder', $data);
    }

    public function verifiedOrder()
    {
        $order = $this->OrderModel->find(Request()->id_order);
        $order->status = 'DIKIRIM';

        $order->save();

        return redirect()->to('/admin/order')->with('pesan', 'Berhasil diverifikasi.');
    }

    public function orderAccepted()
    {
        $order = $this->OrderModel->find(Request()->id_order);
        $order->status = 'DITERIMA';

        $order->save();

        return redirect()->to('/admin/order')->with('pesan', 'Pesanan selesai.');
    }

    public function product()
    {
        $data = [
            'product' => $this->ProductModel->allData(),
            'brand' => $this->BrandModel->allData(),
        ];

        return view('admin/product', $data);
    }

    public function addProduct()
    {
        Request()->validate([
            'name' => 'required|unique:products,name',
            'price' => 'required',
            'description' => 'required',
            'picture' => 'image|max:1024',
        ], [
            'name.required' => 'Nama produk harus diisi',
            'name.unique' => 'Nama produk sudah ada',
            'price.required' => 'Harga produk harus diisi',
            'description.required' => 'Deskripsi produk harus diisi',
            'picture.image' => 'Yang anda pilih bukan gambar',
            'picture.max' => 'Ukuran gambar terlalu besar. Maksimal 1MB'
        ]);

        $file = Request()->picture;
        $fileName = Request()->file('picture')->getClientOriginalName();
        $file->move(public_path('img/products'), $fileName);

        $product = new ProductModel;
        $product->name = Request()->name;
        $product->id_brand = Request()->id_brand;
        $product->price = Request()->price;
        $product->description = Request()->description;
        $product->picture = $fileName;

        $product->save();

        return redirect()->to('/admin/product')->with('pesan', 'Berhasil ditambahkan.');
    }

    public function detailProduct(ProductModel $id_product)
    {
        $data = [
            'product' => $id_product,
        ];
        return view('admin/detailproduct', $data);
    }

    public function editProduct($id_product)
    {
        $data = [
            'product' => $this->ProductModel->getProduct($id_product),
            'brand' => $this->BrandModel->allData(),
        ];
        return view('admin/editproduct', $data);
    }

    public function updateProduct()
    {
        $product = $this->ProductModel->find(Request()->id_product);
        if ($product->name == Request()->name) {
            $rule_name = 'required';
        } else {
            $rule_name = 'required|unique:products,name';
        }

        Request()->validate([
            'name' => $rule_name,
            'price' => 'required',
            'description' => 'required',
            'picture' => 'image|max:1024',
        ], [
            'name.required' => 'Nama produk harus diisi',
            'name.unique' => 'Nama produk sudah ada',
            'price.required' => 'Harga produk harus diisi',
            'description.required' => 'Deskripsi produk harus diisi',
            'picture.image' => 'Yang anda pilih bukan gambar',
            'picture.max' => 'Ukuran gambar terlalu besar. Maksimal 1MB'
        ]);

        if (Request()->picture == "") {
            $fileName = Request()->pictureLama;
        } else {
            $file = Request()->picture;
            $fileName = Request()->file('picture')->getClientOriginalName();
            $file->move(public_path('img/products'), $fileName);
        }


        $product->name = Request()->name;
        $product->id_brand = Request()->id_brand;
        $product->price = Request()->price;
        $product->description = Request()->description;
        $product->picture = $fileName;

        $product->save();

        return redirect()->to('/admin/product/' . Request()->id_product)->with('pesan', 'Berhasil diperbarui.');
    }

    public function deleteProduct($id_product)
    {
        $product = $this->ProductModel->find($id_product);

        unlink(public_path('img/products') . '/' . $product->picture);

        $product->delete();

        return redirect()->to('/admin/product')->with('pesan', 'Produk berhasil dihapus.');
    }

    public function brand()
    {
        $data['brand'] = $this->BrandModel->allData();

        for ($i = 0; $i < count($data['brand']); $i++) {
            $data['brand'][$i]->jumlah_produk = $this->ProductModel->qtyFromBrand($data['brand'][$i]->id_brand);
        }

        return view('admin/brand', $data);
    }

    public function addBrand()
    {
        Request()->validate([
            'nama' => 'required|unique:brand,nama',
        ], [
            'nama.required' => 'Nama brand harus diisi',
            'nama.unique' => 'Nama brand sudah ada',
        ]);

        $brand = new BrandModel;
        $brand->nama = Request()->nama;

        $brand->save();

        return redirect()->to('/admin/brand')->with('pesan', 'Berhasil ditambahkan.');
    }

    public function editBrand($id_brand)
    {
        $data = [
            'brand' => $this->BrandModel->getBrand($id_brand),
        ];
        return view('admin/editbrand', $data);
    }

    public function updateBrand()
    {
        $brand = $this->BrandModel->find(Request()->id_brand);
        if ($brand->nama == Request()->nama) {
            $rule_name = 'required';
        } else {
            $rule_name = 'required|unique:brand,nama';
        }

        Request()->validate([
            'nama' => $rule_name,
        ], [
            'nama.required' => 'Nama brand harus diisi',
            'nama.unique' => 'Nama brand sudah ada',
        ]);

        $brand->nama = Request()->nama;

        $brand->save();

        return redirect()->to('/admin/brand')->with('pesan', 'Berhasil diperbarui.');
    }

    public function deleteBrand($id_brand)
    {
        $brand = $this->BrandModel->find($id_brand);

        $brand->delete();

        return redirect()->to('/admin/brand')->with('pesan', 'Brand berhasil dihapus.');
    }

    public function account()
    {
        $data = [
            'account' => $this->UsersModel->allData(),
        ];

        return view('admin/account', $data);
    }

    public function detailAccount($id)
    {
        $data = [
            'account' => $this->UsersModel->getUser($id),
            'role' => $this->UsersModel->getRole(),
        ];
        return view('admin/detailaccount', $data);
    }

    public function updateRole()
    {
        $account = $this->UsersModel->find(Request()->id);

        $account->id_group = Request()->id_group;

        $account->save();

        return redirect()->to('/admin/editAccount/' . Request()->id)->with('pesan', 'Berhasil diperbarui.');
    }

    public function deleteAccount($id)
    {
        $account = $this->UsersModel->find($id);

        $account->delete();

        return redirect()->to('/admin/account')->with('pesan', 'Akun berhasil dihapus.');
    }
}
