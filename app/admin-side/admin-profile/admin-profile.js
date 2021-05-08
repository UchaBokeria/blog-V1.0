$(document).on("click","#saveProfile",function(){
    obj = new Object();
    obj.act = "SetAdmin";
    obj.userid = $("#id").val();
    obj.username = $("#Fullname").val();
    obj.description = $("#description").val();
    obj.birth_date = $("#birthdate").val();
    obj.nickname = $("#Nickname").val();
    obj.email = $("#Email").val();
    obj.password = $("#Password").val();
    var repeat = $("#Repeat").val();
    console.log(obj.password);
    
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
    else if(obj.password == "" || obj.password.length < 8){
        $("#alert_text").show();
        $("#alert_text").html("Password must containt at leas 8 characters");
        check =1;
    }
    else if($("#pas_repeat").is(":visible")){
        if(obj.password != repeat){
            $("#alert_text").show();
            $("#alert_text").html("Repeat password correctly");
            check =1;
        }
    }
    if(check == 0){
        $("#alert_text").show();
        $("#alert_text").html("Monacemebi sheicvala");
        console.log(obj.birth_date)
        $.ajax({
            url:"app/admin-side/admin-profile/admin-profile.action.php",
            data:obj,
            succsess:function(data){
                console.log("admin updated");
            },
            error:function(data){
                console.log("admin updated");
            }
        });
    }
    else{
        $("#alert_text").show();
        $("#alert_text").html("Something wend wrong");
    }

});

$(document).on("change","#file",function (){

    var obj = new FormData();
    var files = $('#file')[0].files;

    if(files.length > 0){
        alert($('#file').val());
        obj.append('file',files[0]);

        $.ajax({
            url:"app/admin-side/admin-profile/admin-profile.action.php/?act=tmp_upload",
            type: 'post',
            data:obj,
            contentType: false,
            processData: false,
            success: function(response){
                console.log(files[0]['name'])
                if(response != 0){
                    $('#user_image').attr('src',"assets/uploads/tmp/" + files[0]['name']);
                }
            },
            error: function(response) {
                alert("error");
            }
        });
    }
    console.log(files[0]);  
})
// $(document).on("click","#but_upload",function(){

//     var obj = new FormData();
//     var files = $('#file')[0].files;
//     if(files.length > 0){
//         obj.append('file',files[0]);

//         $.ajax({
//             url:"app/admin-side/admin-profile/admin-profile.action.php/?act=upload_image",
//             type: 'post',
//             data:obj,
//             contentType: false,
//             processData: false,
//             success: function(response){
//                 alert("Image Uploaded Succsessfully");
//                 if(response != 0){
//                     console.log("uploaded");
//                 }
//             },
//             error: function(response) {
//                 alert("error");
//             }
//         });
//     }
//     console.log(files[0]);  
// });

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

