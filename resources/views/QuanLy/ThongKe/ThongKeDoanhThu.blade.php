<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo.png"/>
    <title>Thống kê doanh thu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
</head>
<body>
    <div class="admin">
        @include('left')
        
        <div class="admin_right" style="padding:20px;">
            <form action="/ThongKe" method="GET" class="d-flex align-items-center">
                <div class="flex-grow-1 me-3">
                    <label for="nam" class="form-label">Chọn năm:</label>
                    <select name="nam" id="nam" style="width: 100px;">
                        @for ($i = 2024; $i <= 2040; $i++)
                            <option value="{{ $i }}" {{ $nam == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    
                <button type="submit" style="background-color: black; color: white">Xem</button>
                </div>
            </form>
            
            
            
            <div>
                <canvas id="myChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Lấy thẻ canvas
        var ctx = document.getElementById('myChart').getContext('2d');

        // Dữ liệu doanh thu từ PHP
        var doanhThuThang = <?php echo json_encode($doanhThuThang); ?>;

        // Tạo biểu đồ
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                datasets: [{
                    label: 'Doanh thu',
                    data: doanhThuThang,
                    backgroundColor:'#CC99FF', // Màu của cột
                    borderColor: 'rgba(255, 99, 132, 1)', // Màu của đường viền
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
