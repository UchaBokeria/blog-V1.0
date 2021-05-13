
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

function loadAdminHtml(page,data=null) {
    $.ajax({
        url: "app/admin-side/" + page + "/" + page + ".action.php",
        data: {act:"get_posts",data:JSON.stringify(data)},
        dataType: "json",
        success: function (data) {
            $("#"+page).html(data.content);
        }
    });
}

