

@extends('master')

@section('content')
<main class="main position-relative">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header h5"><b>Thông Tin Công Ty</b> </div>
                    <div class="card-body">
                    @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                    @foreach ($errors->all() as $err)
                                       <li>{{ $err }}</li> 
                                    @endforeach
                            </div>
                        @endif
<!-- 
                        @if (session('infor_company'))
                            <div class="alert alert-danger">
                                {{session('infor_company')}}
                            </div>
                        @endif  -->
                        <form action="{{route('thongtin.update' , '1')}}" method="post">
                            @method('put')

                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="form-group row">
                                <label for="text_old" class="col-md-4 col-form-label text-md-right">Tên Công Ty</label>
                                <div class="col-md-6">
                                    <input type="text" id="inf_name" class="form-control" name="inf_name" placeholder="Tên Công Ty" 
                                    value="{{ $infor_company->inf_name }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text_old" class="col-md-4 col-form-label text-md-right">Địa Chỉ</label>
                                <div class="col-md-6">
                                    <input type="text" id="inf_address" class="form-control" name="inf_address" placeholder="Địa Chỉ" 
                                    value="{{ $infor_company->inf_address }}" required>                            
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text_old" class="col-md-4 col-form-label text-md-right">Số điện thoại</label>
                                <div class="col-md-6">
                                    <input type="text" id="inf_phone" class="form-control" name="inf_phone" placeholder="Số điện thoại" 
                                    value="{{ $infor_company->inf_phone }}" required>                             
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text_old" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="email" id="inf_email" class="form-control" name="inf_email" placeholder="Email" 
                                    value="{{ $infor_company->inf_email }}" required>                            
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text_old" class="col-md-4 col-form-label text-md-right">Website</label>
                                <div class="col-md-6">
                                    <input type="text" id="inf_website" class="form-control" name="inf_website" placeholder="Website" 
                                    value="{{ $infor_company->inf_website }}" required>                              
                                </div>
                            </div>

                            <div class="col-md-12 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    Xác Nhận
                                </button>
                                <a href="{{route('thongtin.index' )}}" class="btn btn-primary ml-4">
                                    Hủy
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


