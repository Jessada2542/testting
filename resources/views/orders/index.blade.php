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
                    <a class="nav-link" href="{{ route('products.index') }}">
                        สินค้า
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link active" href="{{ route('orders.index') }}">
                        ตะกร้า
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="text-center">
            <h2>ตะกร้าสินค้า</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-stried table-bordered">
                    <thead>
                        <tr>
                            <th>ชื่อสินค้า</th>
                            <th>ราคา</th>
                            <th>จำนวน</th>
                            <th width="250px">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($order)
                        @foreach ($order->order_details as $item)
                        <tr>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->amount }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-2">
                                        <form action="{{ route('orders.update', $order->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="value" value="decrease">
                                            <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                            <button type="submit" class="btn btn-outline-danger">-</button>
                                        </form>
                                    </div>
                                    <div class="col-2">
                                        <form action="{{ route('orders.update', $order->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="value" value="increase">
                                            <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                            <button type="submit" class="btn btn-outline-success">+</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="2">ราคารวม</td>
                            <td>{{ $order->total }}</td>
                            <td>
                                <form action="{{ route('orders.update', $order->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="value" value="checkout">
                                    <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                    <button type="submit" class="btn btn-outline-primary">Checkout</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>