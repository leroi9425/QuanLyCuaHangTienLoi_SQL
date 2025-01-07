<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initialscale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-
alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-
GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
crossorigin="anonymous">
<title>Posts</title>
</head>
<body>


    <h1 style="margin: 50px 50px">Thêm mặt hàng mới</h1>
    <form action="{{ route('nmathang.update', $mathang->mamh) }}" method="POST" style="margin: 50px 50px">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="mamh" class="form-label">Mã mặt hàng</label>
            <input type="text" class="form-control" id="mamh" name="mamh" value="{{ $mathang->mamh }}" readonly>
        </div>
        <div class="mb-3">
            <label for="tenmh" class="form-label">Tên mặt hàng</label>
            <input type="text" class="form-control" id="tenmh" name="tenmh" value="{{ $mathang->tenmh }}" required>
        </div>
        <div class="mb-3">
            <label for="malh" class="form-label">Tên loại hàng</label>
            <select class="form-control" id="malh" name="malh" required>
                @foreach($nloaihang as $loaihang)
                    @if($mathang->malh = $loaihang->malh)
                        <option value="{{ $loaihang->malh }}" selected>{{ $loaihang->tenlh }}</option>
                    @else
                        <option value="{{ $loaihang->malh }}">{{ $loaihang->tenlh }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="dongia" class="form-label">Đơn giá</label>
            <input type="text" class="form-control" id="dongia" name="dongia" value="{{ $mathang->dongia }}" required>
        </div>
        <div class="mb-3">
            <label for="soluong" class="form-label">Số lượng</label>
            <input type="text" class="form-control" id="soluong" name="soluong" value="{{ $mathang->soluong }}" required>
        </div>
        <div class="mb-3">
            <label for="gianhap" class="form-label">Giá nhập</label>
            <input type="text" class="form-control" id="gianhap" name="gianhap" value="{{ $mathang->gianhap }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>

</body>