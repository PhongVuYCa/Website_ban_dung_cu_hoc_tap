<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
<body>
    @if(session('user')&&session('user')->role!='KH')
<div class="admin_left">
    <div style="margin: 10px 0 50px 0;">
        <i style="margin-top:-20px;margin-left:0px; color:#CC99FF;border-color: white;" class="fa fa-star icon-star"></i>
        <a style="text-decoration: none; margin-left:10px;margin-top:-10px;color:#CC99FF;border-color: white;" href="{{url('/QuanLy')}}" class="mobile">PRODUCT STORE</a>
    </div>

    <a style="text-decoration: none; color: #fff; display: block; margin-bottom: 10px; border-bottom: 1px solid #c1c0c0;" href="{{url('QuanLy')}}"><i class="bi bi-house-door"></i>  Trang chủ </a>
    <a style="text-decoration: none; color: #fff; display: block; margin-bottom: 10px; border-bottom: 1px solid #c1c0c0;" href="{{url('/DanhSachNhanVien')}}"><i class="bi bi-people-fill"></i> Danh sách Nhân viên </a>
    <a style="text-decoration: none; color: #fff; display: block; margin-bottom: 10px; border-bottom: 1px solid #c1c0c0;" href="{{url('/DanhSachKhachHang')}}"><i class="bi bi-people-fill"></i> Danh sách khách hàng</a>
    <a style="text-decoration: none; color: #fff; display: block; margin-bottom: 10px; border-bottom: 1px solid #c1c0c0;" href="{{url('DanhSachLoaiSP')}}"><i class="bi bi-layout-text-window-reverse"></i> Danh sách Loại sản phẩm</a>
    <a style="text-decoration: none; color: #fff; display: block; margin-bottom: 10px; border-bottom: 1px solid #c1c0c0;" href="{{url('DanhSachSP')}}"><i class="bi bi-clipboard2-minus-fill"></i> Danh sách sản phẩm</a>
    <a style="text-decoration: none; color: #fff; display: block; margin-bottom: 10px; border-bottom: 1px solid #c1c0c0;" href="{{url('DanhSachDonHang')}}"><i class="bi bi-cart-check-fill"></i> Danh sách đơn hàng</a>
    <a style="text-decoration: none; color: #fff; display: block; margin-bottom: 10px; border-bottom: 1px solid #c1c0c0;" href="{{url('ThongKe')}}"><i class="bi bi-graph-up-arrow"></i> Thống kê</a>

    <a style="text-decoration: none; color: #fff; display: inline-block; margin-top: 170px; max-width: 200px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;" href="{{url('ThongTinCaNhan')}}"><i class="bi bi-person"></i> {{session('user')->username}}</a>
    <a style="text-decoration: none; color: #fff; display: inline; margin-top: 170px; float: right;" href="{{url('DangXuat')}}"> <i class="bi bi-box-arrow-right logout-icon"></i></a>
      
</div>

@else
    <!-- Chuyển hướng nếu chưa đăng nhập -->
    <script>window.location.href = "{{url('DangXuat')}}";</script>
@endif
</body>
