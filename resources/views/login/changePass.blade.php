@extends('master')

@section('content')
<main class="main position-relative">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header h5"><b>Đổi Mật Khẩu</b> </div>
                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                    @foreach ($errors->all() as $err)
                                        {{ $err }}
                                    @endforeach
                            </div>
                         @endif

                        @if (session('alert_error'))
                            <div class="alert alert-danger">
                                {{session('alert_error')}}
                            </div>
                        @elseif(session('alert_success'))
                            <div class="alert alert-success">
                                {{session('alert_success')}}
                            </div>
                        @endif

                        <form action="{{route('checkChangePass')}}" method="post">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="form-group row">
                                <label for="password_old" class="col-md-4 col-form-label text-md-right">Mật Khẩu Cũ</label>
                                <div class="col-md-6">
                                    <input type="password" id="password_old" class="form-control" name="password_old" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_new" class="col-md-4 col-form-label text-md-right">Mật Khẩu Mới</label>
                                <div class="col-md-6">
                                    <input type="password" id="password_new" class="form-control" name="password_new" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_confirm" class="col-md-4 col-form-label text-md-right">Nhập Lại Mật Khẩu</label>
                                <div class="col-md-6">
                                    <input type="password" id="password_confirm" class="form-control" name="password_confirm" required>
                                </div>
                            </div>

                            <div class="col-md-12 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    Xác Nhận
                                </button>
                                <a href="{{route('home')}}" class="btn btn-primary ml-4">
                                    Trở Về
                                </a>
                            </div>
                        </form>   
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main>
@endsection