<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="image/logo.png"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
</head>
<body>
@include('header')
<div style="padding: 20px;  width: 100%; border: 2px solid #c3b9f4d8">
    <a style="margin: 10px 0px; color: #777777">SHOP</a><br>
    <a style="color:#2d08e9d8">Trang chủ</a>
</div>
<div style="width:100%;min-height:200px;" class="home">
    <div class="home_left">
        
        <div >
            <a style="font-weight: bold;size:20px;text-decoration: none;    color: #000;;" href="{{url('/')}}" >Trang chủ</a><br>
            <a style="font-weight: bold;size:20px;text-decoration: none;    color: #000;;" href="{{url('/LoaiSanPham')}}" >Loại sản phẩm</a><br>
                @foreach($loaiSPs as $loaiSP)
                    <a style="text-decoration: none; padding: 8px 0 0 8px; color: #000;"  href="{{url('/LoaiSanPham', $loaiSP->id)}}" >{{ $loaiSP->TenLoaiSP }}</a><br>
                @endforeach
                <a style="font-weight: bold;size:20px;text-decoration: none;    color: #000;;" href="{{url('/SanPhamHot')}}" >Hot <img src="https://fptcity.vn/wp-content/uploads/hot-icon.gif" alt="" width="50px" height="50px"></a><br>
            <a style="font-weight: bold;size:20px;text-decoration: none;    color: #000;;" href="{{url('/HienThiSP')}}" >Giảm giá  <img src="https://img.lovepik.com/element/40174/0171.png_860.png" alt="" width="50px" height="50px"></a><br>
        </div>
    </div>
    <div class="home_right" style="margin-top: 20px">
        <div class="container">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://png.pngtree.com/background/20210712/original/pngtree-cute-back-to-school-seamless-pattern-background-illustration-in-hand-drawn-picture-image_1183243.jpg" class="d-block w-100" alt="banner 1" style="max-width: 100%; max-height: 300px;">
                  </div>
                  <div class="carousel-item">
                    <img src="https://png.pngtree.com/thumb_back/fw800/background/20190221/ourmid/pngtree-cartoon-hand-painted-school-season-school-supplies-image_13066.jpg" class="d-block w-100" alt="banner 2" style="max-width: 100%; max-height: 300px;">
                  </div>
                  <div class="carousel-item">
                    <img src="https://thuvienmuasam.com/uploads/default/optimized/2X/6/635ff76f529ee3327c460a66d24648965da0c40e_2_1035x541.jpeg" class="d-block w-100" alt="banner 3" style="max-width: 100%; max-height: 300px;">
                  </div>
                  <div class="carousel-item">
                    <img src="https://quatangtiny.com/wp-content/uploads/2021/12/do-dung-hoc-tap.jpg" class="d-block w-100" alt="banner 4" style="max-width: 100%; max-height: 300px;">
                  </div>
                  <div class="carousel-item">
                    <img src="https://thiquocgia.vn/wp-content/uploads/top-10-bai-van-ta-do-dung-hoc-tap-ngan-gon-1.jpg" class="d-block w-100" alt="banner 5" style="max-width: 100%; max-height: 300px;">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>

        <div class="tabs" style="margin: 50px 0 50px 100px;">
            <div class="tab-item">
                Sản phẩm theo loại
            </div>
            <div class="tab-item">
                Sản phẩm giảm giá
            </div>
            <div class="tab-item">
                Sản phẩm hot
            </div>
            <div class="line"></div>
        </div>
        <div style="margin-top: 30px; margin-left: 50px;">
            <div class="card">
                @foreach($sp1 as $sp1)
                <img src="{{$sp1->id_HinhAnh}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href=""><h5 style = "text-align: center" class="card-title">{{$sp1->TenSP}}</h5></a>
                    <p style="color: #DD4466; text-align: center" class="card-text"><b>{{$sp1->Gia}} VND</b></p>
                </div>
                @endforeach
            </div>
            <div class="card">
                @foreach($sp2 as $sp2)
                <img src="{{$sp2->id_HinhAnh}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href=""><h5 style = "text-align: center" class="card-title">{{$sp2->TenSP}}</h5></a>
                    <p style="color: #DD4466; text-align: center" class="card-text"><b>{{$sp2->Gia}} VND</b></p>
                </div>
                @endforeach
            </div>
            <div class="card">
                @foreach($sp3 as $sp3)
                <img src="{{$sp3->id_HinhAnh}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href=""><h5 style = "text-align: center" class="card-title">{{$sp3->TenSP}}</h5></a>
                    <p style="color: #DD4466; text-align: center" class="card-text"><b>{{$sp3->Gia}} VND</b></p>
                </div>
                @endforeach
            </div>
        </div>


        <div style = "background-color: #EDE9E9; height: 1160px; width: 100%; float: left; margin-top: 50px;">
            <!--SẢN PHẨM HOT-->
            <p style="margin-top: 50px; text-align: center">SẢN PHẨM HOT</p>
            <div style="float: left; margin-left: 25px">
                @foreach($sphot as $sphot)
                <div class="card" style="width: 25rem; margin-left: 50px; float: left; margin-top: 30px">
        
                    <img style="margin-left: 119px" src="{{$sphot->id_HinhAnh}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="#"><h5 style = "text-align: center" class="card-title">{{$sphot->TenSP}}</h5></a>
                        <p style = "color: #DD4466; text-align: center" class="card-text"><b>{{$sphot->Gia}}</b></p>
                    </div>
                </div>
                
                @endforeach
                
            </div>
        
            <!--BLOG-->
            <p style="text-align: center; margin-top: 700px">BLOG</p>
            <div id="carouselExampleInterval1" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($blog as $blog)
                    <div class="carousel-item active" data-bs-interval="4000">
                        <div class="card mb-3" style="width: 940px; margin-left: 35px; height: 300px">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img style="height: 250px;width:220px; margin-left: 40px; margin-top: 25px" src="{{$blog->id_HinhAnh}}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <b>{{$blog->TenSP}}</b>
                                        </h5><br>
                                        <p class="card-text">{{$blog->MoTa}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')

<!-- Link tệp Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
