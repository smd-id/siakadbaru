//SweetAlert Versi JS
function mySwalalert(msg, typ) {

    if (typ == "success") {
        Swal.fire({
            title: "Berhasil",
            html: msg,
            icon: typ,
            timer: 3000,
            showCancelButton: false,
            showConfirmButton: false

        });
    } else if (typ == "info") {
        Swal.fire({
            title: "Info",
            html: msg,
            icon: typ,
            timer: 3000,
            showCancelButton: false,
            showConfirmButton: false

        });
    } else if (typ == "error") {
        Swal.fire({
            title: "Error / Gagal",
            html: msg,
            icon: typ,
            timer: 3000,
            showCancelButton: false,
            showConfirmButton: false

        });
    } else if (typ == "warning") {
        Swal.fire({
            title: "Peringatan",
            html: msg,
            icon: typ,
            timer: 3000,
            showCancelButton: false,
            showConfirmButton: false

        });
    } else if (typ == "notifwa") {
        Swal.fire({
            title: 'Ada Pesan Whatsapp Baru',
            html: '<p>Silahkan Periksa <i class="fab fa-whatsapp"></i> Whatsapp Web Dealer',
            icon: 'question',
            showCancelButton: true,
            showConfirmButton: false,
            cancelButtonColor: '#d33',
            cancelButtonText: `Close Notification`,
        });
    }
}