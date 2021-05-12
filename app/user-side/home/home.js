var inc = 0;

$(".home-Carousel-container .mySlides").hide();
$(".home-Carousel-container .mySlides[data-id=0]").show();

$(document).on("click",".home-Carousel-container .nextBut", function(){
    var post_id = $(this).attr("slide-id");
    var last = $(".home-Carousel-container .mySlides[slide-id = "+post_id+"]").length;
    inc--;
    if(inc < 0){
        inc = last-1;
    }

    $(".home-Carousel-container .mySlides[slide-id = "+post_id+"]").hide();
    $(".home-Carousel-container .mySlides[data-id="+inc+"][slide-id = "+post_id+"]").show();
});

$(document).on("click",".home-Carousel-container .prevBut",function(){
    var post_id = $(this).attr("slide-id");
    var last = $(".home-Carousel-container .mySlides[slide-id = "+post_id+"]").length;
    inc++;
    if(inc > last-1){
        inc = 0;
    }
    
    $(".home-Carousel-container .mySlides[slide-id = "+post_id+"]").hide();
    $(".home-Carousel-container .mySlides[data-id="+inc+"][slide-id = "+post_id+"]").show();
});

$(document).on("click",".see_more",function(){
    var post_id = $(this).attr("see-id");
    $(".text[see-id = "+ post_id +"]").toggleClass("see_more_height");
});
