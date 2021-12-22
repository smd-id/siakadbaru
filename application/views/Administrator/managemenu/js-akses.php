<script>

function save_akses()
{
    $('#btnSave').text('Saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable

    var selected = $("select[name=iduser]").val().join();
    var userbefore = $('#userbefore').val();
    var id = $('#menu_id').val();
    var permited = userbefore+','+selected;
    //ajax adding data to database
    $.ajax({
        url : "<?=base_url('managemenu/ajax_update_akses/')?>",
        type: "POST",
        data:{
            id: id,
            permited_to: permited,
        },
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                window.location.reload();
                mySwalalert('Berhasil Menyimpan Data', 'success');
            }

            $('#btnSave').text('Save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            mySwalalert('Gagal Menyimpan Data', 'error');
            $('#btnSave').text('Save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
}

function delete_data(id, user)
{

    Swal.fire({
            title: 'Anda Yakin ?',
            html: "Data yang di hapus, tidak dapat di pulihkan",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!'
    }).then((result) => {
        if (result.value) {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('managemenu/ajax_delete_akses') ?>/"+id,
                type: "POST",
                data:{
                    permited_to: user,
                },
                dataType: "JSON",
                success: function(data)
                {
                    //if success reload ajax table
                    window.location.reload();
                    mySwalalert('Berhasil Menghapus Data', 'success');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    mySwalalert('Gagal Menghapus Data', 'error');
                }
            });
        }
    })
}
//Initialize Select2 Elements
$('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
    theme: 'bootstrap4'
})
</script>