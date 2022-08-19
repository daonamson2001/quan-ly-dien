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
                        <center>Ngày lập phiếu: <?php echo date('d-m-Y', strtotime($imps->imp_date)); ?></center>
                    </th>
                    <th width="50px">
                        <center>Mã Nhập : {{ $imps->imp_code }}</center>
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
    <table cellpadding="3px" style="border:thin solid;">
        <thead>
            <tr>

                <td style="border:thin solid;" width="50px"><strong>STT</strong></td>
                <td style="border:thin solid;" width="100px"><strong>Vật tư</strong></td>
                <td style="border:thin solid;" width="100px"><strong>NSX</strong></td>
                <td style="border:thin solid;" width="50px"><strong>CL</strong></td>
                <td style="border:thin solid;" width="50px"><strong>SL</strong></td>
                <td style="border:thin solid;" width="50px"><strong>ĐVT</strong></td>
                <td style="border:thin solid;" width="100px"><strong>Đơn Giá</strong></td>
                <td style="border:thin solid;" width="100px"><strong>Thành tiền</strong></td>
            </tr>
        </thead>
        <tbody>
            <?php $count = 0; ?>
            @foreach ($detail as $di)
                <tr width="5%">
                    <td style="border:thin blue solid;border-style:dashed;">{!! $count = $count + 1 !!}</td>
                    <td style="border:thin blue solid;border-style:dashed;">
                        <?php
                        $sup_name = DB::table('supplies')
                            ->where('id', $di->sup_id)
                            ->first();
                        print_r($sup_name->sup_name);
                        ?>
                    </td>
                    <td style="border:thin blue solid;border-style:dashed;">
                        <?php
                        $pro_name = DB::table('producers')
                            ->where('id', $di->pro_id)
                            ->first();
                        print_r($pro_name->pro_name);
                        ?>
                    </td>
                    <td style="border:thin blue solid;border-style:dashed;">
                        <?php
                        $qua_name = DB::table('qualities')
                            ->where('id', $di->qua_id)
                            ->first();
                        print_r($qua_name->qua_name);
                        ?>
                    </td>
                    <td style="border:thin blue solid;border-style:dashed;">{{ $di->di_amount }}</td>

                    <td style="border:thin blue solid;border-style:dashed;">
                        <?php
                        $unit_name = DB::table('units')
                            ->where(
                                'id',
                                DB::table('supplies')
                                    ->where('id', $di->sup_id)
                                    ->first()->unit_id,
                            )
                            ->first();
                        print_r($unit_name->unit_name);
                        ?>
                    </td>
                    <td style="border:thin blue solid;border-style:dashed;">
                        {{ number_format($di->di_price, 0, ',', '.') }}
                    </td>

                    <td style="border:thin blue solid;border-style:dashed;">
                        {{ number_format($di->di_into_money, 0, ',', '.') }}
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <table class="sumary-table">
        <tr>
            <td width="600px">Tổng giá trị nhập</td>
            <td width="100px">{!! number_format($imps->imp_total, 0, ',', '.') !!} VND</td>
        </tr>
    </table><br>
    <table style="margin-bottom:-300px;">
        <tr>
            <td width="200px"></td>
            <td width="200px"></td>
            <td>Nhập,Ngày lập: <?php echo date('d-m-Y'); ?></td>
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
