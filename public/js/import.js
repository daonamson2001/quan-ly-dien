let today = new Date().toISOString().substr(0, 10);
document.querySelector("#imp_date").value = today;

var index     = 1;

$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
});

$(document).ready(function(){
    var total = 0;

     $(window).on('beforeunload', function(){
        $('#btn-reset').click();

    });


    $('#sup_id').on('change', function (e) {
        var sup_id = $(this).val();
        console.log(sup_id);
        $.ajax({
            type : 'GET',
            url  : "nhap/" + sup_id ,
            success: function(data){
                console.log(data);
                $("#sup_name").text(data.sup_name);
                $("#sup_name").val(data.sup_name);
                $("#unit_name").text(data.unit.unit_name);
                $("#unit_name").val(data.unit.unit_name);
                $("#sup_price").val(data.sup_price);
                
            }
        });
    });

    $(document).on('click','.import_add', function(){
        var imp_code  = $('#imp_code').val();
        var imp_date  = $('#imp_date').val();
        var user_id   = $('#user_id').val();
        var pro_name  = $('#pro_name').val();
        var sup_id    = $('#sup_id').val();
        var unit_name   = $('#unit_name').val();
        var qua_name  = $('#qua_name').val();
        var sup_amout = $('#sup_amout').val();
        var sup_name  = $('#sup_name').val()
        var di_price  = $('#di_price').val();

        if(pro_name === "" || sup_name === "" || sup_amout === "" || di_price === ""){
            alert('Chưa Nhập Thông Tin Đầy Đủ!');
        }else{
            var x = di_price*sup_amout ; 

            $.ajax({
                type : "POST",
                url : 'nhap',
                data: {
                    imp_code : imp_code,
                    imp_date : imp_date,
                    user_id : user_id,
                    di_amount : sup_amout,
                    di_price : di_price,
                    di_into_money : x,
                    sup_id : sup_id,
                    pro_name : pro_name,
                    qua_name :qua_name,
                },
                success: function(data){
                    console.log(data);
                    // window.location.reload();
                },
                error: function(data){
                    console.log(data);
                }
            });   

            index = $('#myTable tr').length; 
            // alert(countTable);
            // console.log(di_price*sup_amout + pro_name);
            // alert(imp_code+"/"+user_id+"/"+pro_id+"/"+imp_date+"/"+sup_id+"/"+unit_id+"/"+qua_id+"/"+sup_amout+"/"+sup_price+"/"+sup_name);
    
            $('#myTable').append('<tr>' +
                                 '<th width = "5%" >' + index              + '</th>' +
                                 '<td width = "15%" title="sup_name">' + sup_name           + '</td>' +
                                 '<td width = "13%" title="pro_name">' + pro_name           + '</td>' +
                                 '<td width = "10%" title="qua_name">' + qua_name           + '</td>' +
                                 '<td width = "10%" title="sup_amout">' + sup_amout          + '</td>' +
                                 '<td width = "10%" title="sup_amout">' + unit_name          + '</td>' +
                                 '<td width = "15%" title="di_price">' + di_price           + '</td>' +
                                 '<td width = "15%" value="' + x + '" title="imp_total">' + x + '</td>' +
                                 '<td width = "7%"><button value="" id="DeleteButton" type="button" class="btn btn-outline-danger btn-delete"> <i class="fas fa-trash-alt"> </i> </button></td>' +
                                 '</tr>') ;
            index = $('#myTable tr').length;   
            
            total += x;
            $('#Total').html(total); 
            $('#TableTotal').val(total); 
        }
    });

    $(document).on('click', '#myTable #DeleteButton', function()
    {
        var imp_code  = $('#imp_code').val();
        total = $('#TableTotal').val();
        var sub = $($($(this).closest("tr")).find('td')[6]).text();
        var index = $($($(this).closest("tr")).find('th')[0]).text();
        $.ajax({
            type : "get",
            url  : 'nhap/deleteRow',
            data:{
                imp_code : imp_code,
                index : index
            },
            success:function(data){
                console.log(data);
            }
        });
        // alert(total + '/' + sub);
        total -= sub;
        $('#Total').text(total); 
        $('#TableTotal').val(total); 

        $(this).closest("tr").remove();
        
        $('#myTable tbody tr').each(function(i){            
            $($(this).find('th')[0]).html(i+1);           
        }); 
    });

    $(document).on('click','#btn-reset', function(){
        var imp_code  = $('#imp_code').val();
        var imp_date  = $('#imp_date').val();
        var user_id   = $('#user_id').val();
        var pro_name  = $('#pro_name').val();
        var sup_id    = $('#sup_id').val();
        var unit_name   = $('#unit_name').val();
        var qua_name  = $('#qua_name').val();
        var sup_amout = $('#sup_amout').val();
        var sup_name  = $('#sup_name').val()
        var di_price  = $('#di_price').val();
        var x = di_price*sup_amout ; 
        // alert(user_id);
        $.ajax({
            type : "delete",
            url  : 'nhap/'+ imp_code,
            success:function(data){
                console.log(data);
                window.stop();
            }
        });

            $("#myTable tbody tr").remove();
            $('#Total').text('0'); 
            // $('#TableTotal').val(0); 
    });

    // $(document).on('click','#btn-save', function(){
    //     var countRow = $('#myTable tr').length;
    //     if(countRow > 1){
    //         var imp_code  = $('#imp_code').val();
    //         $.ajax({
    //             type : "PUT",
    //             url : 'nhap/' + imp_code,
    //             data: {
    //                 imp_total : total,
    //             },
    //             success: function(data){
    //                 console.log(data);
    //                 alert('abc');
    //                 $('#btn-save').attr("id","newId");
    //                 $('#btn-print').click(); 
    //             }
    //         }); 
            
    //     }else{
    //         alert('Chưa Có Dữ Liệu Để Lưu ');
    //     }       
    // });

    $(document).on('click','#btn-print', function(){
        
        var countRow = $('#myTable tr').length;
        if(countRow > 1){
            $('#btn-reset').attr("id","newId");
            var imp_code  = $('#imp_code').val();
            $.ajax({
                type : "PUT",
                url : 'nhap/' + imp_code,
                data: {
                    imp_total : total,
                },
                success: function(data){
                    console.log(data);
                    window.location.reload(); 
                }
            }); 
            
        }else{
            alert('Chưa Có Dữ Liệu Để Lưu ');
        }       
        // window.location.reload(); 
    });

});