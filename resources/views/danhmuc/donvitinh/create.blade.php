
<div class="modal fade" id="create" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="title">Thêm Đơn Vị Tính</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body " >
          <div class="alert alert-danger" id="alert-err" >
            <li id="err" ></li> 
          </div>
          <form action="#" id="form-create">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Tên Đơn Vị Tính</label>
                <input type="text" class="col-md-6 form-control" id="c-unit_name" required>
            </div>

            
            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Viết Tắt</label>
                <input type="text" class="col-md-6 form-control" id="c-unit_simplify" >
            </div>


            <div class="form-group row">
              <div class="col-md-10 text-md-right">
                <input type="submit" value="Cập Nhật" class="btn btn-primary col-4 btn-submit" ></input>
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
