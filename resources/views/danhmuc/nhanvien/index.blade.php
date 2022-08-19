@extends('master')

@section('content')
<main class="main position-relative">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header h5"><b>Quản Lý Nhân Viên</b> </div>
                    <nav class="navbar navbar-light bg-light justify-content-between">
                        <a href="{{ route('dangky.index') }}" class="btn btn-dark text-light"><i class="fas fa-plus pr-1"></i>  Thêm </a>
                        <form action="{{ route('nhanvien.index') }}" method="get" class="form-inline">
                          <input class="form-control mr-sm-2" name="query" type="search" placeholder="Tìm Kiếm" aria-label="Search">
                          <button class="btn btn-outline-success my-2 my-sm-0 " ><i class="fas fa-search"></i></button>
                        </form>
                      </nav>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead class="thead-dark ">
                                <tr>
                                <th width = "5%" >ID</th>
                                <th width = "13%" >Họ Và Tên</th>
                                <th width = "7%" >GT</th>
                                <th width = "20%" >Địa Chỉ </th>
                                <th width = "10%" >Số Điện Thoại </th>
                                <th width = "10%" >Chức Vụ </th>
                                <th width = "10%" >Username</th>
                                <th width = "5%">Xem </th>
                                <th width = "5%">Sửa</th>
                                <th width = "5%" >Xóa</th>
                                </tr>
                            </thead> 
                            <tbody>
                                @if (count($datas) > 0)
                                    @foreach ( $datas as $data )
                                        <tr>
                                            <th width = "5%" scope="row">{{$data->id}}</th>
                                            <td width = "13%" scope="row">{{$data->fullname}}</td>
                                            <td width = "7%" scope="row">{{$data->gender}}</td>
                                            <td width = "20%" scope="row">{{$data->address}}</td>
                                            <td width = "10%" scope="row">{{$data->phone}}</td>
                                            <td width = "10%" scope="row">{{$data->deparment->dpm_name}}</td>
                                            <td width = "10%" scope="row">{{$data->username}}</td>
                                            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                                            <td width = "5%"> <button  value="{{$data->id}}" type="button" class="btn btn-outline-primary btn-show" 
                                                data-toggle="modal" data-target="#viewuser" > <i class="fas fa-eye" ></i> </button> </td>
                                            
                                            <td width = "5%"><button value="{{$data->id}}" type="button" class="btn btn-outline-warning btn-edit"
                                                data-toggle="modal" data-target="#updateuser" > <i class="fas fa-pen"></i> </button> </td>
                                            
                                            <td width = "5%"><button value="{{$data->id}}" type="button" class="btn btn-outline-danger btn-delete"> <i class="fas fa-trash-alt"></i> </button> </td> 
                                        </tr>
                                    @endforeach
                                @else
                                    <tr><td colspan="10">Không có kết quả hợp lệ...</td></tr>
                                @endif

                                
                            </tbody>
                        </table>
                        {!! $datas->render() !!}
                    </div>  
                </div>
            </div>
        </div>
    </div>
</main>


@include('danhmuc.nhanvien.viewuser')
@include('danhmuc.nhanvien.updateuser')
<script src="{{ asset('js/nhanvien.js') }}"></script>
{{-- 
<script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
{{--  --}}
{{-- <script src="{{ asset('js/user.js') }}"></script> --}}
@endsection