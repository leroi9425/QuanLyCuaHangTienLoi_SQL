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


    <h1 style="margin: 50px 50px">Thêm loại hàng mới</h1>
    <form action="{{ route('nloaihang.store') }}" method="POST" style="margin: 50px 50px">
        @csrf
        <div class="mb-3">
            <label for="malh" class="form-label">Mã loại hàng</label>
            <input type="text" class="form-control" id="malh" name="malh" required>
        </div>
        <div class="mb-3">
            <label for="tenlh" class="form-label">Tên loại hàng</label>
            <input type="text" class="form-control" id="tenlh" name="tenlh" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>

</body>