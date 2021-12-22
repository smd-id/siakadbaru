<script>
    $(document).ready(function() {
        $.ajax({
            type:'GET',
            dataType:'json',
            url:'<?=base_url().'home/getinfo'; ?>',
            success:function(result){
                $.each(result, function(index, value) {
                    var barInfo = '<div class="callout callout-success"><h5>'+value.title+'</h5><p>'+value.information+'</p><span class="small">'+value.updated_at+'</span></div>';
                    $('#result_info').append(barInfo);
                });
            },error:function(err){
                $('#result_info').append('<p>Tidak Ada Informasi</p>');
            }
        });
    });
</script>