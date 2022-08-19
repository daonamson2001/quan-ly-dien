
@extends('master')

@section('content')
<div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header h3">PHẢN HỒI</div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        <form action="{{ route('phanhoi.store') }}" method="POST">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                            <div class="row">

                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="80%">Câu hỏi</th>
                                                <th width="10%">Không</th>
                                                <th width="10%">Có</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td width="80%">Giao diện phần mềm có thân thiện với người dùng ?</td>
                                                <td width="10%">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="rdGiaodien" id="rdGiaodien" value="Không" >
                                                        </label>
                                                    </div>
                                                </td>
                                                <td width="10%">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="rdGiaodien" id="rdGiaodien" value="Có" checked>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td width="80%">Chức năng phần mềm có đầy đủ ?</td>
                                                <td width="10%">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="rdChucnang" id="rdChucnang" value="Không" >
                                                        </label>
                                                    </div>
                                                </td>
                                                <td width="10%">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="rdChucnang" id="rdChucnang" value="Có" checked>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td width="80%">Trang đã tối ưu cho người dùng chưa ?</td>
                                                <td width="10%">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="rdToiUu" id="rdToiUu" value="Không" >
                                                        </label>
                                                    </div>
                                                </td>
                                                <td width="10%">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="rdToiUu" id="rdToiUu" value="Có" checked>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td width="80%">Phản hồi trang tốt không ?</td>
                                                <td width="10%">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="rdPhanHoi" id="rdPhanHoi" value="Không" >
                                                        </label>
                                                    </div>
                                                </td>
                                                <td width="10%">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="rdPhanHoi" id="rdPhanHoi" value="Có" checked>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td width="80%">Phần mềm có gặp vấn đề về truy cập không ?</td>
                                                <td width="10%">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="rdTruyCap" id="rdTruyCap" value="Không" checked>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td width="10%">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="rdTruyCap" id="rdTruyCap" value="Có" >
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td width="80%">Giao diện phần mềm cần bổ sung chức năng gì không ?</td>
                                                <td width="10%">
                                                    <div class="radio">
                                                        <label>
                                                            <input name="rdThieuChucNang" id="rdThieuChucNang" type="radio" value="Không" checked/>
                                                            {{-- <input type="radio" name="rdThieuChucNang"   > --}}
                                                        </label>
                                                    </div>
                                                </td>
                                                <td width="10%">
                                                    <div class="radio">
                                                        <label>
                                                            <input name="rdThieuChucNang" id="rdThieuChucNang" value="Có" type="radio" />
                                                            {{-- <input type="radio" name="rdThieuChucNang" id="rdThieuChucNang" value="Có" checked="checked"> --}}
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <td colspan="3" id="textThieuChucNang">
                                                <div class="form-group " >
                                                        <textarea style="resize: none;" class="form-control" name="msg" id="msg" cols="95" rows="3" value="Không" required> </textarea>
                                                </div>
                                            </td>
                                        </tbody>
                                    </table>
                                    
                                    <div class="form-group">
                                        <div class="col-md-12 ">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="hid_user"> 
                                                    Gửi Ẩn Danh
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <footer id="submit-actions" class="form-actions">
                                <button type="submit" class="btn btn-primary" ><i class="icon-save"></i>&nbsp&nbsp Gửi &nbsp&nbsp</button>
                            </footer>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
        // hide your text box when page load
            $("#textThieuChucNang").hide();
            // select your radio buttons
            $("input[name=rdThieuChucNang]:radio").change(function() {
                // if the value is checked
                if (this.value == "Có") {
                // show textarea
                    $("#textThieuChucNang").show();
                    $("#msg").autofocus();
                } else {
                // hidetextarea
                    $("#textThieuChucNang").hide();
                }
            });
        });
    </script>
@endsection