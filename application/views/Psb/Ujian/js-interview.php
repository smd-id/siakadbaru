
<script src="<?= base_url(); ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {
    
    
});


function cari_data()
{
    var val_cari = $('#val_cari').val();
    var berdasarkan = $('#berdasarkan').val();
    $.ajax({
        url : "<?php echo site_url('ujianlisan/get') ?>/"+berdasarkan+"/"+val_cari,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
            if (data.s_step_3 == "1"){
                mySwalalert('Sudah Pernah Ikut Step Ini', 'warning');
                $('#identitas').addClass('d-none');
                $('#soal').addClass('d-none');
                $('#form_wawancara')[0].reset();
            } else {
                $('#identitas').removeClass('d-none');
                $('#soal').removeClass('d-none');
    
                var html = '';
                $.each(data,function(key,value){
                    var keys_id = "#"+key;
                    $(keys_id).val(value);
                });
            }

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            $('#identitas').addClass('d-none');
            $('#soal').addClass('d-none');
            $('#form_wawancara')[0].reset();
            mySwalalert('Gagal Mendapatkan Data / Tidak Lulus ADM', 'error');
        }
    });
    
}

function save()
{
    $('#form_wawancara').validate({
        highlight: function (element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element) {
            $(element).removeClass('is-invalid');
        }
    });
    if($('#form_wawancara').valid()){
        
        var jsonObj = $('#form_wawancara').serialize();
        
        $.ajax({
            type: "POST",
            url: '<?= base_url('ujianlisan/update'); ?>',
            data: jsonObj,
            beforeSend: function() {
                $('#btnsave').text('Saving...'); //change button text
                $('#btnsave').attr('disabled',true); //set button disable
            },
            success: function (data,status,xhr) {

                mySwalalert('Berhasil Menyimpan Data', 'success');

                $('#val_cari').val('');
                
                $('#btnsave').text('Save');
                $('#btnsave').attr('disabled',false);
                
                $('#identitas').addClass('d-none');
                $('#soal').addClass('d-none');

                $('#form_wawancara')[0].reset();

            },
            error: function(xhr, status, error) {
                mySwalalert('Gagal Menyimpan Data', 'error');
                
                $('#val_cari').val('');
                
                $('#btnsave').text('Save');
                $('#btnsave').attr('disabled',false);

            }
        });
    }else{
        mySwalalert('Periksa Kembali Form Biodata anda, ada yang belum lengkap', 'info');
    }
    return false;
    
}
</script>

