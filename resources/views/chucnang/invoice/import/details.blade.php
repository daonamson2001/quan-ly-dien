@extends('master')

@section('content')
<main class="main position-relative">
    <div class="cotainer">
        <div class="row">
            <div class="col">
                <div class="card">
                    <h3 class="card-header text-center">CHI TIẾT PHIẾU NHẬP KHO</h3>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title">Nhân viên lập phiếu: <span class="font-weight-normal">{{$user->fullname}}</span></h5>
                            <h5 class="card-title">Mã nhập: <span class="font-weight-normal">{{$user->imp_code}}</span></h5>
                        </div>
                        <table class="table table-bordered mb-3">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Vật tư</th>
                                    <th scope="col">NSX</th>
                                    <th scope="col">CL</th>
                                    <th scope="col">SL</th>
                                    <th scope="col">ĐVT</th>
                                    <th scope="col">Đơn giá</th>
                                    <th scope="col">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detail_imports as $key => $item)
                                    <tr>
                                        <th scope="row">{{$key + 1}}</th>
                                        <td>{{$item->sup_name}}</td>
                                        <td>{{$item->pro_name}}</td>
                                        <td>{{$item->qua_name}}</td>
                                        <td>{{$item->di_amount}}</td>
                                        <td>{{$item->unit_name}}</td>
                                        <td>{{number_format($item->di_price)}}</td>
                                        <td>{{number_format($item->di_into_money)}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th scope="row" colspan="7">Tổng giá trị nhập:</th>
                                    <td>{{number_format($user->imp_total)}} VNĐ</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between align-items-center">
                            <h6>Nhập,Ngày lập: <span class="font-weight-normal">{{\Carbon\Carbon::parse($user->imp_date)->format('d/m/Y')}}</span></h6>
                            <div class="mb-3">
                                <a class="btn btn-secondary" href="{{route('import.print', $user->id)}}">Lưu kho</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</main>

<script src="{{ asset('js/import.js') }}"></script>
@endsection