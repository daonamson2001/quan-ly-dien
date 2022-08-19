@extends('chucnang.baocao.nhapkho.index')

@section('notifi_select')
    <div class="card-header h5">
        <b>Báo Cáo Theo Mã Nhập Kho
            <form action="{{route('baocao.nhap.postImportCode')}}" method="POST"  class="d-inline">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <select class="col-md-2 ml-3 d-inline form-control"  name="imp_code" id="imp_code"  required> 
                    @foreach ($imp_code as $imp_code)
                        <option name="imp_code" value="{{$imp_code->imp_code}}">{{$imp_code->imp_code}}</option>
                    @endforeach 
                </select>
                <button id="view_date" class="btn btn-dark m-3 my-sm-0 px-4" id="viewNotifi">Xem</button>
            </form>
        </b>         
    </div>
@endsection
@section('tbody')
    @php
        $index = 1;
    @endphp
    @if (count($datas))
        @foreach ( $datas as $data )
            <tr>
                <th width="5%" scope="row">{{$index}}</th>
                <td width="15%" scope="row">{{$data->detailImport_supplies->sup_name}}</td>
                <td width="10%" scope="row">{{$data->detailImport_producer->pro_name}}</td>
                <td width="10%" scope="row">{{$data->detailImport_quality->qua_name}}</td>
                <td width="10%" scope="row">{{$data->detailImport_Import->imp_code}}</td>
                <td width="10%" ><?php echo date("d-m-Y", strtotime($data->detailImport_Import->imp_date)) ?></td> 
                <td width="10%" >{{$data->di_amount}}</td> 
                <td width="15%" >{{$data->di_price}}</td> 
                <td width="15%" >{{$data->di_into_money}}</td> 
            </tr>
            @php
                $index++;
            @endphp

        @endforeach
    @else
        <tr><td colspan="10">Không có kết quả hợp lệ...</td></tr>
    @endif    
                  
<script>
    $(document).ready(function(){
        $('.notifi').hide();
    });
</script>
@endsection    

