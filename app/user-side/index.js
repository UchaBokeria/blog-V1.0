
$(".dark-bg").hide();
$("#navigation").hide();

$(document).ready(function () {
});

$(document).on("click", ".toggle-navigation", function () {
    $("#menu span").fadeToggle();
    $(".dark-bg").fadeToggle(400);
    $("#navigation").slideToggle(200);
});
