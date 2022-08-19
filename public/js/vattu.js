$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
});

$(document).ready(function(){
    $('div#alert-err').hide();

    // Create
    $(document).on('submit', '#form-create', function(){
        window.location.reload();
        if(confirm('Bạn Có Chắc Chắn Muốn Thêm Không Không?')){
            var sup_name   = $('#c-sup_name').val();
            var sup_amount = $('#c-sup_amount').val();
            var unit_id    = $('#c-unit_id').val();
            // console.log( sup_name, sup_amount, unit_id);
            $.ajax({
                type : "POST",
                url : 'vattu',
                data: {
                    sup_name   : sup_name,
                    sup_amount : sup_amount,
                    unit_id    : unit_id,
                },
                success: function(data){
                    console.log(data);
                    if(data == 'abc'){
                        alert('Đã tồn tại vật tư');
                    }else{
                        alert("Đã Thêm Vật Tư Mới: " + data);
                    }
                    window.location.reload();
                },
                error: function(data){
                    console.log(data);
                }
            });
        }else{
            $(document).ready(function(){
                window.stop();
                $("#create").modal('show');
            });
        }
    });

    // EDIT
    $(document).on('click', '.btn-edit', function(){ 
        var sup_id = $(this).val();
        $.ajax({
            type : 'GET',
            url  : "vattu/" + sup_id + "/edit",
            success: function(data){
                $("h4#title").text("Sửa Thông Vật Tư Có ID: " + data.id)
                $("input#u-id").val(data.id);
                $("input#u-sup_name").val(data.sup_name);
                $("input#u-sup_amount").val(data.sup_amount);
                $("div.select-unit select").val(data.unit_id);
                console.log(data);
            }
        });
    });

    $(document).on('submit', '#form-update', function(){
        window.location.reload();
        if(confirm('Bạn Có Chắc Chắn Muốn Sửa Không?')){
            var id            = $('#u-id').val();
            var sup_name   = $('#u-sup_name').val();
            var sup_amount = $('#u-sup_amount').val();
            var unit_id    = $('#u-unit_id').val();
            console.log(id, sup_name, sup_amount, unit_id);
            $.ajax({
               type :'put',
               url  : 'vattu/' + id,
               data : {
                    id         : id,
                    sup_name   : sup_name,
                    sup_amount : sup_amount,
                    unit_id    : unit_id,
               },
               success:function(data){
                   console.log(data);
                   window.location.reload();
                   if(data){ 
                        alert("Đã Sửa Thông Tin Chất Lượng: " + data);
                   }else{
                        alert("Lỗi!");
                        window.stop();
                   }
               }
            });
            
        }else{
            $(document).ready(function(){
                window.stop();
                $("#update").modal('show');
            });
        }
    });

    $(document).on('click', '.btn-delete', function(){ 
        var sup_id = $(this).val();
        // alert(sup_id);
        if(confirm('Bạn Có Chắc Chắn Muốn Xóa Không?')){
            $.ajax({
               type    :'delete',
               url     : 'vattu/' + sup_id,
               success :function(data){
                    console.log(data);
                   window.location.reload();
                   alert("Đã Xóa " + data.sup_name);
               },
               error: function(data){
                   alert("Dữ Liệu Này Không Thể Xóa!");
               }
            });
        }
    });

});
