
var inc = 0;

$(".Carousel-container .mySlides").hide();
$(".Carousel-container .mySlides[data-id=0]").show();

$(document).on("click",".Carousel-container .prevBut",function(){
    var post_id = $(this).attr("slide-id");

    var last = $(".Carousel-container .mySlides[slide-id = "+post_id+"]").length;
    
    inc--;
    if(inc < 0){
        inc = last-1;
    }
    $(".Carousel-container .mySlides[slide-id = "+post_id+"]").hide();
    $(".Carousel-container .mySlides[data-id="+inc+"][slide-id = "+post_id+"]").show();
    
});

$(document).on("click",".Carousel-container .nextBut",function(){
    var post_id = $(this).attr("slide-id");

    var last = $(".Carousel-container .mySlides[slide-id = "+post_id+"]").length;
    
    inc++;
    if(inc > last-1){
        inc = 0;
    }
    
    $(".Carousel-container .mySlides[slide-id = "+post_id+"]").hide();
    $(".Carousel-container .mySlides[data-id="+inc+"][slide-id = "+post_id+"]").show();
    
});

// // // description dropdown version
$(document).on("click",".blog_see_more",function(){
    var post_id = $(this).attr("see-id");

    if ($(".blogs-boxes[slide-id = "+ post_id +"] > .blog_see_more[see-id = "+ post_id +"]").html() == "weniger...") 
        $(".blogs-boxes[slide-id = " + post_id + "] > .blog_see_more[see-id = "+ post_id +"]").html("mehr...");
    else 
        $(".blogs-boxes[slide-id = " + post_id + "] > .blog_see_more[see-id = "+ post_id +"]").html("weniger...");
        
    $(".blog_text[see-id = "+ post_id +"]").toggleClass("blog_see_more_height");
});


// show up blog post pop up
$(document).on("click", ".text > h1,.text > h2", function () {
    var bodyhtml = "...";
    var title = $(this).attr("data-title");
    bodyhtmlID = $(this).attr("data-html-id");
    $("#detail_post > #detail_title").html(title);

    param = new Object();
    param.act = "post_details";
    param.post_id = bodyhtmlID;

    $.ajax({
        url: "app/user-side/blog/blog.action.php",
        data: param,
        dataType: "json",
        success: function (html) {
            $("#detail_body").html(html.content);
            $("#detail_body").addClass("ck ck-content ck-editor__editable ck-rounded-corners ck-editor__editable_inline ck-blurred");
            $("#detail_body").attr("lang","de");
            $("#detail_body").attr("dir","ltr");
            $("#detail_body").attr("role","textbox");
            $("#detail_body").attr("lang","de");
            $("#detail_post").show();
        }
    });
});
$(document).on("click", "#detail_post > #detail_close", function () {
    $("#detail_post").hide();
});