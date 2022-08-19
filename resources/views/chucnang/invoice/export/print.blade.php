<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Phiếu nhập kho</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif, font-size: 10px;
        }

    </style>
</head>

<body>
    <div>
        <table>
            <thead>
                <tr>
                    <th width="200px">
                        TỔNG CÔNG TY E-EW <br> ĐÀO NAM SƠN
                        <br>
                        Đơn vị: Hà Nội
                    </th>
                    <th width="300px">
                        <center>PHIẾU NHẬP KHO</center>
                        <center>Ngày lập phiếu: {{\Carbon\Carbon::parse($data['info']['exp_date'])->format('d/m/Y')}}</center>
                    </th>
                    <th width="50px">
                        <center>Mã Nhập : {{$data['info']['exp_code']}}</center>
                    </th>
                </tr>
            </thead>

        </table>
    </div>
    <hr>
    <center>
        <h2>PHIẾU NHẬP KHO</h2>
    </center>
    <table>
        <tr>
            <td width="120px"><strong>Nhân viên lập phiếu:</strong></td>
            <td>{{ session('fullname') }}</td>
            <td><strong></td>
        </tr>
    </table><br><br>
    <table width="100%" cellpadding="3px" style="border:thin solid;">
        <thead>
            <tr>
                <td style="border:thin solid;" ><strong>STT</strong></td>
                <td style="border:thin solid;" ><strong>Vật tư</strong></td>
                <td style="border:thin solid;" ><strong>Số lượng</strong></td>
                <td style="border:thin solid;" ><strong>Đơn giá</strong></td>
                <td style="border:thin solid;" ><strong>Thành tiền</strong></td>
            </tr>
        </thead>
        <tbody>
            <?php 
                $count = 0; 
                $total =0;
            ?>
            @foreach ($data['arr'] as $item)
                <tr>
                    <td style="border:thin solid;">{!! $count = $count + 1 !!}</td>
                    
                    <td style="border:thin solid;">
                        {{$item['sup_name']}}
                    </td>

                    <td style="border:thin solid;">
                        {{$item['de_amount']}}
                    </td>

                    <td style="border:thin solid;">
                        {{number_format($item['de_price'])}}
                    </td>

                    <td style="border:thin solid;">
                        {{number_format($item['de_into_money'])}}
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <table class="sumary-table" style="margin-top:30px;">
        <tr>
            <td>Tổng giá trị nhập:</td>
            <td>{{number_format($data['info']['exp_total'])}} VND</td>
        </tr>
    </table><br>
    <table style="margin-bottom:30px;">
        <tr>
            <td width="200px"></td>
            <td width="200px"></td>
            <td>Nhập,Ngày lập: {{\Carbon\Carbon::parse($data['info']['exp_date'])->format('d/m/Y')}}</td>
        </tr>
        <tr>
            <td width="250px" class="customer-title"> <strong>Người lập phiếu</strong></td>
            <td width="250px" class="writer-title"><strong>Người phụ trách vật tư</strong></td>
            <td width="250px" class="writer-title"><strong>Thủ kho</strong></td>
        </tr>
        <tr>
            <td>(Ký và ghi rõ họ tên)</td>
            <td>(Ký và ghi rõ họ tên)</td>
            <td class="writer-name"><span>(Ký và ghi rõ họ tên)</span></td>
        </tr>
    </table>
</body>

</html>
