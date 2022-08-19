
<div class="modal fade" id="edit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body " >
          <form action="#" id="form-update">
              @method('put')
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group row ">
              <label class="col-md-4 text-md-right font-weight-bold" >ID: </label>
              <input type="text" class="col-md-6 form-control" id="u-id" disabled>  
            </div>
                
            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Chất Lượng</label>
                <input type="text" class="col-md-6 form-control" id="u-qua_name" required>
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
