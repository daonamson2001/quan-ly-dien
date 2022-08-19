{{-- @if (!isset($error))
@else
 {{$error}}
@endif

@if (isset($nameuser))
    {{"Tên Nhân Viên Là: ". $nameuser}}
@endif
<form action="{{ route('checklogin') }}" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="text" name="username">
    <input type="password" name="password" >
    <input type="submit" value="submit">
</form> --}}

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="Favicon.png">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    {{-- Font-Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Laravel</title>

    <style>
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);


        body {
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        }

        .navbar-laravel {
            box-shadow: 0 2px 4px rgba(0, 0, 0, .04);
        }

        .navbar-brand,
        .nav-link,
        .my-form,
        .login-form {
            font-family: Raleway, sans-serif;
        }

        .my-form {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .my-form .row {
            margin-left: 0;
            margin-right: 0;
        }

        .login-form {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .login-form .row {
            margin-left: 0;
            margin-right: 0;
        }

    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <a href="/"><img src="{{ asset('img/logo.png') }}" alt="" class="logo__img"></a>
            {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> --}}

            {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Đăng Nhập</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Đăng Ký</a>
                </li>
            </ul>

        </div> --}}
        </div>
    </nav>

    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-header">
                            Quên Mật Khẩu</div>
                        <div class="card-body">

                            @if (session('alert_error'))
                                <div class="alert alert-danger">
                                    {{ session('alert_error') }}
                                </div>
                            @elseif (session('alert_success'))
                                <div class="alert alert-success">
                                    {{ session('alert_success') }}
                                </div>
                            @endif

                            <form action="" method="post">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Email:</label>
                                    <div class="col-md-5">
                                        <input type="text" id="email" class="form-control" name="email" required
                                            autofocus>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary mt-2">
                                        Lấy Mật Khẩu
                                    </button>
                                    <a href="" class="btn btn-link mt-2">
                                        Thử Cách Khác?
                                    </a>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </main>







</body>

</html>
