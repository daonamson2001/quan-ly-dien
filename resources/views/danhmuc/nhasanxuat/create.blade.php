
<div class="modal fade" id="edit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body " >
          <div class="alert alert-danger" id="alert-err" >
            <li id="err" ></li> 
          </div>
          <form action="#" id="form-update">
            @method('post')
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group row ">
              <label class="col-md-4 text-md-right font-weight-bold" >ID: </label>
              <input type="text" class="col-md-6 form-control" id="u-id" disabled>  
            </div> 
                
            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Tên Nhà Sản Xuất</label>
                <input type="text" class="col-md-6 form-control" id="u-pro_name" required>
            </div>

            
            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Địa Chỉ: </label>
                <input type="text" class="col-md-6 form-control" id="u-pro_address" required>
            </div>

            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Số ĐT: </label>
                <input type="text" class="col-md-6 form-control" id="u-pro_phone" required>
            </div>
            
            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Email:</label>
                <input type="text" class="col-md-6 form-control" id="u-pro_email" required>
            </div>

            
            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Nhân Viên Đại Diện</label>
                <input type="text" class="col-md-6 form-control" id="u-pro_employee" required>
            </div>

            <div class="form-group row select-district">
                <label class="col-md-4 text-md-right font-weight-bold" >Khu Vực</label>
                <select class="col-md-6 form-control" name="district" id="c-district" class="form-control" name="district" required>
                  @foreach ($districts as $district)
                    <option name="district" value="{{$district->id}}">{{$district->dis_name}}</option>
                  @endforeach  
                </select>
            </div>

            <div class="form-group row">
              <div class="col-md-10 text-md-right">
                <input type="submit" value="Cập Nhật" class="btn btn-primary col-4 btn-submit" >
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
