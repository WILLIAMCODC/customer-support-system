var tabla;


function init(){

}

$(document).ready(function(){
    tabla=$('#ticket_data').dataTable({
        "aProccesing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'

        ],
     "ajax":{
        url: '../../controller/ticket.php?op=listar_x_usu',
        type : "post",
        dataType:"json",
        data:{ usu_id : 1 },
        error: function(e){
            console.log(e.responseText);
        }
     },
     "bDestroy": true,
     "responsive": true,
     "bInfo":true,
     "iDisplayLength": 10,
     "autoWidth": false
        
    }).DataTable();

});

function ver(tick_id){
    console.log(tick_id);
}

init();