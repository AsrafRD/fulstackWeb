<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\pelanggan;
use Auth;
use Carbon\Carbon;
use App\Masakan;
use PDF;
use Midtrans\CoreApi;

class GuestController extends Controller
{

    public function login()
    {
        $now = Carbon::now('h');
        $noww = $now->isoFormat('HH');

        return view('guest.index', ['now' => $noww]);
    }
    public function index()
    {
        $makanan = DB::table('tbl_masakan')
            ->where('nama_kategori', 'makanan')
            ->where('status', 'tersedia')
            ->paginate(5);

        $minuman = DB::table('tbl_masakan')
            ->where('nama_kategori', 'minuman')
            ->where('status', 'tersedia')
            ->paginate(5);

        $dessert = DB::table('tbl_masakan')
            ->where('nama_kategori', 'dessert')
            ->where('status', 'tersedia')
            ->paginate(5);

        $order = DB::table('tbl_order')->where('status_order2', 'sedang_dipesan')->where('user_order_id', Auth::guard('pelanggan')->user()->id_pelanggan)
            ->join('tbl_masakan', function ($join) {
                $join->on('tbl_order.masakan_id', '=', 'tbl_masakan.id_masakan');
            })
            ->join('tbl_pelanggan', function ($join) {
                $join->on('tbl_order.user_order_id', '=', 'tbl_pelanggan.id_pelanggan');
            })
            ->get();

        return view('guest.home', ['makanan' => $makanan, 'minuman' => $minuman, 'dessert' => $dessert, 'order' => $order]);
    }

    public function pesan_order(Request $request)
    {
        $ambil = DB::table('tbl_masakan')->where('id_masakan', $request->id_masakan)->first();
        $now = date('Y-m-d');
        $hasil = $ambil->harga * 1;
        DB::table('tbl_order')->insert([
            'masakan_id' => $request->id_masakan,
            'order_detail_id' => 0,
            'user_order_id' => Auth::guard('pelanggan')->user()->id_pelanggan,
            'tanggal_order' => $now,
            'status_order2' => 'sedang_dipesan',
            'jumlah' => '1',
            'sub_total' => $hasil
        ]);
        if ($ambil->nama_kategori == 'makanan') {
            return redirect()->back()->with('makanan', 'Scroll kebawah untuk melihat keranjang');
        } elseif ($ambil->nama_kategori == 'minuman') {
            return redirect()->back()->with('minuman', 'Scroll kebawah untuk melihat keranjang');
        } {
            return redirect()->back()->with('dessert', 'Scroll kebawah untuk melihat keranjang');
        }
    }

    public function order_update(Request $request)
    {
        $ambil1 = DB::table('tbl_order')->where('id_order', $request->id_order)->first();
        $ambil2 = DB::table('tbl_masakan')->where('id_masakan', $ambil1->masakan_id)->first();
        $hasil = $ambil2->harga * $request->jumlah;
        DB::table('tbl_order')->where('id_order', $request->id_order)->update([
            'jumlah' => $request->jumlah,
            'sub_total' => $hasil
        ]);
        return redirect()->back()->with('alert', 'Berhasil mengubah jumlah pesan');
    }

    public function order_bayar(Request $request)
    {

        $ambil = DB::table('tbl_order')->where('user_order_id', Auth::guard('pelanggan')->user()->id_pelanggan)->where('status_order2', 'sedang_dipesan')->get();
        $order = DB::table('tbl_order')->where('id_order', \DB::raw("(select max(`id_order`) from tbl_order)"))->where('user_order_id', Auth::guard('pelanggan')->user()->id_pelanggan)->first();

        foreach ($ambil as $a) {
            DB::table('tbl_order_detail')->insert([
                'id_order_detail' => $order->id_order,
                'order_id' => $a->id_order
            ]);
        }

        $now = date('Y-m-d');
        $transaksi = DB::table('tbl_transaksi')->get();
        $hitung = count($transaksi);
        if ($hitung < 1) {
            $no = $hitung + 5;
            $kode = "ORDER" . $no;
        } else if ($hitung >= 1) {
            $no = $hitung + 5;
            $kode = "ORDER" . $no;
        }
        DB::table('tbl_transaksi')->insert([
            'id_transaksi' => $kode,
            'order_detail_id' => $order->id_order,
            'tanggal_transaksi' => $now,
            'total_bayar' => $request->total_bayar,
            'jumlah_pembayaran' => 0,
            'kembalian' => 0,
            'user_transaksi_id' => Auth::guard('pelanggan')->user()->id_pelanggan,
            'status_order' => 'belum_dibayar',
            'diantar' => 'belum',
        ]);

        $ambil = DB::table('tbl_order')->where('user_order_id', Auth::guard('pelanggan')->user()->id_pelanggan)->where('status_order2', 'sedang_dipesan')->update([
            'order_detail_id' => $order->id_order,
            'status_order2' => 'sudah_dipesan'
        ]);

        $transaksi = DB::table('tbl_transaksi')->where('order_detail_id', $order->id_order)->first();

        $order = DB::table('tbl_order')->where('order_detail_id', $order->id_order)->where('user_order_id', Auth::guard('pelanggan')->user()->id_pelanggan)
            ->join('tbl_masakan', function ($join) {
                $join->on('tbl_order.masakan_id', '=', 'tbl_masakan.id_masakan');
            })
            ->join('tbl_pelanggan', function ($join) {
                $join->on('tbl_order.user_order_id', '=', 'tbl_pelanggan.id_pelanggan');
            })
            ->get();
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        // dd($transaksi, $order, $name, $phone, $email);
        $okeLanjut = $this->order_lanjut($transaksi, $order);

        return view('guest.struk', ['okeLanjut' => $okeLanjut, 'transaksi' => $transaksi, 'order' => $order, 'name' => $name, 'phone' => $phone, 'email' => $email])->with('alert', 'Transaksi berhasil');
        // return view('guest.struk', ['transaksi' => $transaksi, 'order' => $order])->with('alert', 'Transaksi berhasil');
    }

    public function order_lanjut($transaksi, $order)
    {
        // Cek apakah $transaksi dan $order tidak null
        if ($transaksi && $order) {
            $grossAmount = (double) $transaksi->total_bayar;
            $orderId = $transaksi->id_transaksi;            // Kirim informasi ke view untuk ditampilkan pada struk
            // dd($grossAmount, $orderId);
            $snapToken = $this->createSnapToken($orderId, $grossAmount, $transaksi);
            return view('guest.pay', ['snapToken' => $snapToken]);
        } else {
            // Handle kasus di mana data tidak tersedia
            // Contohnya bisa menampilkan pesan kesalahan atau mengembalikan redirect ke halaman sebelumnya
            return redirect()->back()->with('error', 'Data tidak tersedia');
        }
    }

    public function createSnapToken($orderId, $grossAmount, $transaksi)
    {
        // Ambil kunci server dari konfigurasi
        $serverKey = env('MIDTRANS_SERVER_KEY');

        // Inisialisasi Snap Midtrans dengan kunci server yang valid
        \Midtrans\Config::$serverKey = $serverKey;

        // Inisialisasi Snap Midtrans
        $snap = new \Midtrans\Snap();

        // Contoh payload transaksi (sesuaikan dengan logika bisnis Anda)
        $transaction_details = [
            'order_id' => $orderId,       // ID pesanan dari aplikasi Anda
            'gross_amount' => $grossAmount, // Total pembayaran dari aplikasi Anda
            'customer_details' => [
                'first_name' => $customerName, // Nama pelanggan
                'email' => $customerEmail,     // Email pelanggan
                'phone' => $customerPhone,     // Nomor telepon pelanggan
            ],
        ];

        // Dapatkan snapToken
        $snapToken = $snap->getSnapToken($transaction_details);

        return $snapToken;
    }


    public function order_batal($id)
    {
        DB::table('tbl_order')
            ->where('user_order_id', Auth::guard('pelanggan')->user()->id_pelanggan)
            ->where('order_detail_id', $id)->update([
                    'status_order2' => 'batal_dipesan'
                ]);

        DB::table('tbl_transaksi')
            ->where('order_detail_id', $id)->update([
                    'status_order' => 'batal_dipesan'
                ]);

        return redirect('/home');
    }

    public function order_hapus($id)
    {
        DB::table('tbl_order')
            ->where('id_order', $id)
            ->delete();
        return redirect('/home');
    }

    public function feedback(Request $request)
    {
        $now = date('Y-m-d');
        DB::table('tbl_feedback')->insert([
            'isi' => $request->feedback,
            'tanggal' => $now
        ]);

        return redirect('/home')->with('feedback', 'Feedback tersampaikan');
    }

    public function nota($id)
    {
        $order = DB::table('tbl_order')->where('order_detail_id', $id)
            ->join('tbl_masakan', function ($join) {
                $join->on('tbl_order.masakan_id', '=', 'tbl_masakan.id_masakan');
            })
            ->join('tbl_pelanggan', function ($join) {
                $join->on('tbl_order.user_order_id', '=', 'tbl_pelanggan.id_pelanggan');
            })
            ->get();

        $order2 = DB::table('tbl_order')->where('order_detail_id', $id)
            ->join('tbl_masakan', function ($join) {
                $join->on('tbl_order.masakan_id', '=', 'tbl_masakan.id_masakan');
            })
            ->join('tbl_pelanggan', function ($join) {
                $join->on('tbl_order.user_order_id', '=', 'tbl_pelanggan.id_pelanggan');
            })
            ->first();

        $transaksi = DB::table('tbl_transaksi')->where('order_detail_id', $id)->first();

        // return view('guest.nota',['transaksi' => $transaksi, 'order' => $order,'order2' => $order2]);
        $pdf = PDF::loadview('guest.nota', ['transaksi' => $transaksi, 'order' => $order, 'order2' => $order2]);
        return $pdf->stream('struk-pdf');
    }
}
