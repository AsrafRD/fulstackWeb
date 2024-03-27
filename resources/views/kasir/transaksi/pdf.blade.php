<!DOCTYPE html>
<html>
<head>
	<title>Warung Bakso Lapangan Bola</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
        <span>
            Warung Bakso Lapangan Bola <br>
            Jl. Selokan Mataram, Demangan, Maguwoharjo, Kec. Depok <br>
            Kabupaten Sleman, Daerah Istimewa Yogyakarta, 55281
        </span>
        <hr>
    </center>

    <span>
        Kode Order : {{ $transaksi->id_transaksi }} <br>
        Nama : {{ $order2->nama_pelanggan }} <br>
        No. Meja : {{ $order2->no_meja }} <br>
        Tanggal : {{ $transaksi->tanggal_transaksi }}          
    </span>
    <hr>
 
	<table class="table table-sm table-hover mt-3 mb-5">
        <thead>
          <tr>
            <th>Nama Makanan</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub total</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($order as $item)
          <tr>
            <td>{{ $item->nama_masakan }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->harga }}</td>
            <td>{{ $item->harga*$item->jumlah }}</td>
          </tr>
          @endforeach
        </tbody>
    </table>
    <hr>

    <table class="table table-hover table-borderless">
        <thead>
          <tr>
            <th>Total Harga</th>
            <td>Rp. {{ $transaksi->total_bayar }}</td>
          </tr>
          <tr>
            <th>Jumlah Bayar</th>
            <td>Rp. {{ $transaksi->jumlah_pembayaran }}</td>
          </tr>
          <tr>
            <th>Kembalian</th>
            <td>Rp. {{ $transaksi->kembalian }}</td>
          </tr>
        </thead>
    </table>

    <center>
        <span>
            ~ LUNAS ~
         </span> <br> <br>
         <span>
             Terimakasih
         </span>
         <hr>
         <span>
             Warung Bakso Lapangan Bola
         </span>
    </center>
 
</body>
</html>