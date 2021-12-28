<script>
function makeUL(lst) {
    var html = [];
    html.push('<ol class="dd-list">');

    $(lst).each(function() {
    	html.push(makeLI(this))
    });

    html.push('</ol>');
    return html.join("\n");
}

function makeLI(elem) {
    var html = [];
    html.push('<li class="dd-item" data-id="'+elem.id+'">');

    if (!jQuery.isEmptyObject(elem.child))
		html.push('<button data-action="collapse" type="button" style="display: block;">Collapse</button>')
        html.push('<button data-action="expand" type="button" style="display: none;">Expand</button>')
        html.push('<a href="javascript:void(0)" class="btn btn-xs btn-danger" style="display: block; float: right; position: relative; margin-top: 8px; margin-right:5px;" onclick="delete_data(' + elem.id + ')"><i class="fas fa-trash"></i> Delete</a> <a href="javascript:void(0)" class="btn btn-xs btn-primary" style="display: block; float: right; position: relative; margin-top: 8px; margin-right:5px;" onclick="edit_data(' + elem.id + ')"><i class="fas fa-pen"></i> Edit</a> <a href="'+'<?=base_url('managemenu/setakses/');?>' + elem.id +'" class="btn btn-xs btn-success" style="display: block; float: right; position: relative; margin-top: 8px; margin-right:5px;"><i class="fas fa-key"></i> Akses</a>')
        html.push('<div class="dd-handle">'+'<i class="'+elem.icon+'"></i> ' + elem.menu + '</div>');

    if (!jQuery.isEmptyObject(elem.child))
        html.push(makeUL(elem.child));
    html.push('</li>');
    return html.join("\n");
}

var subIndicTreeObj = [];

function findLiChild($obj, parentId) {
    $obj.find('> ol > li').each(function(index1, value1) {
        subIndicTreeObj.push({
            'id': $(this).attr('data-id'),
            'parent_id': parentId
        });

        findOlChild($(this));
    });
}

function findOlChild($obj) {
    if ($obj.has('ol').length > 0) {
        findLiChild($obj, $obj.attr('data-id'));
    }
}

$(function() {
	$('.dd').nestable();
    $.ajax({
        type: "POST",
        url: "<?= base_url('managemenu/getAjaxmenu/'); ?>",
        data: {},
        cache: false,
        dataType:"json",
        success: function(result){
            $(".dd").html(makeUL(result));
        },
        error: function(jqXHR, textStatus, errorThrown) {
            mySwalalert('Gagal Mendapatkan Data', 'info');
}
	});

	$('.btn-save').on('click', function (e) {
        subIndicTreeObj = [];
        var btnSave = $(this);
        findOlChild($('#nestable'));
        e.preventDefault();
        $(this).attr('disabled', true);
        $(this).html('<i class="fas fa-spinner fa-spin"></i>');
        $.ajax({
            type:"POST",
            url: "<?= base_url('managemenu/updatesequenceAjaxmenu/'); ?>",
            data:{data:subIndicTreeObj},
            success:function(data){
                if(data.success === true){
                    btnSave.attr('disabled', false);
                    btnSave.html('<i class="fa fa-save"></i> Save');
                    mySwalalert('Berhasil Memperbaharui Posisi', 'success');
                }
            },
            error:function(jqXHR, textStatus, errorThrown){
                mySwalalert('Gagal Menyimpan Perubahan', 'error');
                btnSave.attr('disabled', false);
                btnSave.html('Save');
            }
        });
    });
});

// Script ADD EDIT AKSES DAN DELETE

function add_data(){
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Menu'); // Set Title to Bootstrap modal title
    $('#select_parent').removeClass('d-none'); //set disable
}

function edit_data(id){
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?= base_url('managemenu/ajax_edit/'); ?>" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="menu"]').val(data.menu);
            $('[name="url"]').val(data.url);
            $('[name="icon"]').val(data.icon);
            $('[name="menu_parent_id"]').val(data.menu_parent_id);
            $('[name="status"]').val(data.status);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Data'); // Set title to Bootstrap modal title
            $('#select_parent').addClass('d-none'); //set disable
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            mySwalalert('Gagal Mendapatkan Data', 'info');
        }
    });
}

function delete_data(id)
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
                url : "<?= site_url('managemenu/ajax_delete'); ?>/"+id,
                type: "POST",
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

function save()
{
    $('#btnSave').text('Saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'add') {
        url = "<?=base_url('managemenu/ajax_add');?>";
    } else {
        url = "<?=base_url('managemenu/ajax_update');?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
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

</script>
