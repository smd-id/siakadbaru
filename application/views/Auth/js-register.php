<script>
    $('#username').change(function(){ 
        var username = $(this).val();
        $.ajax({
            url : "<?= base_url('auth/checkuser/');?>"+username,
            method : "GET",
            async : true,
            success: function(data){
                const obj = JSON.parse(data);
                var sts = obj.status;
                if (sts == false){
                    mySwalalert('Username Sudah Terdaftar', 'error');
                    $(this).addClass('is-invalid');
                    $(this).val('');
                } else if (sts == true){
                    $(this).removeClass('is-invalid');
                    $(this).addClass('is-valid');
                }
                
            }
        });
        return false;
    });
</script>