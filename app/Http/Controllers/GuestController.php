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
use GuzzleHttp\Client;

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
        $order = DB::table('tbl_order')->where('id_order', \DB::raw("(select max(id_order) from tbl_order)"))->where('user_order_id', Auth::guard('pelanggan')->user()->id_pelanggan)->first();

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

        return view('guest.struk', ['transaksi' => $transaksi, 'order' => $order, 'name' => $name, 'phone' => $phone, 'email' => $email])->with('alert', 'Transaksi berhasil');
    }

    public function createSnapToken()
    {
        $ambil = DB::table('tbl_order')->where('user_order_id', Auth::guard('pelanggan')->user()->id_pelanggan)->where('status_order2', 'sedang_dipesan')->get();
        $order = DB::table('tbl_order')->where('id_order', \DB::raw("(select max(id_order) from tbl_order)"))->where('user_order_id', Auth::guard('pelanggan')->user()->id_pelanggan)->first();

        foreach ($ambil as $a) {
            DB::table('tbl_order_detail')->insert([
                'id_order_detail' => $order->id_order,
                'order_id' => $a->id_order
            ]);
        }

        $bayar = DB::table('tbl_transaksi')->where('order_detail_id', $order->id_order)->first();
        $grossAmount = (float) $bayar->total_bayar;
        $orderId = $bayar->id_transaksi;

        $client = new Client();

        try {
            $response = $client->request('POST', 'https://app.sandbox.midtrans.com/snap/v1/transactions', [
                'json' => [
                    'transaction_details' => [
                        'order_id' => $orderId,
                        'gross_amount' => $grossAmount,
                    ],
                    'customer_details' => [
                        'first_name' => 'shidqi januardi',
                        // 'email' => 'asrafrd@students.amikom.ac.id',
                        'email' => 'shidqijanuardi@students.amikom.ac.id',
                        'phone' => '123123123123',
                    ],
                    "item_details" => [
                        [
                            // "id" => "12",
                            "price" => 15000,
                            "quantity" => 10,
                            "name" => "Mie Ayam Rica-Rica",
                            "brand" => "Bakso Lapangan Bola",
                            "category" => "Makanan",
                            "merchant_name" => "Bakso Lapangan Bola",
                            "url" => "https://tokobuah.com/apple-fuji"
                        ]
                    ],
                    'credit_card' => [
                        'secure' => true,
                    ],
                ],
                'headers' => [
                    'accept' => 'application/json',
                    'content-type' => 'application/json',
                    'Authorization' => 'Basic ' . base64_encode(env('MIDTRANS_SERVER_KEY') . ':'),
                ],
            ]);

            $responseBody = json_decode($response->getBody(), true);

            // Jika token diperoleh, langsung redirect ke halaman pembayaran Snap
            if (isset($responseBody['token'])) {
                return redirect()->away('https://app.sandbox.midtrans.com/snap/v2/vtweb/' . $responseBody['token']);
            } else {
                // Tangani jika terjadi kesalahan dalam mendapatkan token
                return redirect()->back()->with('error', 'Terjadi kesalahan dalam proses pembayaran.');
            }
        } catch (\Exception $e) {
            // Tangani jika terjadi kesalahan
            return null;
        }
    }

    public function handlePaymentResponse(Request $request)
    {
        // Ambil data status pembayaran dari request Midtrans
        $paymentStatus = 'oke';
        $orderId = 'order10';
        $paymentAmount = 100000;

        // Tampilkan halaman dengan informasi status pembayaran
        // return view('guest.pay', compact('paymentStatus', 'orderId', 'paymentAmount'));
        // return view('guest.pay');
        return view('guest.pay', ['paymentStatus' => $paymentStatus, 'orderId' => $orderId, 'paymentAmount' => $paymentAmount])->with('alert', 'Transaksi berhasil');
    }

    public function handleMidtransWebhook(Request $request)
    {
        // Pastikan ini adalah request dari Midtrans dengan memeriksa signature
        $receivedSignature = $request->header('Signature');
        $expectedSignature = hash('sha512', $request->getContent() . env('MIDTRANS_SERVER_KEY'));

        if ($receivedSignature !== $expectedSignature) {
            return response()->json(['error' => 'Invalid signature'], 401);
        }

        // Proses respons dari Midtrans
        $payload = $request->all();

        // Handle respons Midtrans di sini (misalnya, update status pembayaran di database)
        // Misalnya, jika Anda ingin menandai pesanan sebagai dibayar:
        // $orderId = $payload['order_id'];
        // DB::table('orders')->where('id', $orderId)->update(['status' => 'paid']);

        // Kirim respons sukses ke Midtrans
        return response()->json(['status' => 'success']);
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
