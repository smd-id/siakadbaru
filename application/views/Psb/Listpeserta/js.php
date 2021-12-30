
<script type="text/javascript">

function show_file(nik)
{
    $.ajax({
        url : "<?php echo site_url('listpeserta/ajax_get') ?>/"+nik,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
            $('#nik_form').val(nik);
            $('#modal_file').modal('show');
            $('#name_and_nik').html(data.result.nama+" - "+nik);
            
            var html = '';
            $.each(data.file,function(key,value){
                var keys_id = "#file_"+key;

                var path = key+"/"+value;

                if (value == ''){
                    html = "<span class='badge badge-danger'>Tidak Upload</span>";
                } else {
                    html = "<a href='#' data-id='"+path+"' class='btn btn-sm btn-success' onclick='viewFile(this)'> Preview</a>";
                }
                
                $(keys_id).html(html);
            });

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            mySwalalert('Gagal Mendapatkan Data', 'error');
        }
    });
    
}

function show_biodata(nik)
{
    $.ajax({
        url : "<?php echo site_url('listpeserta/ajax_get') ?>/"+nik,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
            $('#modal_biodata').modal('show');
            
            $.each(data.result, function( key, value ) {
                var keys = "#"+key;
                $(keys).html(value);
            });

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            mySwalalert('Gagal Mendapatkan Data', 'error');
        }
    });
    
}

function viewFile(d)
{
    var path = d.getAttribute("data-id");
    var url = "https://psb.ruhulislam.com/uploads/"+path;

    newwindow=window.open(url,'View File','height=720,width=1280,screenX=400,screenY=350');
        if (window.focus) {newwindow.focus()}
    return false;

}

function show_struk(file)
{
    var url = "<?= psb_url('uploads/struk/'); ?>"+file;
    newwindow=window.open(url,'View File','height=720,width=1280,screenX=400,screenY=350');
        if (window.focus) {newwindow.focus()}
    return false;

}
</script>

