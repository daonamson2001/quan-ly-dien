<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Phiếu xuất kho</title>
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
                        <center>PHIẾU XUẤT KHO</center>
                        <center>Ngày xuất: <?php echo date('d-m-Y', strtotime($exps->exp_date)); ?></center>
                    </th>
                    <th width="50px">
                        <center>Mã Xuất: {{ $exps->exp_code }}</center>
                    </th>
                </tr>
            </thead>

        </table>
    </div>
    <hr>
    <center>
        <h2>PHIẾU XUẤT KHO</h2>
    </center>
    <table>
        <tr>
            <td width="120px"><strong>Nhân viên lập phiếu:</strong></td>
            <td>{{ session('fullname') }}</td>
            <td><strong></td>
        </tr>
    </table><br><br>
    <table cellpadding="3px" style="border:thin solid;">
        <thead>
            <tr>

                <td style="border:thin solid;" width="50px"><strong>STT</strong></td>
                <td style="border:thin solid;" width="150px"><strong>Vật tư</strong></td>
                <td style="border:thin solid;" width="50px"><strong>Số lượng</strong></td>
                <td style="border:thin solid;" width="150px"><strong>Đơn giá</strong></td>
                <td style="border:thin solid;" width="200px"><strong>Thành tiền</strong></td>
            </tr>
        </thead>
        <tbody>
            <?php $count = 0; ?>
            @foreach ($detail as $de)
                <tr>
                    <td style="border:thin blue solid;border-style:dashed;">{!! $count = $count + 1 !!}</td>
                    <td style="border:thin blue solid;border-style:dashed;">
                        <?php
                        $sup_name = DB::table('supplies')
                            ->where('id', $de->sup_id)
                            ->first();
                        print_r($sup_name->sup_name);
                        ?>
                    </td>
                    <td style="border:thin blue solid;border-style:dashed;">{{ $de->de_amount }}</td>
                    <td style="border:thin blue solid;border-style:dashed;">
                        {{ number_format($de->de_price, 0, ',', '.') }}
                    </td>

                    <td style="border:thin blue solid;border-style:dashed;">
                        {{ number_format($de->de_into_money, 0, ',', '.') }}
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <table class="sumary-table">
        <tr>
            <td width="480px">Tổng giá trị xuất: </td>
            <td width="200px">{!! number_format($exps->exp_total, 0, ',', '.') !!} VND</td>
        </tr>
    </table><br>
    <table style="margin-bottom:-300px;">
        <tr>
            <td width="200px"></td>
            <td width="200px"></td>
            <td>Ngày lập: <?php echo date('d-m-Y'); ?></td>
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
