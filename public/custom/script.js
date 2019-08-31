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