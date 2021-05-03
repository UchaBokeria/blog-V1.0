$(document).on("click", "#blog_show_post_types", function () {
    $(".post-type-select").toggleClass("dropdown-select-type");
    $("#blog_show_post_types").toggleClass("dropdown-select-type-button");
});

$(document).on("click", "#blog_show_more", function () {
    $(".exhibition-posts").toggleClass('exhibition-posts-click');
    $(this).toggleClass("rotate");
});

$(document).on("click", "#blog_close-edit", function () {
    $(".edit-window").hide();
});

$(document).on("click", "#blog_edit", function () {
    $(".edit-window").show();
});

$(document).on("click", "#blog_edit_post_types", function () {
    $(this).toggleClass("rotate");
    $(".edit-post-type-select").toggleClass('edit-post-type-select-active');
});

$(document).on("click", "#blog_create_new", function () {
    $(".edit-window").show();
});
