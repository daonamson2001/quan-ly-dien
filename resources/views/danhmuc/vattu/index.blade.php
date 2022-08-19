@extends('master')

@section('content')
<main class="main position-relative">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header h5"><b>Quản Lí Vật Tư</b> </div>
                    <nav class="navbar navbar-light bg-light justify-content-between">
                        <a data-toggle="modal" data-target="#create" class="btn btn-dark text-light"><i class="fas fa-plus pr-1"></i>  Thêm </a>
                        <form action="{{ route('vattu.index') }}" method="get" class="form-inline">
                          <input class="form-control mr-sm-2" name="query" type="search" placeholder="Tìm Kiếm" aria-label="Search">
                          <button class="btn btn-outline-success my-2 my-sm-0 " ><i class="fas fa-search"></i></button>
                        </form>
                      </nav>
                    <div class="card-body">
                        <table class="table table-bordered  text-center" >
                            <thead class="thead-dark">
                                <tr>
                                    <th width="10%" >ID </th>
                                    <th width="25%" >Tên Vật Tư</th>
                                    <th width="10%" >SL</th>
                                    <th width="10%" >Đơn Vị Tính</th>     
                                    <th width="25%" >Tổng Tiền</th>       
                                    <th width="10%" >Sửa</th>
                                    <th width="10%" >Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($datas) > 0)
                                    @foreach ( $datas as $data )
                                        <tr>
                                            <th width="10%" scope="row">{{$data->id}}</th>
                                            <td width="25%" scope="row">{{$data->sup_name}}</td>
                                            <td width="10%" scope="row">{{$data->sup_amount}}</td>
                                            @if($data->unit->unit_simplify)
                                                <td width="10%" scope="row">{{$data->unit->unit_simplify}}</td>
                                            @else
                                                <td width="10%" scope="row">{{$data->unit->unit_name}}</td>
                                            @endif
                                            <td width="25%" >{{$data->sup_total}}</td> 
                                            <td width = "10%"> <button value="{{$data->id}}" type="button" class="btn btn-outline-warning btn-edit"
                                                data-toggle="modal" data-target="#edit" > <i class="fas fa-pen"></i> </button> </td>
                            
                                        <td width = "10%"><button value="{{$data->id}}" type="button" 
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

@include('danhmuc.vattu.update')
@include('danhmuc.vattu.create')
<script src="{{ asset('js/vattu.js') }}"></script>
{{-- 
<script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
{{--  --}}
{{-- <script src="{{ asset('js/user.js') }}"></script> --}}
@endsection