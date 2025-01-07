<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('thongke.doanhthumathang') }}" class="btn btn-success m-3">Doanh thu cua tung san pham</a>
    <br>
    <a href="{{ route('thongke.khachhangtieudung') }}" class="btn btn-success m-3">Thói quen tiêu dùng</a>
    <br>
    <a href="{{ route('dashboard') }}" class="btn btn-success m-3">Quay về</a>
</body>
</html>