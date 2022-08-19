@extends('master')

@section('content')
<main class="main position-relative">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header h5"><b> Quản Lí Khu Vực</b> </div>
                    <nav class="navbar navbar-light bg-light justify-content-between">
                        <a data-toggle="modal" data-target="#create" class="btn btn-dark text-light"><i class="fas fa-plus pr-1"></i>  Thêm </a>
                        <form action="{{ route('khuvuc.index') }}" method="get" class="form-inline">
                          <input class="form-control mr-sm-2" name="query" type="search" placeholder="Tìm Kiếm" aria-label="Search">
                          <button class="btn btn-outline-success my-2 my-sm-0 " ><i class="fas fa-search"></i></button>
                        </form>
                      </nav>
                    <div class="card-body">
                        <table class="table table-bordered  text-center" >
                            <thead class="thead-dark">
                                <tr>
                                    <th width="15%" >ID Khu Vực</th>
                                    <th width="55%" >Tên Khu Vực</th>
                                    <th width="15%">Sửa</th>
                                    <th width="15%" >Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($datas) > 0)
                                    @foreach ( $datas as $data )
                                        <tr>
                                            <th width="15%" scope="row">{{$data->id}}</th>
                                            <td width="55%" scope="row">{{$data->dis_name}}</td>
                                            <td width = "5%"> <button value="{{$data->id}}" type="button" class="btn btn-outline-warning btn-edit"
                                                data-toggle="modal" data-target="#edit" > <i class="fas fa-pen"></i> </button> </td>
                            
                                            <td width = "5%"><button value="{{$data->id}}" type="button" 
                                                class="btn btn-outline-danger btn-delete"> <i class="fas fa-trash-alt"></i> </button> </td>
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

@include('danhmuc.khuvuc.update')
@include('danhmuc.khuvuc.create')
<script src="{{ asset('js/khuvuc.js') }}"></script>
{{-- 
<script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
{{--  --}}
{{-- <script src="{{ asset('js/user.js') }}"></script> --}}
@endsection