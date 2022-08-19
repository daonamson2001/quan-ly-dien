@extends('master')

@section('content')
<main class="main position-relative">
    <div class="cotainer">
        <div class="row">
            <div class="col">
                @error('msg')
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{$message}}
                    </div>
                @enderror
                <div class="card">
                    <h5 class="card-header text-center">QUẢN LÝ XUẤT KHO</h5>
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <form action="{{route('export.index')}}" method="get" class="d-flex justify-content-between align-items-center mb-3">
                                <label class="text-nowrap mr-2" for="startDate">Từ ngày:</label>
                                <input type="date" name="start_date" value="{{$start_date}}" class="form-control mr-2" id="startDate">
                                
                                <label class="text-nowrap mr-2" for="endDate">Tới ngày:</label>
                                <input type="date" name="end_date" value="{{$end_date}}" class="form-control mr-2" id="endDate">
                                
                                <button class="btn btn-secondary">Tìm kiếm</button>
                            </form>
                        </div>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Người dùng</th>
                                    <th scope="col">Mã phiếu</th>
                                    <th scope="col">Ngày</th>
                                    <th scope="col">Tổng tiền</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($export as $key => $item)
                                    <tr>
                                        <th scope="row">{{$key + 1}}</th>
                                        <td>{{$item->fullname}}</td>
                                        <td>
                                            {{$item->exp_code}}
                                        </td>
                                        <td>{{\Carbon\Carbon::parse($item->exp_date)->format('d/m/Y')}}</td>
                                        <td>{{number_format($item->exp_total)}}</td>
                                        <td>
                                            <a class="btn btn-dark" href="{{route('export.show', $item->id)}}">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="">
                            {{ $export->links() }}
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</main>

<script src="{{ asset('js/import.js') }}"></script>
@endsection