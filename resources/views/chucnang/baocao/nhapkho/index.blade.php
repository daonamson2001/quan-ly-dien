@extends('master')

@section('content')
<main class="main position-relative">
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header h5 notifi">
                        <b>Báo Cáo Nhập Kho Theo
                            <form action="{{route('baocao.nhap.post')}}" method="POST" class=" d-inline">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <select class="col-md-2 ml-3 d-inline form-control"  name="notifi_select" id="notifi_select"  required> 
                                    <option name="notifi_select" value="1">Tên Vật Tư</option>
                                    <option name="notifi_select" value="2">Mã Nhập Kho</option>
                                    <option name="notifi_select" value="3">Ngày Nhập Kho</option>
                                    <option name="notifi_select" value="4">Nhà Sản Xuất</option>
                                    <option name="notifi_select" value="5">Chất Lượng</option>
                                </select>
                                <button type="submit" id="submit" class="btn btn-dark m-3 my-sm-0 px-4" id="viewNotifi">Xem</button>
                            </form>
                        </b>         
                    </div>
                    @yield('notifi_select')
                    <div class="card-body">
                        <table class="table table-bordered  text-center" >
                            <thead class="thead-dark">
                                <tr>
                                    <th width="5%" >STT </th>
                                    <th width="15%" >Tên Vật Tư</th>
                                    <th width="10%" >NSX</th>
                                    <th width="10%" >Chất Lượng</th>
                                    <th width="10%" >Mã Nhập</th>
                                    <th width="10%" >Ngày Nhập</th>     
                                    <th width="10%" >Số Lượng</th>       
                                    <th width="15%" >Giá</th>
                                    <th width="15%" >Thành Tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @yield('tbody')
                            </tbody>
                            
                        </table>
                    </div>
                </div>   
            </div>
        </div>
    </div>
</main>

<script>

    $(document).ready(function(){
        let today = new Date().toISOString().substr(0, 10);
        document.querySelector("#from_date").value = today;
        document.querySelector("#to_date").value = today;
        // $(document).on('click', '#submit', function(){
        //     $('.notifi').hide();
        // })
        // $('#submit').click();
        // $(document).on('click', '#viewNotifi', function(){
        //     var from_date = $('#from_date').val();
        //     var to_date = $('#to_date').val();
        //     if(to_date > today){
        //         alert('abc');
        //         window.stop();
        //     }

        // });
    })
</script>
@endsection