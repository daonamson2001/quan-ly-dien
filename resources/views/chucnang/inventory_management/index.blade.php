@extends('master')

@section('content')
<main class="main position-relative">
    <div class="cotainer">
        <div class="row">
            <div class="col">
                <div class="card">
                    <h5 class="card-header text-center">QUẢN LÝ KHO</h5>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên vật tư</th>
                                    <th scope="col">Tồn kho</th>
                                    <th scope="col">Đơn vị</th>
                                    <th scope="col">SL Đã bán</th>
                                    <th scope="col">Tổng đã bán</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $item)
                                    <tr>
                                        <th scope="row">{{$key + 1}}</th>
                                        <td>{{$item->sup_name}}</td>
                                        <td>{{$item->sup_amount}}</td>
                                        <td>{{$item->unit_name}}</td>
                                        <td>{{$item->quantity_sold ? $item->quantity_sold : 0}}</td>
                                        <td>{{number_format($item->total_sold)}}</td>

                                        {{-- <td>{{\Carbon\Carbon::parse($item->exp_date)->format('d/m/Y')}}</td> --}}
                                        {{-- <td>{{number_format($item->exp_total)}}</td> --}}
                                        <td>
                                            <a class="btn btn-dark" href="#{{$item->id}}">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="{{ asset('js/import.js') }}"></script>
@endsection