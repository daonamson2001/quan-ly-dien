
<h3>Phản Hồi Của Người Dùng: {{$user}}</h3>

<br>

<table style="border-style: ridge;">
    <thead>
        <tr>
            <th width="600" style="border-style: dotted; border-width: 1px;">Câu hỏi</th>
			<th width="200" style="border-style: dotted; border-width: 1px;">Trả Lời</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th width="600" style="border-style: dotted; border-width: 1px;">Giao diện phần mềm có thân thiện với người dùng ?</th>
			<th width="200" style="border-style: dotted; border-width: 1px;">{{ $rdGiaodien }}</th>
        </tr>

        <tr>
            <th width="600" style="border-style: dotted; border-width: 1px;">Chức năng phần mềm có đầy đủ ?</th>
			<th width="200" style="border-style: dotted; border-width: 1px;">{{ $rdChucnang }}</th>
        </tr>

        <tr>
            <th width="600" style="border-style: dotted; border-width: 1px;">Trang đã tối ưu cho người dùng chưa ?</th>
			<th width="200" style="border-style: dotted; border-width: 1px;">{{ $rdToiUu }}</th>
        </tr>

        <tr>
            <th width="600" style="border-style: dotted; border-width: 1px;">Phản hồi trang tốt không ?</th>
			<th width="200" style="border-style: dotted; border-width: 1px;">{{ $rdPhanHoi }}</th>
        </tr>

        <tr>
            <th width="600" style="border-style: dotted; border-width: 1px;">Phần mềm có gặp vấn đề về truy cập không ?</th>
			<th width="200" style="border-style: dotted; border-width: 1px;">{{ $rdTruyCap }}</th>
        </tr>

        <tr>
            <th width="600" style="border-style: dotted; border-width: 1px;">Giao diện phần mềm cần bổ sung chức năng gì không </th>
			<th width="200" style="border-style: dotted; border-width: 1px;">{{ $rdThieuChucNang }}</th>
        </tr>
    </tbody>
</table>

<h4>Các chức năng muốn bổ sung:</h4>
<p>{{$msg}}</p>