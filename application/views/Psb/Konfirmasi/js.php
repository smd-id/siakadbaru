
<script type="text/javascript">
var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({
        
        "responsive": true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?=base_url('konfirmasipsb/data/');?>",
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


function konfirmasi(id)
{
    Swal.fire({
            title: 'Anda Yakin ?',
            html: "Mengkonfirmasi Pembayaran ini",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, confirm it!'
    }).then((result) => {
        if (result.value) {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('konfirmasipsb/ajax_confirm') ?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    reload_table();
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

function reject(id)
{
    Swal.fire({
            title: 'Anda Yakin ?',
            html: "Menolak Pembayaran ini",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, reject it!'
    }).then((result) => {
        if (result.value) {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('konfirmasipsb/ajax_reject') ?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    reload_table();
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

function viewFile(file)
{
    var url = "<?= psb_url('uploads/struk/'); ?>"+file;
    newwindow=window.open(url,'View File','height=720,width=1280,screenX=400,screenY=350');
        if (window.focus) {newwindow.focus()}
    return false;

}
</script>

