<script>

$(document).ready( function () {
    $.ajax({
            url : "<?php echo base_url('auth/getMyData/'); ?>",
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('#fullname').html(data.result.name);
                $('#honda_id').html(data.result.honda_id);
                $('#inisial').html(data.result.inisial);
                $('#whatsapp').val(data.result.whatsapp);
                $('#profile_picture').val(data.result.profile_picture);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                mySwalalert('Gagal Mendapatkan Data', 'info');
            }
        }); 
});
</script>