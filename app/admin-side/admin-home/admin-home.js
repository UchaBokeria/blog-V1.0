
$(document).on("click", "#show_post_types", function () {
    $(".post-type-select").toggleClass("dropdown-select-type");
    $("#show_post_types").toggleClass("dropdown-select-type-button");
});

$(document).on("click", ".show_more", function () {

    tmp = $(this).attr("data-id");

    $('.exhibition-posts[data-id="' + tmp + '"]').toggleClass('exhibition-posts-click');
    $('.post_body[data-id="' + tmp + '"]').toggle();
    $(this).toggleClass("rotate");
});

$(document).on("click", ".close-ajax-edit", function () {
    $('.edit-window-ajax').hide();
});

$(document).on("click", "#close-edit", function () {
    $('.edit-window').hide();
});

$(document).on("click", ".edit", function () {
    tmp = $(this).attr("data-id");
    $('.edit-window-ajax[data-id="' + tmp + '"]').show();
});

$(document).on("click", ".edit_post_types", function () {
    $(this).toggleClass("rotate");
    $(".edit-post-type-select").toggleClass('edit-post-type-select-active');
});

$(document).on("click", "#create_new", function () {
    $(".edit-window").show();
});

