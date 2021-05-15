
$(".dark-bg").hide();
$("#navigation").hide();
$("#navigation div,#navigation p").hide();
const ValidMail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

$(document).ready(function () {
    getPage("home");
});

$(document).on("click", ".toggle-navigation", function () {
    $("#menu span").fadeToggle();
    $(".dark-bg").fadeToggle(400);
    $("#navigation div,#navigation p").fadeToggle(300);
    $("#navigation").slideToggle(100);
});

$(document).on("click", "#navigation p", function () {
    
    // make title in header
    $("#page-titlee").html($(this).html());

    var choosenForMobileVal = $(this).html();
    var choosenForMobileAttr = $(this).attr("data-page");

    var tmpVal = $("#navigation p:first-child").html();
    var tmpAttr = $("#navigation p:first-child").attr("data-page");

    $("#choosen-pagee").html(choosenForMobileVal);
    $("#choosen-pagee").attr("data-page", choosenForMobileAttr);
    
    $(this).html(tmpVal);
    $(this).attr("data-page",tmpAttr);
    
    // page navigation
    var page =  $("#navigation p:first-child").attr("data-page");
    getPage(page);
    
    // close navigation
    $("#menu span").fadeToggle();
    $(".dark-bg").fadeToggle(400);
    $("#navigation div,#navigation p").fadeToggle(100);
    $("#navigation").slideToggle(200);
});

$(document).on("click", ".web-menu-links p,#logo,#Mlogo", function () {
    var page = $(this).attr("data-page");
    $(".web-menu-links p").removeClass("active-page")
    $(this).toggleClass("active-page");
    getPage(page);
});

function getPage(page) {
    var page_url = "app/user-side/" + page + "/" + page + ".php";

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
        data: {act:"get_posts"},
        dataType: "json",
        success: function (data) {
            $("#"+page).html(data.content);
        }
    });
}