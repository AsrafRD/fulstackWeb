
<!-- <nav class="navbar navbar-expand-lg bg-danger">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
      <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul> -->
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn social btn-outline-success" type="submit">Search</button>
      </form>
      <ul class="navbar-nav ml-3">
      <li class="nav-item">
        <a class="text-light" href="/home" id="me">Hi, {{ Auth::guard('pelanggan')->user()->nama_pelanggan }}</span></a>
      </li>
    </ul>
    </div>
  </div>
</nav> -->

<!-- <button
  class="btn btn-primary"
  type="button"
  data-mdb-toggle="offcanvas"
  data-mdb-target="#offcanvasScrolling"
  aria-controls="offcanvasScrolling"
>
  Enable body scrolling
</button>
<button
  class="btn btn-primary"
  type="button"
  data-mdb-toggle="offcanvas"
  data-mdb-target="#offcanvasWithBackdrop"
  aria-controls="offcanvasWithBackdrop"
>
  Enable backdrop (default)
</button>
<button
  class="btn btn-primary"
  type="button"
  data-mdb-toggle="offcanvas"
  data-mdb-target="#offcanvasWithBothOptions"
  aria-controls="offcanvasWithBothOptions"
>
  Enable both scrolling & backdrop
</button>

<div
  class="offcanvas offcanvas-start"
  data-mdb-scroll="true"
  data-mdb-backdrop="false"
  tabindex="-1"
  id="offcanvasScrolling"
  aria-labelledby="offcanvasScrollingLabel"
>
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">
      Colored with scrolling
    </h5>
    <button
      type="button"
      class="btn-close text-reset"
      data-mdb-dismiss="offcanvas"
      aria-label="Close"
    ></button>
  </div>
  <div class="offcanvas-body">
    <p>
      Try scrolling the rest of the page to see this option in action.
    </p>
  </div>
</div>
<div
  class="offcanvas offcanvas-start"
  tabindex="-1"
  id="offcanvasWithBackdrop"
  aria-labelledby="offcanvasWithBackdropLabel"
>
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBackdropLabel">
      Offcanvas with backdrop
    </h5>
    <button
      type="button"
      class="btn-close text-reset"
      data-mdb-dismiss="offcanvas"
      aria-label="Close"
    ></button>
  </div>
  <div class="offcanvas-body">
    <p>.....</p>
  </div>
</div>
<div
  class="offcanvas offcanvas-start"
  data-mdb-scroll="true"
  tabindex="-1"
  id="offcanvasWithBothOptions"
  aria-labelledby="offcanvasWithBothOptionsLabel"
>
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">
      Backdrop with scrolling
    </h5>
    <button
      type="button"
      class="btn-close text-reset"
      data-mdb-dismiss="offcanvas"
      aria-label="Close"
    ></button>
  </div>
  <div class="offcanvas-body">
    <p>
      Try scrolling the rest of the page to see this option in action.
    </p>
  </div>
</div> -->

<!-- <nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Offcanvas dark navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav> -->








<nav class="navbar navbar-expand-lg navbar-transparant bg-transparant shadow-sm fixed-top mb-3">

<img src="{{asset('assets/img/logo.png')}}" style="width: 100px;">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon pt-1"><i class="fas fa-bars text-light"></i></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
  
    <ul class="navbar-nav ml-3">
      <li class="nav-item">
        <a class="text-light" href="/home" id="me">Hi, {{ Auth::guard('pelanggan')->user()->nama_pelanggan }}</span></a>
      </li>
    </ul>
  </div>
  </div>
</nav>

<br><br><br><br><br>
<!-- <br><br><br><br><br> -->