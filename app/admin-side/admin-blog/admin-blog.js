var id = "empty";
var blog_img_arr = [];

$(document).ready(function(){

});


$(document).on("click", "#blog_create_new", function () {
    $.ajax({
        url: "app/admin-side/admin-blog/admin-blog.action.php",
        data: { act: "get_new" },
        dataType: "json",
        success: function (data) {
            $("#blog_edit-window").html(data.content);
            $("#blog_edit-window").show();
            var cb = function () { return (new Date()).getTime() }

            // ckeditor
            ClassicEditor.create(document.querySelector('.editor-body'), {
                    ckfinder: {
                        uploadUrl: 'handler.php'
                    },
                        toolbar: {
                            items: [
                                'heading',
                                '|',
                                'fontFamily',
                                'fontSize',
                                'fontColor',
                                'fontBackgroundColor',
                                'wproofreader',
                                'bold',
                                'italic',
                                'blockQuote',
                                'link',
                                'highlight',
                                'bulletedList',
                                'numberedList',
                                'horizontalLine',
                                'alignment',
                                '|',
                                'outdent',
                                'indent',
                                '|',
                                'imageUpload',
                                'insertTable',
                                'codeBlock',
                                'undo',
                                'redo'
                            ]
                        },
                        language: 'de',
                        image: {
                            resizeOptions: [
                                {
                                    name: 'resizeImage:original',
                                    label: 'Original',
                                    value: null
                                },
                                {
                                    name: 'resizeImage:50',
                                    label: '50%',
                                    value: '50'
                                },
                                {
                                    name: 'resizeImage:75',
                                    label: '75%',
                                    value: '75'
                                },
                                {
                                    name: 'resizeImage:25',
                                    label: '25%',
                                    value: '25'
                                },
                                {
                                    name: 'resizeImage:5',
                                    label: '5%',
                                    value: '5'
                                }
                            ],
                            toolbar: [
                                'resizeImage',
                                '|',
                                'imageTextAlternative',
                                '|',
                                'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight',
                                '|',
                                'linkImage'
                            ],
                            styles: [
                                'alignLeft', 'alignCenter', 'alignRight'
                            ],
                        },
                        table: {
                            contentToolbar: [
                                'tableColumn',
                                'tableRow',
                                'mergeTableCells'
                            ]
                        },
                        licenseKey: '',
                        
                        wproofreader: {
                            srcUrl: 'https://svc.webspellchecker.net/spellcheck31/wscbundle/wscbundle.js'
                    },
                })
                .then( editor => {
                    window.editor = editor;
                } )
                .catch( error => {
                    console.error( error );
                } );
            },
            error: function () {
                console.log(" CKE create error");
            }
    });
});

$(document).on("click", ".blog_edit,.blog_post-text > b", function () {
    id = $(this).attr("data-id");

    param = new Object();
    param.act = "get_edit";
    param.id = id;

    $.ajax({
        url: "app/admin-side/admin-blog/admin-blog.action.php",
        data: param,
        dataType: "json",
        success: function (data) {
            $("#blog_edit-window").html(data.content);
            $("#blog_edit-window").show();

            var cb = function () { return (new Date()).getTime() }

            // ckeditor
            ClassicEditor.create(document.querySelector('.editor-body'), {
                ckfinder: {
                    uploadUrl: 'handler.php'
                },
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'fontFamily',
                            'fontSize',
                            'fontColor',
                            'fontBackgroundColor',
                            'wproofreader',
                            'bold',
                            'italic',
                            'blockQuote',
                            'link',
                            'highlight',
                            'bulletedList',
                            'numberedList',
                            'horizontalLine',
                            'alignment',
                            '|',
                            'outdent',
                            'indent',
                            '|',
                            'imageUpload',
                            'insertTable',
                            'codeBlock',
                            'undo',
                            'redo'
                        ]
                    },
                    language: 'de',
                    image: {
                        resizeOptions: [
                            {
                                name: 'resizeImage:original',
                                label: 'Original',
                                value: null
                            },
                            {
                                name: 'resizeImage:50',
                                label: '50%',
                                value: '50'
                            },
                            {
                                name: 'resizeImage:75',
                                label: '75%',
                                value: '75'
                            },
                            {
                                name: 'resizeImage:25',
                                label: '25%',
                                value: '25'
                            },
                            {
                                name: 'resizeImage:5',
                                label: '5%',
                                value: '5'
                            }
                        ],
                        toolbar: [
                            'resizeImage',
                            '|',
                            'imageTextAlternative',
                            '|',
                            'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight',
                            '|',
                            'linkImage'
                        ],
                        styles: [
                            'alignLeft', 'alignCenter', 'alignRight'
                        ],
                    },
                    table: {
                        contentToolbar: [
                            'tableColumn',
                            'tableRow',
                            'mergeTableCells'
                        ]
                    },
                    licenseKey: '',
                    
                    wproofreader: {
                        srcUrl: 'https://svc.webspellchecker.net/spellcheck31/wscbundle/wscbundle.js'
                },
                })
                .then( editor => {
                    window.editor = editor;
                } )
                .catch( error => {
                    console.error( error );
                } );
            },
            error: function () {
                console.log("CKE edit error");
            }
    });
    
});

$(document).on("click", "#blog_edit_post_types", function () {
    $(this).toggleClass("blog_rotate");
    $(".blog_edit-post-type-select").toggleClass('blog_edit-post-type-select-active');
});
$(document).on("click", "#blog_edit_post_types-new", function () {
    $(this).toggleClass("blog_rotate");
    $(".blog_edit-post-type-select-new").toggleClass('blog_edit-post-type-select-active');
});

$(document).on("click", ".blog_edit-post-type-select > div", function () {
    var type_id = $(this).attr("data-type");
    var type_html = $(this).html();

    $(".blog_edit-post-type-select > div").removeAttr("id");
    var newChild = "<div data-type='" + type_id + "' id='blog_activated'>" + type_html + "</div>";
    $(".blog_edit-post-type-select").prepend(newChild);
    $(this).remove();
});
$(document).on("click", ".blog_edit-post-type-select-new > div", function () {
    var type_id = $(this).attr("data-type");
    var type_html = $(this).html();

    $(".blog_edit-post-type-select-new > div").removeAttr("id");
    var newChild = "<div data-type='" + type_id + "' id='blog_activated'>" + type_html + "</div>";
    $(".blog_edit-post-type-select-new").prepend(newChild);
    $(this).remove();
});

$(document).on("click", "#blog_delete_dialog_yes", function () {
    $("#blog_dialog").css("opacity", "0");
    $("#blog_dialog").html("");

    // delete if into the dialog pressed yes
    $.ajax({
        url: "app/admin-side/admin-blog/admin-blog.action.php",
        data: {act:"delete_post",id: id},
        dataType: "json",
        success: function (response) {
            if (response.error == "") {
                // remove from html
                $(".blog_exhibition-posts[data-id='" + id + "']").remove();

                $("#message").css("opacity","1");
                $("#message").html("Der Beitrag wurde erfolgreich bearbeitet");

                setTimeout( function() {$("#blog_message").css("opacity","0");},2000)
            }
        }
    });
});
    
$(document).on("click", "#blog_delete_dialog_no", function () {
    $("#blog_dialog").css("opacity", "0");
    $("#blog_dialog").html("");
});
    
$(document).on("click", ".blog_delete", function () {
    id = $(this).attr("data-id");
    $("#blog_dialog").css("opacity", "1");
    $.ajax({
        url: "app/admin-side/admin-blog/admin-blog.action.php",
        data: {act:"get_delete_dialog"},
        dataType: "json",
        success: function (data) {
            $("#blog_dialog").html(data.content);
        }
    });
});

$(document).on("click", "#message", function () {
    $("#message").css("opacity","0");
});

$(document).on("click", ".blog_save-button", function () {
    param = new Object();
    param.act = "edit_post";
    param.title = $("#blog_new_title").val();
    param.body = editor.getData();
    //param.desc = $("#asd").val();
    param.status_id = $(".blog_edit-post-type-select > #blog_activated").attr("data-type");
    param.category_id = 2; // exhebition is 1, blog = 2
    param.id = $(this).attr("id");
    
    $.ajax({
        url: "app/admin-side/admin-blog/admin-blog.action.php",
        type:"POST",
        data: param,
        success: function (response) {
            $("#blog_edit-window").html("");
            $("#blog_edit-window").hide();

            $("#message").css("opacity","1");
            $("#message").html("Ihr Beitrag wurde gespeichert");
            loadAdminHtml("admin-blog");
            setTimeout(function () { $("#message").css("opacity", "0"); }, 2000);
        }
    });    
    if (blog_img_arr == "" || blog_img_arr == null || blog_img_arr == undefined || blog_img_arr == false) {
    }
    else {
        $.ajax({
            url: "app/admin-side/admin-blog/admin-blog.action.php/?act=edit_post_img",
            data: { test: blog_img_arr, id: $(this).attr("id") },
            success: function (data) {
                blog_img_arr = null;
                blog_img_arr = [];
            }
        });
    }
});

$(document).on("click", ".blog_add-save-button", function () {
    param = new Object();
    param.act = "create_post";
    param.title = $("#blog_new_title").val();
    param.body = editor.getData();
    //param.desc = $("#asd").val();
    param.status_id = $(".blog_edit-post-type-select-new > #blog_activated").attr("data-type");
    param.category_id = 2; // exhebition is 1, blog = 2
    
    $.ajax({
        url: "app/admin-side/admin-blog/admin-blog.action.php",
        type:"POST",
        data: param,
        success: function (response) {
            $("#blog_edit-window").html("");
            $("#blog_edit-window").hide();

            $("#message").css("opacity","1");
            $("#message").html("Ihr Beitrag wurde gespeichert");
            loadAdminHtml("admin-blog");
            setTimeout(function () { $("#message").css("opacity", "0"); }, 2000);
        }
    });
    if (blog_img_arr == "" || blog_img_arr == null || blog_img_arr == undefined || blog_img_arr == false) {
    }
    else {
        $.ajax({
            url: "app/admin-side/admin-blog/admin-blog.action.php/?act=add_post_img",
            data: { test: blog_img_arr, title: param.title },
            success: function (data) {
                blog_img_arr = null;
                blog_img_arr = [];
            }
        });
    }
});

$(document).on("click", ".blog_close-ajax-edit,.blog_cancel-button", function () {
        $.ajax({
            url: "app/admin-side/admin-blog/admin-blog.action.php/?act=delete_tmp_folder",
            data:{path:blog_img_arr},
            type: "post",
            success: function (data) {
                blog_img_arr = null;
                blog_img_arr = [];
                $("#blog_edit-window").html("");
                $("#blog_edit-window").hide();
            }
        });
    
});

$(document).on("click", ".blog_show_more", function () {
    tmp = $(this).attr("data-id");

    $('.blog_exhibition-posts[data-id="' + tmp + '"]').toggleClass('blog_exhibition-posts-click');
    $('.blog_post_body[data-id="' + tmp + '"]').toggle();
    $(this).toggleClass("blog_rotate");
});

$(document).on("click", "#blog_show_post_types", function () {
    $(".blog_post-type-select").toggleClass("blog_dropdown-select-type");
    $("#blog_show_post_types").toggleClass("blog_dropdown-select-type-button");
});

$(document).on("click", ".blog_post-type-select > div", function () {
    var type_id = $(this).attr("data-type");
    var type_html = $(this).html();

    $(".blog_post-type-select > div").removeAttr("id");
    var newChild = "<div data-type='" + type_id + "' id='blog_activated'>" + type_html + "</div>";

    $(".blog_post-type-select").prepend(newChild);
    $(this).remove();
});

$(document).on("click", "#blog_filter", function () {
    params = new Object();
    params.searchWord = $("#blog_search_text").val();
    params.status = $(".blog_post-type-select #blog_activated").attr("data-type");
    params.start_date = $("#blog_start_date").val();
    params.end_date = $("#blog_end_date").val();
    loadAdminHtml("admin-blog",params);
});

$(document).on("click", ".blog_edit_img",function() {
    $(".blog_post_body_edit").hide();
    $(".blog_edit_upload_image").show();
});

$(document).on("click", ".blog_edit_desc",function() {
    $(".blog_post_body_edit").show();
    $(".blog_edit_upload_image").hide();
});

$(document).on("change","#blog_post_file",function (){
    var obj = new FormData();
    var files = $(this)[0].files;

    for(var i=0;i!=files.length;i++){
        obj.append('file[]',files[i]);    
    }
    var test = 0;
    $.ajax({
        url:"app/admin-side/admin-blog/admin-blog.action.php/?act=tmp_upload",
        type:"post",
        data:obj,
        dataType:"json",
        contentType: false,
        processData: false,
        success: function(data){
            $(".blog_images_output").append(data.content);
            $(".blog_counter").html(data.count);
            param = new Object();
            // param.tmp_file_names = JSON.stringify(data.tmp_upload);
            blog_img_arr.push(data.tmp_upload);
        }
    });

});

$(document).on("click",".blog_delete_image",function(){
    var del_id = $(this).attr("del-id");

    if(($(this).attr('data-type')) == 1){
        var dir = "../../../assets/uploads/"+$(this).attr('data-path');
        $.ajax({
            url:"app/admin-side/admin-blog/admin-blog.action.php/?act=delete_image",
            type:"post",
            data:{path:dir,id:1,name:$(this).attr('data-path')},
            success: function(data){
                ($(".blog_img_output_div[del-id = "+del_id+"]")).remove();
            }
        });

    }
    else{
        var dir = "../../../assets/uploads/tmp/"+$(this).attr('data-path');
        $.ajax({
            url:"app/admin-side/admin-blog/admin-blog.action.php/?act=delete_image",
            type:"post",
            data:{path:dir,id:2,name:$(this).attr('data-path')},
            success: function(data){
                ($(".blog_img_output_div[del-id = "+del_id+"]")).remove();
            }
        });
    }
});

$(document).on("click", ".blog_add_img",function() {
    $(".blog_post_body_edit").hide();
    $(".blog_edit_upload_image").show();
});

$(document).on("click", ".blog_add_desc",function() {
    $(".blog_post_body_edit").show();
    $(".blog_edit_upload_image").hide();
});