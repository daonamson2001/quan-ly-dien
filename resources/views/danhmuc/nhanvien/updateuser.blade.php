<div class="modal fade" id="updateuser" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <div class="alert alert-danger" id="alert-err">
                    <li id="err"></li>
                </div>

                <form action="#" id="form-update">
                    @method('PATCH')
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group row ">
                        <label class="col-md-4 text-md-right font-weight-bold">ID: </label>
                        <input type="text" class="col-md-6 form-control" id="u-id" disabled>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 text-md-right font-weight-bold">Họ và tên: </label>
                        <input type="text" class="col-md-6 form-control" id="u-fullname">
                    </div>

                    <div class="form-group row select-gender">
                        <label class="col-md-4 text-md-right font-weight-bold">Giới tính :</label>
                        <select class="col-md-6 form-control" name="gender" id="u-gender" class="form-control"
                            name="gender">
                            <option name="gender" value='Nam'>Nam</option>
                            <option name="gender" value='Nữ'>Nữ</option>
                        </select>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 text-md-right font-weight-bold">Ngày Sinh: </label>
                        <input type="date" class="col-md-6 form-control" id="u-birth">

                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 text-md-right font-weight-bold">Địa Chỉ: </label>
                        <input type="text" class="col-md-6 form-control" id="u-address">
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 text-md-right font-weight-bold">Email:</label>
                        <input type="text" class="col-md-6 form-control" id="u-email">
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 text-md-right font-weight-bold">Số ĐT: </label>
                        <input type="text" class="col-md-6 form-control" id="u-phone">
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 text-md-right font-weight-bold">CMND: </label>
                        <input type="text" class="col-md-6 form-control" id="u-identification">
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 text-md-right font-weight-bold">Ngày Vào Làm: </label>
                        <input type="date" class="col-md-6 form-control" id="u-joining">
                    </div>

                    <div class="form-group row select-position">
                        <label class="col-md-4 text-md-right font-weight-bold">Chức vụ: </label>
                        <select class="col-md-6 form-control" name="postion" id="u-postion" class="form-control"
                            name="postion">
                            <option name="postion" value="1">Admin</option>
                            <option name="postion" value="2">Thủ Kho</option>
                            <option name="postion" value="3">Quản Lí</option>
                            <option name="postion" value="4">Nhân Viên</option>
                        </select>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-10 text-md-right">
                            <button type="submit" class="btn btn-primary col-4 btn-submit">Cập Nhật</button>
                        </div>
                    </div>
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
