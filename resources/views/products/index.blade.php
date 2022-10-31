<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container justify-content-between">
            <div class="d-flex">
                <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="#">
                    <span>SHOE</span>
                </a>
            </div>
            <ul class="navbar-nav flex-row">
                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link active" href="{{ route('products.index') }}">
                        สินค้า
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="{{ route('orders.index') }}">
                        ตะกร้า
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="text-center">
            <a href="{{ route('products.create') }}" class="btn btn-success">เพิ่มสินค้า</a>
        </div>
        <div class="row">
            @foreach ($productsView as $item)
            <div class="card m-3" style="width: 18rem;">
                <img src="{{ asset('images/'. $item->image) }}" height="200" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title">{{ $item->name }}</h5>
                  <p class="card-text">฿{{ $item->price }}</p>
                  <form action="{{ route('orders.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                    <button type="submit" class="btn btn-primary">สั่งสินค้า</button>
                  </form>
                </div>
              </div>
            @endforeach
        </div>
    </div>
</body>
</html>