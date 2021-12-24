<script>
    $( document ).ready(function() {
        $.ajax({
            url : "<?php echo site_url('settingpsb/data') ?>",
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $.each(data,function(key,value){
                    var keys_id = "#"+key;
                    $(keys_id).val(value); 
                });
                
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                mySwalalert('Gagal Mendapatkan Data', 'info');
            }
        });
    });

    function updateData()
    {
        
        Swal.fire({
            title: 'Anda Yakin ?',
            html: "Merubah data sekolah dan tidak dapat di pulihkan",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.value) {
                    // ajax Update data to database
                    $.ajax({
                        url : "<?php echo site_url('settingpsb/update') ?>",
                        type: "POST",
                        data: $('#data_psb').serialize(),
                        dataType: "JSON",
                        success: function(data)
                        {
                            mySwalalert('Berhasil Memperbaharui Data', 'success');
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            mySwalalert('Gagal Memperbaharui Data', 'error');
                        }
                    });
                }
            })

        
        
    }
</script>