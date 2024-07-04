var tabla;

function init(){
    
}

$(document).ready(function(){
   
    var userId = document.getElementById('user_id').value; 
    console.log("User ID:", userId); 

    tabla = $('#ticket_data').DataTable({
        "processing": true,
        "serverSide": true,
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
        "ajax": {
            url: '../../controller/ticket.php?op=listar_x_usu',
            type: "post",
            dataType: "json",
            data: { usu_id: userId }, 
            error: function(e){
                console.log("Error en AJAX:", e.responseText); 
            }
        },
        "destroy": true,
        "responsive": true,
        "info": true,
        "pageLength": 10,
        "autoWidth": false
    });

    
    console.log("DataTables instance:", tabla);

});

function ver(tick_id){
    console.log(tick_id);
}

init();
