$('.ubah').click(function () {
    $('.modal-detail').modal('hide');
});

$('.btn-deletes').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Apakah Anda Yakin?',
        text: "Data Ini Akan Dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus Data!'
    }).then((result) => {
        if (result.value) {

            document.location.href = href;

        }
    })
})

document.querySelector(".btn-logout").addEventListener('click', function (e) {
    e.preventDefault();
    swal({
        title: "Wanna Logout?",
        type: "info",
        showCancelButton: true,
        confirmButtonText: "Logout",
        confirmButtonColor: "#ff4242",
        cancelButtonColor: "#999999",
        reverseButtons: true,
        focusConfirm: false,
        focusCancel: true
    }).then(function (result) {
        if (result.value == true) {
            document.location.href = "/logout";
        }
    })
});
