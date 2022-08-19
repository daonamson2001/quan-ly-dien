@extends('chucnang.baocao.xuatkho.index')

@section('notifi_select')
    <div class="card-header h5">
        <b>Báo Cáo Theo Mã Xuất Kho
            <form action="{{route('baocao.xuat.postExportCode')}}" method="POST"  class="d-inline">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <select class="col-md-2 ml-3 d-inline form-control"  name="exp_code" id="exp_code"  required> 
                    @foreach ($exp_code as $exp_code)
                        <option name="exp_code" value="{{$exp_code->exp_code}}">{{$exp_code->exp_code}}</option>
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
                <td width="20%" scope="row">{{$data->detailExport_supplies->sup_name}}</td>
                <td width="10%" scope="row">{{$data->detailexport_export->exp_code}}</td>
                <td width="15%" ><?php echo date("d-m-Y", strtotime($data->detailexport_export->exp_date)) ?></td> 
                <td width="10%" >{{$data->de_amount}}</td> 
                <td width="20%" >{{$data->de_price}}</td> 
                <td width="20%" >{{$data->de_into_money}}</td> 
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

