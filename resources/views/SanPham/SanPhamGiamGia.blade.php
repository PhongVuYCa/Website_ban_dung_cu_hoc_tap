@include('header')
<div style="padding: 20px;  width: 100%; border: 2px solid #c3b9f4d8">
    <a style="margin: 10px 0px; color: #777777">SHOP</a><br>
    <a>Trang chủ / </a><a>Sản phẩm / </a><a style="color:#2d08e9d8">Sản phẩm giảm giá</a>
</div>
<div style="width:100%;min-height:200px;" class="home">
    <div class="home_left">
        
        <div  >
            <a style="font-weight: bold;size:20px;text-decoration: none;    color: #000;;" href="{{url('/')}}" >Loại sản phẩm</a><br>
                @foreach($loaiSPs as $loaiSP)
                    <a style="text-decoration: none; padding: 8px 0 0 8px; color: #000;"  href="{{url('/LoaiSanPham', $loaiSP->id)}}" >{{ $loaiSP->TenLoaiSP }}</a><br>
                @endforeach
                <a style="font-weight: bold;size:20px;text-decoration: none;    color: #000;;" href="{{url('/SanPhamHot')}}" >Hot <img src="https://fptcity.vn/wp-content/uploads/hot-icon.gif" alt="" width="50px" height="50px"></a><br>
            <a style="font-weight: bold;size:20px;text-decoration: none;    color: #000;;" href="{{url('/SanPhamGiamGia')}}" >Giảm giá  <img src="https://img.lovepik.com/element/40174/0171.png_860.png" alt="" width="50px" height="50px"></a><br>
        </div>
    </div>
    <div class="home_right" >
        <div style="padding: 5px; margin-top: 30px; border-left: 1px solid #777777">
            @foreach ($products as $product)
                <div class="card" style="width: 190px; height:280px;  margin: 0 0 40px 40px; float: left">
                    <img src="<?php echo asset("$product->id_HinhAnh")?>" alt="" width="188px" height="150px">
                    <div class="card-body">
                        <a href="{{url('/ChiTietSP', $product->id)}}" style = "text-decoration: none; color: black; margin-left: 70px"><h6 style = "text-align: center" class="card-title">{{ $product->TenSP }}</h6></a>
                        <p style = "color: #DD4466; text-align: center" class="card-text"><b>{{ $product->Gia }} VND</b></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@include('footer')