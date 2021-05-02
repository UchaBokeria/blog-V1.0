
$(".dark-bg").hide();
$("#navigation").hide();
$("#navigation div,#navigation b").hide();

$(document).ready(function () {
});

$(document).on("click", ".toggle-navigation", function () {
    $("#menu span").fadeToggle();
    $(".dark-bg").fadeToggle(400);
    $("#navigation div,#navigation b").fadeToggle(800);
    $("#navigation").slideToggle(200);
});
