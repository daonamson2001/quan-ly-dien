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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Đăng Nhập</title>

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
        <center>
            <div>
                <img src="{{ asset('img/logo1.png') }}" alt="Trụ sở Gia Lâm" style="width: 600px; height: auto">
            </div>
        </center>
        <br />
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <center>
                            <div class="card-header">
                                <h3>Đăng Nhập</h3>
                            </div>
                        </center>
                        <div class="card-body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $err)
                                        {{ $err }}
                                    @endforeach
                                </div>
                            @endif

                            @if (session('alert'))
                                <div class="alert alert-danger">
                                    {{ session('alert') }}
                                </div>
                            @endif

                            <form action="{{ route('checklogin') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="username"
                                        class="col-md-4 col-form-label text-md-right">Username:</label>
                                    <div class="col-md-6">
                                        <input type="text" id="username" class="form-control" name="username" required
                                            autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Mật Khẩu</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password"
                                            required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Ghi Nhớ Đăng Nhập
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Đăng Nhập
                                    </button>
                                    <a href="{{ route('forgetpass') }}" class="btn btn-link">
                                        Quên Mật Khẩu?
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>







</body>

</html>
