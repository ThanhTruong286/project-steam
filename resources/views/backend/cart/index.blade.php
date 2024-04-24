<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Hopi Steam</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-lugx-gaming.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/format.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 589 lugx gaming

https://templatemo.com/tm-589-lugx-gaming

-->
  </head>
<body>
<style>
@media (min-width: 1025px) {
.h-custom {
height: 100vh !important;
}
}
</style>
<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
                <h5 class="mb-3"><a href="{{route('category.home')}}" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Shopping cart</p>
                    <p style="font-weight:bold;" class="mb-0">You have {{$totalProduct}} items in your cart</p>
                  </div>
                  <div>
                    <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                        class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                  </div>
                </div>
                <!-- kiem tra gio hang -->
            @if(!is_null($cart))
                @foreach($cart as $key => $value)
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img
                            src="{{asset('storage/images/'.$value['photo'])}}"
                            class="" alt="Shopping item" style="width: 165px;height: 100px;border-radius:5px;">
                        </div>
                        <div class="ms-3">
                          <h5>{{$value['name']}}</h5>
                          <p class="small mb-0">{{$value['description']}}</p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 50px;">
                        </div>
                        <div style="width: 80px; margin-right: 10px">
                          <h5 class="mb-0">${{$value['price']}}</h5>
                        </div>
                        <a href="{{route('delete.cart',['product_id'=>$key])}}" style="color: red;"><i class="fas fa-trash-alt"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach

            </div>
            @elseif(is_null($cart))
            <h5 class="mb-3">Bạn Chưa Có Sản Phẩm Nào Trong Giỏ</h5>
            <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-block btn-lg">
                <div class="d-flex justify-content-between">
                <span style="margin-left:10px;color:white;"> <a style="color:white;" href="{{route('category.home')}}">Mua Gì Đó</a></span>
            </div>
            </button>
            @endif

            @if(!is_null($cart))
            @include($template)
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>