function checkScroll(){
    var startY = $('.navbar').height() * 2; //The point where the navbar changes in px

    if($(window).scrollTop() > startY){
        $('.navbar').removeClass("bg-transparent");
        $('.navbar').addClass("bg-black");
    }else{
        $('.navbar').addClass("bg-transparent");
        $('.navbar').removeClass("bg-black");
    }
}

if($('.navbar').length > 0){
    $(window).on("scroll load resize", function(){
        checkScroll();
    });
}

function search() {
    // Declare variables
    var input, filter, tr, td, i, txtValue;
    input = document.getElementById("cari");
    filter = input.value.toUpperCase();
    table = document.getElementById("tableMenu");
    modal = document.getElementsByClassName("modal-detail");
    tr = table.getElementsByClassName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("div")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
