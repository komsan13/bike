<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none alert-white  border-radius-xl  position-sticky my-3 top-1 z-index-sticky  blur shadow-blur left-auto" id="navbarBlur" navbar-scroll="true" style="border-radius: 10px;">
    <div class="container-fluid py-1 px-3">
        {{-- <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb mb-1 pb-2 pt-2 px-3 me-sm-6 me-5">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ str_replace('-', ' ', Request::path()) }}</li>
            </ol>
        </nav> --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-1 pb-2 pt-2 px-3 me-sm-6 me-5 ">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ str_replace('-', ' ', Request::path()) }}</li>
            </ol>
          </nav>
        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
            </a>
        </li>
        <!-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Home</a></li>
                <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">{{ str_replace('-', ' ', Request::path()) }}</li>
            </ol>
            <h6 class="font-weight-bolder mb-0 text-capitalize">{{ str_replace('-', ' ', Request::path()) }}</h6>
        </nav> -->
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbar">
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a href="{{ url('/logout')}}" class="nav-link text-body alert-dark font-weight-bold btn btn-sm">
                        <i class="fa-lg fas fa-sign-out-alt fa-fade text-danger" style="font-size: 12px;"></i>&nbsp;&nbsp;  <small class="text-white">??????????????????????????????</small>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- End Navbar -->
