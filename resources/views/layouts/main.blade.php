@extends('master')

@section('content')
    <div class="container bg-white py-5">
        <div class="row">
            <div class="col">
                @if($empty)
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{$empty}}
                    </div>
                @endif

                <form class="d-flex mx-auto" style="width: 500px" action="{{route('home.index')}}" method="get">
                    {{-- <input class="form-control mr-2" type="number" name="month" value="{{$month}}"> --}}
                    <select name="month" id="" class="form-control mr-2">
                        <option {{$month == '01' ? 'selected' : ''}} value="01">01</option>
                        <option {{$month == '02' ? 'selected' : ''}} value="02">02</option>
                        <option {{$month == '03' ? 'selected' : ''}} value="03">03</option>
                        <option {{$month == '04' ? 'selected' : ''}} value="04">04</option>
                        <option {{$month == '05' ? 'selected' : ''}} value="05">05</option>
                        <option {{$month == '06' ? 'selected' : ''}} value="06">06</option>
                        <option {{$month == '07' ? 'selected' : ''}} value="07">07</option>
                        <option {{$month == '08' ? 'selected' : ''}} value="08">08</option>
                        <option {{$month == '09' ? 'selected' : ''}} value="09">09</option>
                        <option {{$month == '10' ? 'selected' : ''}} value="10">10</option>
                        <option {{$month == '11' ? 'selected' : ''}} value="11">11</option>
                        <option {{$month == '12' ? 'selected' : ''}} value="12">12</option>
                    </select>
                    <input class="form-control mr-2" type="number" name="year" id="datepicker" value="{{$year}}">
                    <button class="btn btn-secondary">Lọc</button>
                </form>

                <div id="container" class="my-3 mx-auto" style="width:500px; height: 500px;"></div>
                <h3 class="text-center">Biểu đồ thống kê doanh thu vật tư đã bán</h3>
            </div>
        </div>
    </div>
    
    
    <script src="{{ asset('js\anychart\anychart-core.min.js') }}"></script>
    <script src="{{ asset('js\anychart\anychart-pie.min.js') }}"></script>

    <script>
        // create data
        var data = {!! $data !!};
        var arr = [];

        data.forEach(el => {
            arr.push({
                x: el.sup_name,
                value: el.total_sold,
            })
        });
        
        // create a chart and set the data
        chart = anychart.pie(arr);

        // set the container id
        chart.container("container");

        // initiate drawing the chart
        chart.draw();
    </script>
    
    {{-- <div class="row">
        <div class="col-sm-4">
            <h2>Điện - Điện nước ĐNS</h2>
            <h5>Trung tâm điều hành điện - điện nước:</h5>
            <div><img src="{{ asset('img/image1.jpg') }}" alt="Trụ sở Gia Lâm" style="width: 300px; height:200px"></div>
            <p><strong>Quy mô :</strong> Tổng diện tích sàn xây dựng: 12.875m² (chưa kể tầng hầm và mái) gồm một tầng hầm,
                12 tầng cao và tầng kỹ thuật dùng để làm văn phòng làm việc và trung tâm điều độ - điều hành hệ thống
                điện.</p>
            <p><strong>Địa điểm : </strong>Gia Lâm - Hà Nội</p>
        </div>
        <div class="col-sm-8">
            <h2>Tổng quan về chúng tôi</h2>
            <p>Tổng công ty Điện - Điện nước Việt Nam được thành lập theo Quyết định số 562/QĐ-TTg ngày 10/10/1994 của Thủ
                tướng
                Chính phủ trên cơ sở sắp xếp lại các đơn vị thuộc Bộ Năng lượng; tổ chức và hoạt động theo Điều lệ ban hành
                kèm theo Nghị định số 14/CP ngày 27/1/1995 của Chính phủ.</p>
            <p>Ngày 22/6/2006, Thủ tướng Chính phủ ra Quyết định số 147/QĐ-TTg về việc phê duyệt Đề án thí điểm hình thành
                Tập đoàn Điện lực Việt Nam và Quyết định 148/2006/QĐ-TTG về việc thành lập Công ty mẹ - Tập đoàn Điện lực
                Việt Nam.</p>
            <p>Đến ngày 25/6/2010, Thủ tướng Chính phủ ban hành Quyết định số 975/QĐ-TTg về việc chuyển Công ty mẹ - Tập
                đoàn Điện lực Việt Nam thành công ty trách nhiệm hữu hạn một thành viên thuộc sở hữu Nhà nước.</p>
            <p>Ngày 28/2/2018, Thủ tướng Chính phủ ban hành Nghị định số 26/2018/NĐ-CP về Điều lệ tổ chức và hoạt động của
                Tập đoàn Điện lực Việt Nam. Nghị định có hiệu lực thi hành kể từ ngày ban hành (thay thế cho Nghị định số
                205/2013/NĐ-CP ngày 6/12/2013), với một số nội dung chính như sau:</p>
            <p><strong>* Tên gọi:</strong></p>
            <p>- Tên gọi đầy đủ: TẬP ĐOÀN ĐIỆN - ĐIỆN NƯỚC.</p>
            <p>- Tên giao dịch: TẬP ĐOÀN ĐIỆN - ĐIỆN NƯỚC.</p>
            <p>- Tên giao dịch tiếng Anh: VIETNAM ELECTRICITY - ELECTRICITY AND WATER.</p>
            <p>- Tên gọi tắt: ĐNS.</p>
            <p><strong>* Loại hình doanh nghiệp:</strong> Công ty trách nhiệm hữu hạn một thành viên</p>
            <p><strong>* Ngành, nghề kinh doanh chính:</strong></p>
            <p>- Sản xuất, truyền tải, phân phối và kinh doanh mua bán điện năng; chỉ huy điều hành hệ thống sản xuất,
                truyền tải, phân phối và phân bổ điện năng trong hệ thống điện quốc gia;</p>
            <p>- Xuất nhập khẩu điện năng;</p>
            <p>- Đầu tư và quản lý vốn đầu tư các dự án điện;</p>
            <p>- Quản lý, vận hành, sửa chữa, bảo dưỡng, đại tu, cải tạo, nâng cấp thiết bị điện, cơ khí, điều khiển, tự
                động hóa thuộc dây truyền sản xuất, truyền tải và phân phối điện, công trình điện; thí nghiệm điện.</p>
            <p>- Tư vấn quản lý dự án, tư vấn khảo sát thiết kế, tư vấn lập dự án đầu tư, tư vấn đấu thầu, lập dự toán, tư
                vấn thẩm tra và giám sát thi công công trình nguồn điện, các công trình đường dây và trạm biến áp.</p>

            <br>
        </div>
    </div> --}}
@endsection
