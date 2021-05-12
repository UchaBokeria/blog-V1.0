var id = "empty";


$(document).on("click", "#create_new", function () {
    $.ajax({
        url: "app/admin-side/admin-home/admin-home.action.php",
        data: { act: "get_new" },
        dataType: "json",
        success: function (data) {
            $("#edit-window").html(data.content);
            $("#edit-window").show();
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
                                'mediaEmbed',
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
                console.log("create error");
            }
    });
});

$(document).on("click", ".edit,.post-text > b", function () {
    id = $(this).attr("data-id");

    param = new Object();
    param.act = "get_edit";
    param.id = id;

    $.ajax({
        url: "app/admin-side/admin-home/admin-home.action.php",
        data: param,
        dataType: "json",
        success: function (data) {
            $("#edit-window").html(data.content);
            $("#edit-window").show();
            console.log(data.content);

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
                            'mediaEmbed',
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
                console.log("edit error");
            }
    });
    
});

$(document).on("click", "#edit_post_types", function () {
    $(this).toggleClass("rotate");
    $(".edit-post-type-select").toggleClass('edit-post-type-select-active');
});

$(document).on("click", ".edit-post-type-select > div", function () {
    var type_id = $(this).attr("data-type");
    var type_html = $(this).html();

    $(".edit-post-type-select > div").removeAttr("id");
    var newChild = "<div data-type='" + type_id + "' id='activated'>" + type_html + "</div>";
    $(".edit-post-type-select").prepend(newChild);
    $(this).remove();
});


$(document).on("click", "#delete_dialog_yes", function () {
    $("#dialog").css("opacity", "0");
    $("#dialog").html("");

    // delete if into the dialog pressed yes
    $.ajax({
        url: "app/admin-side/admin-home/admin-home.action.php",
        data: {act:"delete_post",id: id},
        dataType: "json",
        success: function (response) {
            if (response.error == "") {
                // remove from html
                $(".exhibition-posts[data-id='" + id + "']").remove();

                $("#message").css("opacity","1");
                $("#message").html("Der Beitrag wurde erfolgreich bearbeitet");

                setTimeout( function() {$("#message").css("opacity","0");},2000)
            }
        }
    });
});
    
$(document).on("click", "#delete_dialog_no", function () {
    $("#dialog").css("opacity", "0");
    $("#dialog").html("");
});
    
$(document).on("click", ".delete", function () {
    id = $(this).attr("data-id");
    $("#dialog").css("opacity", "1");
    $.ajax({
        url: "app/admin-side/admin-home/admin-home.action.php",
        data: {act:"get_delete_dialog"},
        dataType: "json",
        success: function (data) {
            $("#dialog").html(data.content);
        }
    });
});

$(document).on("click", "#message", function () {
    $("#message").css("opacity","0");
});


$(document).on("click", ".save-button", function () {
    param = new Object();
    param.act = "edit_post";
    param.title = $("#new_title").val();
    param.desc = editor.getData();
    //param.desc = $("#asd").val();
    param.status_id = $(".edit-post-type-select > #activated").attr("data-type");
    param.category_id = 1; // exhebition is 1, blog = 2
    param.id = $(this).attr("id");
    console.log(param);
    
    $.ajax({
        url: "app/admin-side/admin-home/admin-home.action.php",
        type:"POST",
        data: param,
        success: function (response) {
            $("#edit-window").html("");
            $("#edit-window").hide();

            $("#message").css("opacity","1");
            $("#message").html("Ihr Beitrag wurde gespeichert");
            setTimeout(function () { $("#message").css("opacity", "0"); }, 2000);
            getAdminPage("admin-home");
        }
    });    
    param = new Object();
    param.act = "edit_post_img";
    param.id = $(this).attr("id");

    $.ajax({
        url: "app/admin-side/admin-home/admin-home.action.php",
        type:"POST",
    })
});

$(document).on("click", ".close-ajax-edit,.cancel-button", function () {
    $("#edit-window").html("");
    $("#edit-window").hide();
});


$(document).on("click", ".show_more", function () {
    tmp = $(this).attr("data-id");

    $('.exhibition-posts[data-id="' + tmp + '"]').toggleClass('exhibition-posts-click');
    $('.post_body[data-id="' + tmp + '"]').toggle();
    $(this).toggleClass("rotate");
});

$(document).on("click", "#show_post_types", function () {
    $(".post-type-select").toggleClass("dropdown-select-type");
    $("#show_post_types").toggleClass("dropdown-select-type-button");
});

$(document).on("click", ".post-type-select > div", function () {
    var type_id = $(this).attr("data-type");
    var type_html = $(this).html();

    $(".post-type-select > div").removeAttr("id");
    var newChild = "<div data-type='" + type_id + "' id='activated'>" + type_html + "</div>";

    $(".post-type-select").prepend(newChild);
    $(this).remove();
});

$(document).on("click", "#filter", function () {
    params = new Object();
    params.searchWord = $("#search_text").val();
    params.status = $(".post-type-select #activated").attr("data-type");
    params.start_date = $("#start_date").val();
    params.end_date = $("#end_date").val();
    console.log(params);
    loadAdminHtml("admin-home",params);
});

$(document).on("click", ".edit_img",function() {
    $(".post_body_edit").hide();
    $(".edit_upload_image").show();
});

$(document).on("click", ".edit_desc",function() {
    $(".post_body_edit").show();
    $(".edit_upload_image").hide();
});

$(document).on("change","#post_file",function (){
    var obj = new FormData();
    var files = $(this)[0].files;

    for(var i=0;i!=files.length;i++){
        obj.append('file[]',files[i]);    
    }
    var test = 0;
    $.ajax({
        url:"app/admin-side/admin-home/admin-home.action.php/?act=tmp_upload",
        type:"post",
        data:obj,
        contentType: false,
        processData: false,
        success: function(data){
            console.log(files.length);
            for(var i=0;i!=files.length;i++){
                $(".images_output").html(data);
                test++;
            }
            $(".counter").html(files.length);
        }
    });

});

