$('.ubah').click(function () {
    $('#exampleModalMenu').modal('hide');
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
