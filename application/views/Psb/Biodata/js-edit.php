
<script src="<?= base_url(); ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {
    
    // Get Provinsi
    $.ajax({
        type: "GET",
        url: '<?= psb_url('wilayah/ajax_prov'); ?>',
        async : true,
        dataType : 'json',
        success: function (data) {
            var html = '<option value="">Pilih Provinsi</option>';
            var i;
            for(i=0; i<data.length; i++){
                html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
            }
            $('#provinsi').html(html);
        }
    });
    
    // Get Kabupaten
    $('#provinsi').on('change', function() {
        $.ajax({
            type: "GET",
            url: '<?= psb_url('wilayah/ajax_kabupaten/'); ?>'+this.value,
            async : true,
            dataType : 'json',
            success: function (data) {
                var html = '<option value="">Pilih Kabupaten</option>';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                }
                $('#kabupaten').html(html);
            }
        });
    });

    // Get Kecamatan
    $('#kabupaten').on('change', function() {
        $.ajax({
            type: "GET",
            url: '<?= psb_url('wilayah/ajax_kecamatan/'); ?>'+this.value,
            async : true,
            dataType : 'json',
            success: function (data) {
                var html = '<option value="">Pilih Kecamatan</option>';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                }
                $('#kecamatan').html(html);
            }
        });
    });

    // Get Desa
    $('#kecamatan').on('change', function() {
        $.ajax({
            type: "GET",
            url: '<?= psb_url('wilayah/ajax_desa/'); ?>'+this.value,
            async : true,
            dataType : 'json',
            success: function (data) {
                var html = '<option value="">Pilih Desa</option>';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                }
                $('#desa').html(html);
            }
        });
    });


    $('#status_ayah').change(function(){
        if($(this).val() == 'meninggal'){
            $('#status_ayah_result').addClass('d-none');
            $('#pekerjaan_ayah').val('-');
            $('#penghasilan_ayah').val('0');
            $('#pendidikan_ayah').val('-');
            $('#no_telepon_ayah').val('0');
        } else {
            $('#status_ayah_result').removeClass('d-none');
            $('#pekerjaan_ayah').val('');
            $('#penghasilan_ayah').val('');
            $('#pendidikan_ayah').val('');
            $('#no_telepon_ayah').val('');
        }
    });

    $('#status_ibu').change(function(){
        if($(this).val() == 'meninggal'){
            $('#status_ibu_result').addClass('d-none');
            $('#pekerjaan_ibu').val('-');
            $('#penghasilan_ibu').val('0');
            $('#pendidikan_ibu').val('-');
            $('#no_telepon_ibu').val('0');
        } else {
            $('#status_ibu_result').removeClass('d-none');
            $('#pekerjaan_ibu').val('');
            $('#penghasilan_ibu').val('');
            $('#pendidikan_ibu').val('');
            $('#no_telepon_ibu').val('');
        }
    });
});

function cari_data()
{
    var val_cari = $('#val_cari').val();
    var berdasarkan = $('#berdasarkan').val();
    $.ajax({
        url : "<?php echo site_url('editbiodata/get') ?>/"+berdasarkan+"/"+val_cari,
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
            url: '<?= base_url('editbiodata/update'); ?>',
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

