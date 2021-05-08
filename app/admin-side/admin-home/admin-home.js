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
                console.log("edit error");
            }
    });
});


$(document).on("click", ".edit,.post-text > b", function () {
    var id = $(this).attr("data-id");

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


$(document).on("click", ".delete", function () {
    var id = $(this).attr("data-id");

    $.ajax({
        url: "app/admin-side/admin-home/admin-home.action.php",
        data: {id: id},
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

$(document).on("click", "#message", function () {
    $("#message").css("opacity","0");
});


$(document).on("click", ".save-button", function () {
 //save
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