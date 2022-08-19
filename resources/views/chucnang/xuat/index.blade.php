@extends('master')

@section('content')
    <main class="main position-relative">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header h5">
                            <b>Xuất Kho </b>
                            {{-- @if (session('dpm_id') === 1 || session('dpm_id') === 2 || session('dpm_id') === 3)
                            <div class="float-right">
                                <a href="{{route('vattu.index')}}" class="btn btn-dark my-2 my-sm-0 " ><i class="fas fa-plus pr-1"></i> Thêm Vật Tư</a>
                            </div>
                        @endif --}}
                        </div>

                        <form action="{{ route('xuat.print') }}" method="POST" id="myForm">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="card-body">
                                <table class="table table-bordered-bottom  text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label text-md-right">Mã </label>
                                                    <input type="text" id="exp_code" class="col-md-6 form-control"
                                                        name="exp_code" value="{{ session('id') }}XK<?php $x = count($exps) + 1;
                                                        echo date('dm') . $x; ?>"
                                                        readonly required>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="user_fullname"
                                                        class="col-md-3 col-form-label text-md-right">Nhân Viên</label>
                                                    <input type="hidden" id="user_id" name="user_id"
                                                        value="{{ session('id') }}">
                                                    <input type="text" id="user_fullname" class="col-md-6  form-control"
                                                        name="user_fullname" value="{{ session('fullname') }}" readonly
                                                        required>
                                                </div>

                                            </td>

                                            <td width="50%">
                                                {{-- <div class="form-group row select-producer">
                                                <label for="pro_name" class="col-md-3 col-form-label text-md-right">Nhà Sản Xuất</label>
                                                <select class="col-md-6 form-control"  name="pro_name" id="pro_name" class="form-control"  required>
                                                    <option value="">-- Chọn --</option>
                                                    @foreach ($pros as $pro)
                                                    <option name="pro_name" value="{{$pro->pro_name}}">{{$pro->pro_name}}</option>
                                                    @endforeach 
                                                </select>
                                            </div> --}}
                                                @if (session('dpm_id') === 1 || session('dpm_id') === 2 || session('dpm_id') === 3)
                                                    <div class="form-group row">
                                                        <label for="exp_date"
                                                            class="col-md-3 col-form-label text-md-right">Ngày Lập
                                                            Phiếu</label>
                                                        <input type="date" id="exp_date" class="col-md-6  form-control"
                                                            name="exp_date" required>
                                                    </div>
                                                @else
                                                    <div class="form-group row">
                                                        <label for="exp_date"
                                                            class="col-md-3 col-form-label text-md-right">Ngày Lập
                                                            Phiếu</label>
                                                        <input type="date" id="exp_date" class="col-md-6  form-control"
                                                            name="exp_date" readonly required>
                                                    </div>
                                                @endif

                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="2">
                                                <div class=" row">
                                                    <select class="col-md-2 form-control" name="sup_id" id="sup_id"
                                                        required>
                                                        <option value="">-- Mã Vật Tư --</option>
                                                        @foreach ($sups as $sup)
                                                            <option name="sup_id" value="{{ $sup->id }}">
                                                                {{ $sup->id }}: {{ $sup->sup_name }}</option>
                                                        @endforeach
                                                    </select>

                                                    <label id="sup_name" class="col-md-2 form-control text-left mx-3">Tên
                                                        Vật Tư</label>

                                                    <label id="unit_name"
                                                        class="col-md-2 form-control text-left">ĐVT</label>
                                                    {{-- <select class="col-md-2 form-control"  name="unit_id" id="unit_id"  required>
                                                    <option value="">-- Đơn Vị Tính --</option>
                                                    @foreach ($units as $unit)
                                                        <option name="unit_id" value="{{$unit->id}}"></option>
                                                    @endforeach 
                                                </select> --}}

                                                    {{-- <select class="col-md-2 ml-3 form-control"  name="qua_name" id="qua_name"  required> 
                                                    <option value="">-- Chất Lượng --</option>
                                                    @foreach ($quas as $qua)
                                                        <option name="qua_name" value="{{$qua->qua_name}}">{{$qua->qua_name}}</option>
                                                    @endforeach 
                                                </select> --}}

                                                    <input type="number" id="sup_amout" class="col-2 ml-3 form-control"
                                                        name="sup_amout" placeholder="Số Lượng" min="1" required>
                                                    <input type="number" class="col-2 mx-3 form-control" name="de_price"
                                                        id="de_price" placeholder="Giá" min="1" required>
                                                    <a class="btn btn-dark text-light import_add"><i
                                                            class="fas fa-plus pr-1"></i> Thêm </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-header h5 border-top">
                                <b>Danh Sách Vật Tư</b>
                                <div class="float-right">
                                    {{-- <button id="btn-save" class="btn btn-primary my-2 my-sm-0 " ><i class="fas fa-save"></i> Lưu </button> --}}
                                    <button formtarget="_blank" type="submit" id="btn-print"
                                        class="btn btn-primary my-2 my-sm-0 "><i class="fas fa-save"></i> Lưu </button>
                                    <button id="btn-reset" class="btn btn-outline-danger my-2 my-sm-0"><i
                                            class="fas fa-trash-alt"></i> Reset</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered text-center" id="myTable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th width="5%">
                                                STT
                                            </th>
                                            <th width="20%">
                                                Tên Vật Tư
                                            </th>
                                            {{-- <th width="13%">
                                           NSX
                                        </th> --}}
                                            {{-- <th width="10%">
                                            Chất Lượng
                                        </th> --}}
                                            <th width="10%">
                                                Số Lượng
                                            </th>
                                            <th width="15%">
                                                ĐVT
                                            </th>
                                            <th width="20%">
                                                Đơn Giá
                                            </th>
                                            <th width="20%">
                                                Thành Tiền
                                            </th>
                                            <th width="10%">
                                                Xóa
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <table id="TableTotal" class="table table-bordered text-center" style="margin-top: -17px">
                                    <tr>
                                        <td width="70%">
                                            Tổng Tiền
                                        </td>
                                        <td id="Total" width="20%">
                                            0
                                        </td>
                                        <td width="10%">
                                            VND
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                        {{-- <a id="btn-test ">abc</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/export.js') }}"></script>
@endsection
