
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


function update_data(id)
{
    Swal.fire({
            title: 'Anda Yakin ?',
            html: "Mengkonfirmasi Pembayaran ini",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, confirm it!'
    }).then((result) => {
        if (result.value) {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('konfirmasipsb/ajax_delete') ?>/"+id,
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

function show_file(nik)
{
    $('#nik').val(nik);
    $('#modal_file').modal('show');
}
</script>

