var imgChecker = 0;
var pasChecker = 0;

$(document).ready( function(){
    // $.ajax({
    //     url:"app/admin-side/admin-profile/admin-profile.action.php/?act=delete_tmp_image",
    //     type: 'post',
    //     success: function(response){
    //     },
    //     error: function(response) {
    //     }
    // });
});

$(document).on("click","#saveProfile",function(){

    obj = new Object();
    obj.act = "SetAdmin";
    obj.username = $("#Fullname").val();
    obj.description = $("#description").val();
    obj.birth_date = $("#birthdate").val();
    obj.nickname = $("#Nickname").val();
    obj.email = $("#Email").val();
    obj.password = $("#Password").val();

    var repeat = $("#Repeat").val();
    
    var check = 0;

    if(obj.nickname == "" || obj.nickname.length < 5){
        $("#alert_text").show();
        $("#alert_text").html("Nickname must containt at leas 5 characters");
        check =1;
    }
    else if(obj.email == "" ){
        $("#alert_text").show();
        $("#alert_text").html("Email is empty");
        check =1;
    }
    else if(pasChecker == 1){
        $("#alert_text").show();
        $("#alert_text").html("Repeat password correctly");
        var check = 1;
    }

    if(check == 0){
        $("#alert_text").show();
        $("#alert_text").css("color","#1FAF1F");
        $("#alert_text").html("Profile updated");

        $.ajax({
            url: "app/admin-side/admin-profile/admin-profile.action.php",
            type: "post",
            data:obj,
            succsess:function(data){ },
            error:function(data){
                $("#alert_text").show();
                $("#alert_text").html("Something went wrong try again");
            }
        });
    }

    if(imgChecker != 0 && check == 0){
        var obj = new FormData();
        var files = $('#file')[0].files;
    
        if(files.length > 0){
            
            obj.append('file',files[0]);
    
            $.ajax({
                url:"app/admin-side/admin-profile/admin-profile.action.php/?act=upload_image",
                type: 'post',
                data:obj,
                contentType: false,
                processData: false,
                success: function(response){
                },
            });
        }
    }
});

$(document).on("change","#file",function (){
    var obj = new FormData();
    var files = $('#file')[0].files;

    if(files.length > 0){
        obj.append('file',files[0]);

        $.ajax({
            url:"app/admin-side/admin-profile/admin-profile.action.php/?act=tmp_upload",
            type: 'post',
            data:obj,
            contentType: false,
            processData: false,
            success: function(response){
                imgChecker = 1;
                imgPath = response;
                if(response != 0){
                    $('#user_image').attr('src',"assets/uploads/tmp/" + files[0]['name']);
                }
            },
            error: function(response) {
            }
        });
    }
})

$(document).on("click","#Discard",function (){

    $.ajax({
        url:"app/admin-side/admin-profile/admin-profile.action.php/?act=delete_tmp_image",
        type: 'post',
        success: function(response){
        },
        error: function(response) {
        }
    });

    getAdminPage('admin-profile');
})

$(document).on("keyup","#Password, #Nickname",function() { 

    if($(this).val().length < 5){
        $("#alert_text").show();
        $("#alert_text").html("Inputs must contain more then 5 letters");

        $("i[data-name='" + $(this).attr("data-name") + "']").html("error");
        $("i[data-name='" + $(this).attr("data-name") + "']").css("color","red");
        $("input[data-name='" + $(this).attr("data-name") + "']").css("border", "2px solid #AF1F1F");
    }
    else{
        $("#alert_text").hide();
        $("i[data-name='" + $(this).attr("data-name") + "']").html("done");
        $("i[data-name='" + $(this).attr("data-name") + "']").css("color","green");
        $("input[data-name='" + $(this).attr("data-name") + "']").css("border", "1px solid #252525");
    }
})

$(document).on("keyup","#Password",function() {
    $("#pas_repeat").show();
});

$(document).on("keyup"," #Email",function() { 
    if (!ValidMail.test($("#Email").val())) {
        $("#alert_text").show();
        $("#alert_text").html("Email is incorect");
        $("i[data-name='" + $(this).attr("data-name") + "']").html("error");
        $("i[data-name='" + $(this).attr("data-name") + "']").css("color","red");
        $("input[data-name='" + $(this).attr("data-name") + "']").css("border", "2px solid #AF1F1F");
    }
    else {     
        $("#alert_text").hide();   
        var echecker = 1;
        $("i[data-name='" + $(this).attr("data-name") + "']").html("done");
        $("i[data-name='" + $(this).attr("data-name") + "']").css("color","green");
        $("input[data-name='" + $(this).attr("data-name") + "']").css("border", "1px solid #252525");
    }
})

$(document).on("keyup","#Repeat, #Password",function(){
    if($("#Repeat").val() == $("#Password").val()){
        pasChecker = 0;
        $("#alert_text").hide();

        $("#Repeat").css("color","black");
        $("#Repeat").css("border", "1px solid #252525");
    }
    else{
        pasChecker = 1;
        $("#alert_text").show();
        $("#alert_text").html("Repeat password correctly");

        $("#Repeat").css("color","#AF1F1F");
        $("#Repeat").css("border", "2px solid #AF1F1F");
        
    }
});