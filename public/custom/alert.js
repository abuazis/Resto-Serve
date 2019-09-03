$('.ubah').click(function () {
    $('.modal-detail').modal('hide');
});

var el = document.querySelector(".btn-deletes");
if(el){
    el.addEventListener('click', function (e) {
        e.preventDefault();
        swal({
            title: "Are You Sure?",
            type: "info",
            showCancelButton: true,
            confirmButtonText: "Delete It",
            confirmButtonColor: "#ff4242",
            cancelButtonColor: "#999999",
            reverseButtons: true,
            focusConfirm: false,
            focusCancel: true
        },
        function (isConfirm) {
            if(isConfirm) {
                $('.btn-deletes').trigger('click', {});
            }
        });
    });
}

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
        if(result.value == true) {
            document.location.href = "/logout";
        }
    })
});
