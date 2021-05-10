
var inc = 0;

$(".mySlides").hide();
$(".mySlides[data-id="+inc+"]").show();

$(document).on("click",".nextBut", function(){
    var post_id = $(this).attr("slide-id");

    var last = $(".mySlides[slide-id = "+post_id+"]").length;
    inc--;
    if(inc < 0){
        inc = last-1;
    }
    $(".mySlides[slide-id = "+post_id+"]").hide();
    $(".mySlides[data-id="+inc+"][slide-id = "+post_id+"]").show();
    
});

$(document).on("click",".prevBut",function(){
    var post_id = $(this).attr("slide-id");

    var last = $(".mySlides[slide-id = "+post_id+"]").length;
    
    inc++;
    if(inc > last-1){
        inc = 0;
    }
    
    $(".mySlides[slide-id = "+post_id+"]").hide();
    $(".mySlides[data-id="+inc+"][slide-id = "+post_id+"]").show();
    
});
function slide(){
    $(".mySlides").hide();
}

$(document).on("click",".see_more",function(){
    var post_id = $(this).attr("see-id");
    console.log(post_id);
    $(".text[see-id = "+ post_id +"]").toggleClass("see_more_height");
});
