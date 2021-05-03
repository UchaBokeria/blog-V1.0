
$(document).ready(function () {
    getAdminPage("admin-home");
});

$(document).on("click", "#head p", function () {
    var page = $(this).attr("data-page");
    $('#head p').removeClass('active-page');
    $(this).addClass('active-page');
    getAdminPage(page);
});

function getAdminPage(page) {
    var page_url = "app/admin-side/" + page + "/" + page + ".php";
    console.log(page + " -> " + page_url);

    $.ajax({
        url: page_url,
        data: {data:"data"},
        dataType: "html",
        success: function (response) {
            loadAdminHtml(page);
            $("#admin-content").html(response);
        },
        error: function (response) {
            console.log(page + " == error");
            console.log(response);
        }
    });
}

function loadAdminHtml(page) {
    $.ajax({
        url: "app/admin-side/" + page + "/" + page + ".php",
        data: {act:"get_posts",post_limit:10},
        dataType: "json",
        success: function (data) {
            $("#"+page).html(data.content);
            console.log(data);
        }
    });
}