
// Script Datatable Non AJAX
$(function () {
    $('#dataTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true
    });
});

$(function () {
    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
});

function showOLDPassword() {
    var x = document.getElementById("passwordlama");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
};

function showNEWPassword() {
    var x = document.getElementById("passwordbaru");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
};

