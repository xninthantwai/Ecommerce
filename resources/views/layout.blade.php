<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12">
                <div class="dropdown">
                    {{-- <button type="button" class="btn btn-primary" data-toggle="dropdown">
                        <i class="fa fa-shopping-cart"></i><span class="badge badge-pill badge-danger">   {{ count((array) session('cart'))}}</span>
                    </button> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>