
<div class="modal fade" id="create" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="title">Thêm Nhà Sản Xuất</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body " >
          
          <div class="alert alert-danger" id="alert-err" >
            <li id="err" ></li> 
          </div>

          <form action="#" id="form-create">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Tên Nhà Sản Xuất</label>
                <input type="text" class="col-md-6 form-control" id="c-pro_name" required>
            </div>

            
            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Địa Chỉ: </label>
                <input type="text" class="col-md-6 form-control" id="c-pro_address" required>
            </div>

            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Số ĐT: </label>
                <input type="text" class="col-md-6 form-control" id="c-pro_phone" required>
            </div>
            
            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Email:</label>
                <input type="email" class="col-md-6 form-control" id="c-pro_email" required>
            </div>

            
            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Nhân Viên Đại Diện</label>
                <input type="text" class="col-md-6 form-control" id="c-pro_employee" required>
            </div>

            <div class="form-group row select-district">
                <label class="col-md-4 text-md-right font-weight-bold" >Khu Vực</label>
                <select class="col-md-6 form-control" name="district" id="c-district" class="form-control" name="district" >
                  @foreach ($districts as $district)
                    <option name="district" value="{{$district->id}}">{{$district->dis_name}}</option>
                  @endforeach  
                </select>
            </div>

            <div class="form-group row">
              <div class="col-md-10 text-md-right">
                <input type="submit" value="Thêm Mới" class="btn btn-primary col-4 btn-submit" ></input>
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
