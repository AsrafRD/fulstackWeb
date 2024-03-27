<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Warung Bakso Lapangan Bola - Struk</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style2.css')}}">
  <link rel="stylesheet" href="{{ asset('owlcarousel/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{ asset('owlcarousel/owl.theme.default.min.css')}}">

  <style>
    .btn-circle {
      width: 30px;
      height: 30px;
      text-align: center;
      padding: 6px 0;
      font-size: 12px;
      line-height: 1.428571429;
      border-radius: 15px;
    }

    .btn-circle.btn-lg {
      width: 50px;
      height: 50px;
      padding: 10px 16px;
      font-size: 18px;
      line-height: 1.33;
      border-radius: 25px;
    }

    .btn-circle.btn-xl {
      width: 70px;
      height: 70px;
      padding: 10px 16px;
      font-size: 24px;
      line-height: 1.33;
      border-radius: 35px;
    }

    .screen {
      position: relative;
    }

    .innerdiv {
      position: absolute;
      bottom: 0;
      right: 0;
    }

    .margin {
      margin-top: -100px;
    }
  </style>

  @yield('page-styles')
</head>

<body>

  {{-- navbar --}}
  <div class="row">
    <div class="col-md-5">
      <nav class="navbar navbar-expand-lg navbar-transparent bg-transparent shadow-sm mb-5">
        <!-- <img src="{{asset('assets/img/logo.png')}}" style="width: 100px;">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon pt-1"><i class="fas fa-bars text-light"></i></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ml-3">
                  <li class="nav-item">
                    <a class="nav-link text-light" href="/home" id="me">Hi, {{ Auth::guard('pelanggan')->user()->nama_pelanggan }}</span></a>
                  </li>
                </ul>
              </div>
            </div> -->
      </nav>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row mt-5">
      <div class="col-md-12 mb-5">
        <h4 class="text-center" id="bo">Silahkan Selesaikan Pembayaran Anda</h4>
      </div>
      <div class="col-md-6 offset-md-3">
        <div class="card">
          <!-- <div class="card-header bg-transparent row" id="bo">
                  <div class="col-md-6 mt-10">
                    Warung Bakso Lapangan Bola
                  </div>
                  <div class="col-md-6">
                    <a href=""><img src="{{asset('assets/img/logo.png')}}" style="width: 100px;"></a>
                  </div>
                </div> -->
          <div class="card-body">
            <div class="col-md-15">
              <span id="bo">Detail Pesanan</span>
              <div class="col-md-12">
                @foreach ($order as $item)
                <div class="col-md-12">
                  <hr>
                </div>
                <div class="col-md-12">
                  <img src="{{asset('assets/img/produk/' . $item->gambar_masakan)}}" style="width: 100px;">
                </div>
                <div class="my-auto offset-md-5 margin">
                  <span id="re" class="text-secondary">{{ $item->jumlah }}x {{ $item->nama_masakan }}</span>
                  <!-- </div>
                <div class="offset-md-1"> -->
                  <span id="re" class="text-secondary offset-md-5">Rp {{ $item->harga * $item->jumlah }}</span>
                </div>
                <div class="col-md-12">
                  <hr>
                </div>
                @endforeach
              </div>
            </div>

            <div class="col-md-12 my-3 text-right">
              <span class="card-text" id="re">Total Pembayaran</span><br>
              <span class="card-text text-danger" id="bo">{{ $transaksi->total_bayar }}</span>
            </div>

            <div class="row text-center"><br>
              <span class="col-md-12 text-center" id="re">Kode Transaksi</span><br>
              <div class="col-12 text-center">
                <a href="#" class="btn btn-lg btn-outline-secondary text-dark text-nowrap disabled" id="me">{{$transaksi->id_transaksi }}</a>
                <span class="" id="me"><br>( berikan ke kasir <span id="bo">kode</span> anda !! )</span>
              </div>
            </div>


            <!-- <div class="col-md-3 offset-md-3">
              <a href="/kasir" class="offset-md-4 btn btn-danger text-light my-3" id="me">Proses Sebagai Kasir</a>
            </div>

            <div class="col-md-6 offset-md-1 mb-5 mt-5">
              <a href="/kasir_laporan" class="btn btn-danger mb-3">Cetak laporan</a>
              <form action="/cari_order_kasir" method="POST">
                @csrf
                <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Kode transaksi</span>
                  </div>
                  <input autocomplete="off" name="id" type="text" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm">
                  <div class="input-group-append">
                    <button class="btn btn-danger px-3" type="submit" id="button-addon2"><i
                        class="fas fa-search"></i></button>
                  </div>
                </div>
              </form>
            </div> -->

            <div class="row mt-2">
              <div class="col-md-12 mb-5">
              <p class="text-center" id="bo">Atau</p>
                <h5 class="text-center" id="bo">Silahkan Selesaikan Pembayaran Anda</h5>
              </div>
              <div class="col-md-6 offset-md-3">
                <div class="card">
                  <div class="card-body">
                    <!-- Existing card content -->

                    <!-- Add form for name, phone number, and email -->
                    <form action="/createSnapToken" class="row" method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" value="{{ $name }}" class="form-control" id="name" name="name" required>
                      </div>
                      <div class="form-group">
                        <label for="phone">Nomor Telepon:</label>
                        <input type="text" value="{{ $phone }}" class="form-control" id="phone" name="phone" required>
                      </div>
                      <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" value="{{ $email }}" class="form-control" id="email" name="email" required>
                      </div>

                      <div class="col-md-12">
                        <button class="btn btn-primary btn-sm btn-block btn-danger py-2" id="bayar"><i class="fas fa-dollar-sign fa-1x"></i> Checkout</button>		
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="col-md-3"></div>
      <div class="col-md-3 offset-md-3">
        <a href="/home" class="btn btn-outline-danger btn-block text-danger my-3" id="me">Pesan lagi</a>
      </div>

      <div class="col-md-3">
        <a href="{{ route('order.batal', $transaksi->order_detail_id) }}"
          class="btn btn-outline-danger btn-block text-danger my-3" id="me">Batalkan</a>
      </div>
      <div class="col-md-6 offset-md-3 text-center">
        <a href="{{ route('nota', $transaksi->order_detail_id) }}" class="text-danger" id="me"><i
            class="fas fa-file-pdf"></i> Nota Transaksi</a>
      </div>


    </div>
  </div>



  <footer class="main-footer bg-transparent mt-5">
    <div class="text-center text-secondary py-3">
      <img src="{{asset('assets/img/logo.png')}}" style="width: 100px;" class="mb-2"><br>
      Copyright &copy; 2022 Aliansi Hokage
    </div>
    </div>
  </footer>


  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->


  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js')}}"></script>
  <script src="{{ asset('assets/js/custom.js')}}"></script>
  <script src="{{ asset('jquery.min.js')}}"></script>
  <script src="{{ asset('owlcarousel/owl.carousel.min.js')}}"></script>



</body>

</html>