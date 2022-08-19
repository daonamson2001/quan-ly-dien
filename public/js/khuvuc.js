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
            var dis_name      = $('#c-dis_name').val();
            $.ajax({
                type : "post",
                url : 'khuvuc',
                data: {
                    dis_name     : dis_name,
                },
                success: function(data){
                    // window.location.reload();
                    console.log(data);
                    alert('Thêm Chất Lượng ' + data + ' Thành Công!');
                    window.location.reload();
                },
                error:function(data){
                     $('div#alert-err').show();
                     $('#err').text(data.responseJSON.errors.dis_name);
                     window.stop();
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
        var dis_id = $(this).val();
        $.ajax({
            type : 'GET',
            url  : "khuvuc/" + dis_id + "/edit",
            success: function(data){
                $("h4#title").text("Sửa Thông Tin Chất lượng Có ID: " + data.id)
                $("input#u-id").val(data.id);
                $("input#u-dis_name").val(data.dis_name);
                console.log(data);
            }
        });
    });

    $(document).on('submit', '#form-update', function(){
        window.location.reload();
        if(confirm('Bạn Có Chắc Chắn Muốn Sửa Không?')){
            var id            = $('#u-id').val();
            var dis_name      = $('#u-dis_name').val();
            $.ajax({
               type :'put',
               url  : 'khuvuc/'+id,
               data : {
                    id            : id,
                    dis_name     : dis_name,
               },
               success:function(data){
                   console.log(data);
                //    window.stop();
                   window.location.reload();
                   if(data){ 
                        alert("Đã Sửa Thông Tin Chất Lượng: " + data);
                   }else{
                        alert("Đã Tồn Tại Tên Chất Lượng!");
                        window.stop();
                   }
               }
            });
            
        }else{
            window.stop();
        }
        // alert("abc");
    });

    $(document).on('click', '.btn-delete', function(){ 
        var pro_id = $(this).val();
        if(confirm('Bạn Có Chắc Chắn Muốn Xóa Không?')){
            $.ajax({
               type    :'delete',
               url     : 'khuvuc/' + pro_id,
               success :function(data){
                    console.log(data);
                   window.location.reload();
                   alert("Đã Xóa " + data.dis_name);
               }
            });
        }
    });

});
