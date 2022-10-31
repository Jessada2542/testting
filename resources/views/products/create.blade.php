<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="text-center">
            <h2>เพิ่มสินค้า</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" name="image">
                        @error('image')
                        <div class="alert alert-warning" role="alert">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name">
                        @error('name')
                        <div class="alert alert-warning" role="alert">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" name="price">
                        @error('price')
                        <div class="alert alert-warning" role="alert">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>  
                      <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select" aria-label="Default select example" name="category">
                            <option value="1">รองเท้า</option>
                            <option value="2">เสื้อผ้า</option>
                          </select>
                        @error('category')
                        <div class="alert alert-warning" role="alert">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <a href="{{ route('products.index') }}" class="btn btn-danger">BACK</a>
                      <button type="submit" class="btn btn-success float-end">ADD</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>