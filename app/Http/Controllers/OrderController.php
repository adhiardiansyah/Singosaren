<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\OrderModel;
use Illuminate\Http\Request;
use App\Models\DetailOrderModel;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->CartModel = new CartModel();
        $this->OrderModel = new OrderModel();
        $this->DetailOrderModel = new DetailOrderModel();
    }

    public function checkout()
    {
        $code = 'ORD' . strtoupper(substr(str_shuffle(md5(Auth::user()->email . time())), 0, 9));

        $order = new OrderModel;
        $order->user_id = Auth::user()->id;
        $order->code_order = $code;
        $order->date_order = date('Y-m-d H:i:s');
        $order->destination = Request()->destination;
        $order->status = 'BELUM BAYAR';

        $order->save();

        foreach ($this->CartModel->cart() as $c) {
            $detail_order = new DetailOrderModel;
            $detail_order->order_id = $order->id_order;
            $detail_order->product_id = $c->product_id;
            $detail_order->price = $c->price;
            $detail_order->qty = $c->qty;
            $detail_order->total = $c->price * $c->qty;

            $detail_order->save();
        }

        $this->CartModel->cartDelete();

        return redirect()->to('/history')->with('pesan', 'Berhasil dipesan.');
    }

    public function history()
    {
        $data['history'] = [];
        $orders = $this->OrderModel->allData();
        foreach ($orders as $order) {
            $detail_all = $this->DetailOrderModel->allDetailData($order->id_order);

            $data['history'][$order->code_order] = [
                'id_order' => $order->id_order,
                'date_order' => $order->date_order,
                'destination' => $order->destination,
                'status' => $order->status,
            ];

            $data['history'][$order->code_order]['detail'] = [];
            foreach ($detail_all as $detail) {
                array_push(
                    $data['history'][$order->code_order]['detail'],
                    [
                        'name' => $detail->name,
                        'price' => $detail->price,
                        'qty' => $detail->qty,
                        'total' => $detail->total,
                    ]
                );
            }
        }

        $data['cart'] = $this->CartModel->cart();
        $data['total'] = $this->OrderModel->countData();

        return view('history', $data);
    }

    public function deleteOrder()
    {
        $order = $this->OrderModel->find(Request()->id_order);

        if ($order->bukti_bayar != 'default.jpg') {
            unlink(public_path('img/bukti_bayar') . '/' . $order->bukti_bayar);
        }

        $order->delete();

        return redirect()->to('/history')->with('pesan', 'Pesanan berhasil dihapus.');
    }

    public function payment($id_order)
    {
        $data = [
            'order' => $this->OrderModel->getOrder($id_order),
            'cart' => $this->CartModel->cart(),
        ];
        return view('payment', $data);
    }

    public function updatePayment()
    {
        Request()->validate([
            'bukti_bayar' => 'image|max:1024',
        ], [
            'bukti_bayar.image' => 'Yang anda pilih bukan gambar',
            'bukti_bayar.max' => 'Ukuran gambar terlalu besar. Maksimal 1MB'
        ]);

        if (Request()->bukti_bayar == "") {
            $fileName = Request()->bukti_bayarLama;
        } else {
            $file = Request()->bukti_bayar;
            $fileName = Request()->file('bukti_bayar')->getClientOriginalName();
            $file->move(public_path('img/bukti_bayar'), $fileName);
        }

        $order = $this->OrderModel->find(Request()->id_order);
        $order->status = 'DIPERIKSA';
        $order->bukti_bayar = $fileName;

        $order->save();

        return redirect()->to('/history')->with('pesan', 'Bukti pembayaran berhasil diunggah.');
    }
}
