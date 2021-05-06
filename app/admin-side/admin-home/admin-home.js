
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

$(document).on("click", "#edit_post_types", function () {
    $(this).toggleClass("rotate");
    $(".edit-post-type-select").toggleClass('edit-post-type-select-active');
});

$(document).on("click", ".close-ajax-edit,.cancel-button", function () {
    $("#edit-window").html("");
    $("#edit-window").hide();
});

$(document).on("click", ".edit", function () {
    var id = $(this).attr("data-id");

    param = new Object();
    param.act = "get_edit";
    param.id = id;

    $.ajax({
        url: "app/admin-side/admin-home/admin-home.action.php",
        data: { act: "get_new" },
        dataType: "json",
        success: function (data) {
            $("#edit-window").html(data.content);
            $("#edit-window").show();

            // ckeditor
            DecoupledEditor.create( document.querySelector( '.editor-body' ) )
                .then( editor => {
                    const toolbarContainer = document.querySelector( '.editor-head' );
                    toolbarContainer.appendChild( editor.ui.view.toolbar.element );
                } )
                .catch( error => {
                    console.error( error );
                } );
        },
        error: function () {
            console.log("edit error");
        }
    });
    
});

$(document).on("click", "#create_new", function () {
    $.ajax({
        url: "app/admin-side/admin-home/admin-home.action.php",
        data: { act: "get_new" },
        dataType: "json",
        success: function (data) {
            $("#edit-window").html(data.content);
            $("#edit-window").show();

            // ckeditor
            DecoupledEditor.create( document.querySelector( '.editor-body' ) )
                .then( editor => {
                    const toolbarContainer = document.querySelector( '.editor-head' );
                    toolbarContainer.appendChild( editor.ui.view.toolbar.element );
                } )
                .catch( error => {
                    console.error( error );
                } );
        },
        error: function () {
            console.log("edit error");
        }
    });
});

