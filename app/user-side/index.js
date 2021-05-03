
$(".dark-bg").hide();
$("#navigation").hide();
$("#navigation div,#navigation b").hide();

$(document).ready(function () {
    getPage("home");
});

$(document).on("click", ".toggle-navigation", function () {
    $("#menu span").fadeToggle();
    $(".dark-bg").fadeToggle(400);
    $("#navigation div,#navigation b").fadeToggle(800);
    $("#navigation").slideToggle(200);
});

$(document).on("click", "#test", function () {

});
$(document).on("click", ".web-menu-links p,#logo", function () {
    var page = $(this).attr("data-page");
    
    getPage(page);
});

function getPage(page) {
    var page_url = "app/user-side/" + page + "/" + page + ".php";
    console.log(page + " -> " + page_url);

    $.ajax({
        url: page_url,
        data: {data:"data"},
        dataType: "html",
        success: function (response) {
            loadHtml(page);
            $("#content").html(response);
        },
        error: function (response) {
            console.log(page + " == error");
            console.log(response);
        }
    });
}

function loadHtml(page) {
    $.ajax({
        url: "app/user-side/" + page + "/" + page + ".action.php",
        data: {act:"get_posts",post_limit:10},
        dataType: "json",
        success: function (data) {
            $("#"+page).html(data.content);
            console.log(data);
        }
    });
}