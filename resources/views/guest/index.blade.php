<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Warung Bakso &mdash; Lapangan Bola</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('node_modules/bootstrap-social/bootstrap-social.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="{{ asset('assets/img/logo.png')}}" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">Selamat Datang di <span class="font-weight-bold text-danger">Warung Bakso Lapangan Bola</span></h4>
            <p class="text-muted">Sebelum memesan, Silahkan Masukan Nama dan No. Meja Terlebih Dahulu</p>
            <form method="POST" action="/prosesloginpelanggan" class="needs-validation" novalidate="">
              @csrf
              <div class="form-group">
                <label for="Nama">Nama</label>
                <input id="Nama" type="Nama" class="form-control" name="nama_pelanggan" tabindex="1" required autofocus autocomplete="off">
                <div class="invalid-feedback">
                  Silahkan Isi Nama Anda Terlebih Dahulu
                </div>
              </div>

              <div class="form-group">
                <label for="no_meja">No. Meja</label>
                <input id="no_meja" type="no_meja" class="form-control" name="no_meja" tabindex="1" required autofocus autocomplete="off">
                <div class="invalid-feedback">
                  Silahkan Isi No. Meja Anda Terlebih Dahulu
                </div>
              </div>

              <input id="Nama" type="hidden" class="form-control" name="password" value="candra" tabindex="1" required autofocus>

              <div class="form-group text-right">
                <a href="#" class="float-left mt-3">
                  Selamat Memesan
                </a>
                <button type="submit" class="btn btn-danger btn-lg btn-icon icon-right" tabindex="4">
                  Masuk
                </button>
              </div>
            </form>

            @if(session('message'))
            <div class="alert alert-danger alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>×</span>
                </button>
                {{ session('message') }}
              </div>
            </div>
            @endif

            <div class="text-center mt-5 text-small">
              Copyright &copy; Aliansi Hokage
              <div class="mt-2">
                <a href="#">Privacy Policy</a>
                <div class="bullet"></div>
                <a href="#">Terms of Service</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="{{ asset('assets/img/backlogin.png')}}">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">         
                <h1 class="mb-2 display-4 font-weight-bold" style="text-shadow: 5px 5px #000000;">
                @if ($now < 11)
                  Selamat Pagi 
                @elseif ($now >= 11)
                  Selamat Siang
                @elseif ($now >= 18)
                  Selamat Malam
                @endif</h1>
                <h5 class="font-weight-normal text-muted-transparent">Daerah Istimewa Yogyakarta, Indonesia</h5>
              </div>
              Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/q3ApAZsS1os">
Aliansi Hokage</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">2022</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js')}}"></script>
  <script src="{{ asset('assets/js/custom.js')}}"></script>

  <!-- Page Specific JS File -->
</body>
</html>
