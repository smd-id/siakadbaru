
<script type="text/javascript">
var table;

$(document).ready(function() {

    var id_kab = $('#id_kab').val();
    //datatables
    table = $('#table').DataTable({
        
        "responsive": true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?=base_url('seleksiberkas/data/');?>"+id_kab,
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        {
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });
});


function luluskan()
{
    var nik = $('#nik_form').val();
    Swal.fire({
            title: 'Anda Yakin ?',
            html: "Mengkonfirmasi Kelulusan ini",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Luluskan!'
    }).then((result) => {
        if (result.value) {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('seleksiberkas/ajax_confirm') ?>/"+nik,
                type: "POST",
                dataType: "JSON",
                success: function(data, status)
                {
                    reload_table();
                    $('#modal_file').modal('hide');
                    mySwalalert('Berhasil Konfirmasi Data', 'success');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    mySwalalert('Gagal Konfirmasi Data', 'error');
                }
            });
        }
    })
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax
}

function show_file(nik)
{
    $.ajax({
        url : "<?php echo site_url('seleksiberkas/ajax_get') ?>/"+nik,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
            $('#nik_form').val(nik);
            $('#modal_file').modal('show');
            
            $('#name').html(data.result.nama+" - "+nik);
            var html = "";
            $.each(data.result,function(key,value){
                var keys_id = "#file_"+key;

                var path = key+"/"+value;
                
                html = "<a href='#' data-id='"+path+"' class='btn btn-sm btn-success' onclick='viewFile(this)'> Preview</a>";
                $(keys_id).html(html);
            });
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            mySwalalert('Gagal Mendapatkan Data', 'error');
        }
    });
    
}

function viewFile(d)
{
    var path = d.getAttribute("data-id");
    var url = "https://psb.ruhulislam.com/uploads/"+path;

    newwindow=window.open(url,'View File','height=300,width=650,screenX=400,screenY=350');
        if (window.focus) {newwindow.focus()}
    return false;

}
</script>

