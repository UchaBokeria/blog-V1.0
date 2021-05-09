$('#toggle_info1').click(function () {
    $('.toggle1').fadeToggle(100);
    $("#toggle_info1").toggleClass("rotate");
});
$(document).on("click", ".toggle_info", function () {
    var toggle_id = $(this).attr("data-id");
    $('.toggle[data-id="'+toggle_id+'"]').toggle(100);
    $('.toggle_info[data-id="'+toggle_id+'"]').toggleClass("rotate");
});

$('#web-toggle_info').click(function () {
    $('.toggle-web').fadeToggle(100);
    $("#web-toggle_info").toggleClass("rotate");
});

$('#web-toggle_info1').click(function () {
    $('.toggle-web1').fadeToggle(100);
    $("#web-toggle_info1").toggleClass("rotate");
});
