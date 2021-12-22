<script>
    $( document ).ready(function() {
        $.ajax({
            url : "<?php echo site_url('managesekolah/data') ?>",
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
    
                $('#nama_portal').val(data.nama_portal);
                $('#versi_portal').val(data.versi_portal);
                $('#nama_sekolah').val(data.nama_sekolah);
                $('#npsn').val(data.npsn);
                $('#kepala_sekolah').val(data.kepala_sekolah);
                $('#tahun_ajaran').val(data.tahun_ajaran);
                $('#alamat_sekolah').val(data.alamat_sekolah);
                $('#email_sekolah').val(data.email_sekolah);
                $('#fb_sekolah').val(data.fb_sekolah);
                $('#ig_sekolah').val(data.ig_sekolah);
                $('#web_sekolah').val(data.web_sekolah);
    
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
                        url : "<?php echo site_url('managesekolah/update') ?>",
                        type: "POST",
                        data: $('#data_sekolah').serialize(),
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