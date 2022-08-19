let today = new Date().toISOString().substr(0, 10);
document.querySelector("#exp_date").value = today;

var index = 1;

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
                // $("#sup_price").val(data.sup_price);
                
            }
        });
    });

    $(document).on('click','.import_add', function(){
        var exp_code  = $('#exp_code').val();
        var exp_date  = $('#exp_date').val();
        var user_id   = $('#user_id').val();
        // var pro_name  = $('#pro_name').val();
        var sup_id    = $('#sup_id').val();
        var unit_name   = $('#unit_name').val();
        // var qua_name  = $('#qua_name').val();
        var sup_amout = $('#sup_amout').val();
        var sup_name  = $('#sup_name').val()
        var de_price  = $('#de_price').val();

        if( sup_name === "" || sup_amout === "" || de_price === ""){
            alert('Chưa Nhập Thông Tin Đầy Đủ!');
        }else{
            var x = de_price*sup_amout ; 

            $.ajax({
                type : "POST",
                url : 'xuat',
                data: {
                    exp_code : exp_code,
                    exp_date : exp_date,
                    user_id : user_id,
                    de_amount : sup_amout,
                    de_price : de_price,
                    de_into_money : x,
                    sup_id : sup_id,
                },
                success: function(data){
                    console.log(data);
                    if(data == 1){
                        var abc = 0;
                        alert('Số lượng vật tư trong kho không đủ!');
                    }
                    else {
                        index = $('#myTable tr').length; 
                        $('#myTable').append('<tr>' +
                             '<th width = "5%" >' + index              + '</th>' +
                             '<td width = "20%" title="sup_name">' + sup_name           + '</td>' +
                             '<td width = "10%" title="sup_amout">' + sup_amout          + '</td>' +
                             '<td width = "15%" title="sup_amout">' + unit_name          + '</td>' +
                             '<td width = "20%" title="de_price">' + de_price           + '</td>' +
                             '<td width = "20%" value="' + x + '" title="exp_total">' + x + '</td>' +
                             '<td width = "10%"><button value="" id="DeleteButton" type="button" class="btn btn-outline-danger btn-delete"> <i class="fas fa-trash-alt"> </i> </button></td>' +
                             '</tr>') ;
                        index = $('#myTable tr').length;   
                        
                        total += x;
                        $('#Total').html(total); 
                        $('#TableTotal').val(total); 
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });   
        }
    });

    $(document).on('click', '#myTable #DeleteButton', function()
    {
        var exp_code  = $('#exp_code').val();
        total = $('#TableTotal').val();
        var sub = $($($(this).closest("tr")).find('td')[4]).text();
        var index = $($($(this).closest("tr")).find('th')[0]).text();
        $.ajax({
            type : "get",
            url  : 'xuat/deleteRow',
            data:{
                exp_code : exp_code,
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
        // e.preventdefault();
        var exp_code  = $('#exp_code').val();
        // alert(exp_code);
        // var sup_amout = $('#sup_amout').val();
        // var de_price  = $('#de_price').val();
        // var x = de_price*sup_amout ; 
        // alert(user_id);
        $.ajax({
            type : "delete",
            url  : 'xuat/'+ exp_code,
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
        // alert(countRow);
        if(countRow > 1){
            $('#btn-reset').attr("id","newId");
            var exp_code  = $('#exp_code').val(); 
            $.ajax({
                type : "PUT",
                url : 'xuat/' + exp_code,
                data: {
                    exp_total : total,
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