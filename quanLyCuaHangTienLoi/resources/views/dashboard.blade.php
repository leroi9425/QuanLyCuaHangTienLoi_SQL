<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('nloaihang.index') }}" class="btn btn-success m-3">Loai Hang</a>
    <br>
    <a href="{{ route('nmathang.index') }}" class="btn btn-success m-3">Mat Hang</a>
    <br>
    <a href="{{ route('thongke.index') }}" class="btn btn-success m-3">Thong Ke</a>
</body>
</html>