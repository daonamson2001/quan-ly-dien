@extends('master')

@section('content')
    <main class="main position-relative">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header h5"><b>Tạo Tài Khoản</b> </div>
                        <div class="card-body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $err)
                                        {{ $err }}
                                        <br>
                                    @endforeach
                                </div>
                            @endif

                            @if (session('alert_error'))
                                <div class="alert alert-danger">
                                    {{ session('alert_error') }}
                                </div>
                            @elseif(session('alert_success'))
                                <div class="alert alert-success">
                                    {{ session('alert_success') }}
                                </div>
                            @endif
                            {{-- {{route('checkRegistration')}} --}}
                            <form action="{{ route('dangky.store') }}" method="post">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right"></label>
                                    <div class="col-md-6">
                                        <em class="text-danger small text-justify">Những mục đánh dấu (*) bắt buộc nhập</em>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="fullname" class="col-md-4 col-form-label text-md-right">Họ và Tên
                                        (*)</label>
                                    <div class="col-md-6">
                                        <input type="text" id="fullname" class="form-control" name="fullname"
                                            placeholder="Họ và Tên" value="{{ old('fullname') }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="gender" class="col-md-4 col-form-label text-md-right">Giới tính (*)</label>
                                    <div class="col-md-6">
                                        <!-- <input type="text" id="gender" class="form-control" name="gender" required> -->
                                        <select name="gender" id="gender" class="form-control" name="gender">
                                            @if (old('gender') == 'Nữ')
                                                <option selected name="gender" value='Nữ'>FeMale</option>
                                                <option name="gender" value='Nam'>Male</option>
                                            @elseif(old('gender') == 'Nam')
                                                <option selected name="gender" value='Nam'>Male</option>
                                                <option name="gender" value='Nữ'>Female</option>
                                            @else
                                                <option name="gender" value='Nam'>Male</option>
                                                <option name="gender" value='Nữ'>Female</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="birth" class="col-md-4 col-form-label text-md-right">Ngày Sinh (*)</label>
                                    <div class="col-md-6">
                                        <input type="date" id="birth" class="form-control" name="birth" min="1940-01-01"
                                            value="{{ old('birth') }}" required>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">Địa Chỉ</label>
                                    <div class="col-md-6">
                                        <input type="text" id="address" class="form-control" name="address"
                                            placeholder="Địa Chỉ" value="{{ old('address') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cmnd" class="col-md-4 col-form-label text-md-right">Số CMND</label>
                                    <div class="col-md-6">
                                        <input type="text" id="cmnd" class="form-control" name="cmnd"
                                            placeholder="Số CMND" value="{{ old('cmnd') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Số Điện Thoại
                                        (*)</label>
                                    <div class="col-md-6">
                                        <input type="text" id="phone_number" class="form-control" name="phone_number"
                                            placeholder="Số Điện Thoại" value="{{ old('phone_number') }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                    <div class="col-md-6">
                                        <input type="email" id="email" class="form-control" name="email"
                                            placeholder="Email" value="{{ old('email') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="date_joining" class="col-md-4 col-form-label text-md-right">Ngày Vào Làm
                                        (*)</label>
                                    <div class="col-md-6">
                                        <input type="date" id="date_joining" class="form-control" name="date_joining"
                                            min="1970-01-01" value="{{ old('date_joining') }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="position" class="col-md-4 col-form-label text-md-right">Chức Vụ (*)</label>
                                    <div class="col-md-6">
                                        <!-- <input type="text" id="position" class="form-control" name="position" required> -->
                                        <select name="position" id="position" class="form-control">
                                            <!-- @if (old('position') == 'nhanvien')
    <option  selected value="nhanvien">Nhân Viên</option>
                                                                <option  value="quanli">Quản Lí</option>
                                                                <option  value="lanhdao">Thủ Kho</option>
                                                                <option  value="admin">Admin</option>
@elseif(old('position') == 'quanli')
    <option  selected value="quanli">Quản Lí</option>
                                                                <option  value="nhanvien">Nhânv Viên</option>
                                                                <option  value="lanhdao">Thủ Kho</option>
                                                                <option  value="admin">Admin</option>
@elseif(old('position') == 'lanhdao')
    <option  selected value="lanhdao">Thủ Kho</option>
                                                                <option  value="quanli">Quản Lí</option>
                                                                <option  value="nhanvien">Nhân Viên</option>
                                                                <option  value="admin">Admin</option>
@elseif(old('position') == 'admin')
    <option  selected value="admin">Admin</option>
                                                                <option  value="quanli">Quản Lí</option>
                                                                <option  value="lanhdao">Thủ Kho</option>
                                                                <option  value="nhanvien">Nhân Viên</option>
@else
    <option  selected value="admin">Admin</option>
                                                                <option  value="quanli">Quản Lí</option>
                                                                <option  value="lanhdao">Thủ Kho</option>
                                                                <option  value="nhanvien">Nhân Viên</option>
    @endif -->
                                            @switch(old('position'))
                                                @case('nhanvien')
                                                    <option selected value="nhanvien">Nhân Viên</option>
                                                    <option value="quanli">Quản Lí</option>
                                                    <option value="lanhdao">Thủ Kho</option>
                                                    <option value="admin">Admin</option>
                                                @break

                                                @case('quanli')
                                                    <option selected value="quanli">Quản Lí</option>
                                                    <option value="nhanvien">Nhânv Viên</option>
                                                    <option value="lanhdao">Thủ Kho</option>
                                                    <option value="admin">Admin</option>
                                                @break

                                                @case('lanhdao')
                                                    <option selected value="lanhdao">Thủ Kho</option>
                                                    <option value="quanli">Quản Lí</option>
                                                    <option value="nhanvien">Nhân Viên</option>
                                                    <option value="admin">Admin</option>
                                                @break

                                                @case('admin')
                                                    <option selected value="admin">Admin</option>
                                                    <option value="lanhdao">Thủ Kho</option>
                                                    <option value="quanli">Quản Lí</option>
                                                    <option value="nhanvien">Nhân Viên</option>

                                                    @default
                                                        <option selected value="admin">Admin</option>
                                                        <option value="lanhdao">Thủ Kho</option>
                                                        <option value="quanli">Quản Lí</option>
                                                        <option value="nhanvien">Nhân Viên</option>
                                                @endswitch
                                            </select>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="form-group row">
                                        <label for="username" class="col-md-4 col-form-label text-md-right">Username (*)</label>
                                        <div class="col-md-6">
                                            <input type="text" id="username" class="form-control" name="username"
                                                placeholder="Username" value="{{ old('username') }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Mật Khẩu (*)</label>
                                        <div class="col-md-6">
                                            <input type="password" id="password" class="form-control" name="password"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password_confirm" class="col-md-4 col-form-label text-md-right">
                                            Nhập Lại Mật Khẩu (*)
                                        </label>
                                        <div class="col-md-6">
                                            <input type="password" id="password_confirm" class="form-control"
                                                name="password_confirm" required>
                                        </div>
                                    </div>


                                    <div class="col-md-12 offset-md-5">
                                        <button type="submit" class="btn btn-primary">
                                            Đăng Ký
                                        </button>
                                        <a href="{{ route('home') }}" class="btn btn-primary ml-4">
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
