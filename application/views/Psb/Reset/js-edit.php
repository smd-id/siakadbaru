
<script src="<?= base_url(); ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {
    
});

function cari_data()
{
    var val_cari = $('#val_cari').val();
    var berdasarkan = $('#berdasarkan').val();
    $.ajax({
        url : "<?php echo site_url('resetpass/get') ?>/"+berdasarkan+"/"+val_cari,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
            $('#form_card').removeClass('d-none');            
            
            $.each(data,function(key,value){
                var keys_id = "#"+key;
                $(keys_id).val(value);
            });           

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            $('#form_card').addClass('d-none');            
            $('#form_biodata')[0].reset();
            mySwalalert('Gagal Mendapatkan Data', 'error');
        }
    });
    
}

function save()
{
    $('#form_biodata').validate({
        highlight: function (element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element) {
            $(element).removeClass('is-invalid');
        }
    });
    if($('#form_biodata').valid()){
        
        var jsonObj = $('#form_biodata').serialize();
        
        $.ajax({
            type: "POST",
            url: '<?= base_url('resetpass/update'); ?>',
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
                $('#form_card').addClass('d-none');                
                $('#form_biodata')[0].reset();

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

