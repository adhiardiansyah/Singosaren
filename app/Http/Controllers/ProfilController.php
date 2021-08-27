<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->UsersModel = new UsersModel();
        $this->CartModel = new CartModel();
    }

    public function index()
    {
        $data = [
            'cart' => $this->CartModel->cart(),
        ];

        return view('profil/index', $data);
    }

    public function edit()
    {
        $data = [
            'cart' => $this->CartModel->cart(),
            'user' => $this->UsersModel->getData(),
        ];
        return view('profil/edit', $data);
    }

    public function update()
    {
        Request()->validate([
            'email' => 'required|email:rfc,dns',
            'name' => 'required',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'address' => 'required',
            'user_image' => 'image|max:1024',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email:rfc,dns' => 'Email tidak valid',
            'name.required' => 'Nama lengkap harus diisi',
            'phone_number.required' => 'Nomor telepon harus diisi',
            'phone_number.regex' => 'Nomor telepon harus diisi dengan angka',
            'phone_number.min' => 'Nomor telepon minimal 11 digit',
            'address.required' => 'Alamat lengkap harus diisi',
            'user_image.image' => 'Yang anda pilih bukan gambar',
            'user_image.max' => 'Ukuran gambar terlalu besar. Maksimal 1MB'
        ]);

        if (Request()->user_image == "") {
            $fileName = Request()->user_imageLama;
        } else {
            $file = Request()->user_image;
            $fileName = Request()->file('user_image')->getClientOriginalName();
            $file->move(public_path('img'), $fileName);
        }

        $profil = $this->UsersModel->find(Auth::user()->id);
        $profil->email = Request()->email;
        $profil->name = Request()->name;
        $profil->phone_number = Request()->phone_number;
        $profil->address = Request()->address;
        $profil->user_image = $fileName;

        $profil->save();

        return redirect()->to('/profil')->with('pesan', 'Data berhasil diubah.');
    }
}
