@extends('app')
@section('content')
<body>
<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Cart</h3>
          <span class="breadcrumb"><a href="#">Home</a>  >  Cart</span>
        </div>
      </div>
    </div>
  </div>
  <style>
    @media (min-width: 1025px) {
      .h-custom {
        height: 100vh !important;
      }
    }
  </style>
  <form class="mt-4" method="post" action="{{ route('use.voucher') }}" enctype="application/x-www-form-urlencoded">
    @csrf
    <section class="h-100 h-custom" style="background-color: #eee;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col">
            <div class="card">
              <div class="card-body p-4">

                <div class="row">

                  <div class="col">
                    <h5 class="mb-3"><a href="{{route('category.home')}}" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                    <hr>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <div>
                        <p class="mb-1">Shopping cart</p>
                        <p style="font-weight:bold;" class="mb-0">You have {{$totalProduct}} items in your cart</p>
                      </div>
                      <div>
                        <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                              class="fas fa-angle-down mt-1"></i></a></p>
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
          <img src="{{asset('storage/images/' . $value['photo'])}}" class="" alt="Shopping item"
            style="width: 165px;height: 100px;border-radius:5px;">
          </div>
          <div class="ms-3">
          <h5>{{$value['name']}}</h5>
          <!-- <p class="small mb-0">{{$value['description']}}</p> -->
          <input name="product_id" type="hidden" value="{{$value['id']}}">
          </div>
          </div>
          <div class="d-flex flex-row align-items-center">
          <div style="width: 50px;">
          </div>
          <div style="width: auto; margin-right: 10px">
          <h5 class="mb-0">{{number_format($value['price'])}} VND</h5>
          </div>
          <a href="{{route('delete.cart', ['product_id' => $key])}}" style="color: red;"><i
            class="fas fa-trash-alt"></i></a>
          </div>
          </div>
        </div>
        </div>
      @endforeach

              <div class="form-group"><label class="col-sm-2 control-label">
                <p style="color:dark;font-weight:bold;" class="mb-2">Voucher</p>
                </label>
                <div class="col-sm-10">
                <select class="form-control" name="voucher" id="dynamic_select">
                  <option value="0">{{ "None" }}</option>
                  @foreach($voucher as $value)
                    <!-- <input type="hidden" name="type" value="{{$value->voucher->type}}"> -->
                    <option name="voucher" value="{{ $value->voucher->content.'<>'.$value->voucher->type.'<>'.$value->voucher->value }}">{{ $value->voucher->content }}</option>
                  @endforeach
                </select>
                </div><br>
              </div>

              <p style="color:dark;font-weight:bold;" class="mb-2">Subtotal</p>
              <hr class="my-2">
              <p style="color:dark;font-weight:bold;" class="mb-2">{{number_format($totalPrice)}} VND</p>
              <input type="hidden" value="{{$totalPrice}}" name="amount">
              <button type="submit" data-mdb-button-init data-mdb-ripple-init
              class="btn btn-info btn-block btn-lg">
              <div class="d-flex justify-content-between">
                <span style="color:white;">Xác Nhận Thanh Toán</span>
              </div>
              </button>

            </div>
          @elseif(is_null($cart))
      <h5 class="mb-3">Bạn Chưa Có Sản Phẩm Nào Trong Giỏ</h5>
      <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-block btn-lg">
        <div class="d-flex justify-content-between">
        <span style="margin-left:10px;color:white;"> <a style="color:white;"
          href="{{route('category.home')}}">Mua Gì Đó</a></span>
        </div>
      </button>
    @endif  

          
    </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  </form>

</body>