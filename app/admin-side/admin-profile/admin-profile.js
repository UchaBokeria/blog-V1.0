$(document).on("click","#saveProfile",function(){
    obj = new Object();
    obj.act = "SetAdmin";
    obj.userid = $("#id").val();
    obj.username = $("#Fullname").val();
    obj.description = $("#description").val();
    obj.birth_date = $("#birthdate").val();
    obj.nickname = $("#Nickname").val();
    obj.email = $("#Email").val();

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
});


$(document).on("click","#but_upload",function(){

    var obj = new FormData();
    var files = $('#file')[0].files;
    if(files.length > 0){
        obj.append('file',files[0]);

        $.ajax({
            url:"app/admin-side/admin-profile/upload.php",
            type: 'post',
            data:obj,
            contentType: false,
            processData: false,
            success: function(response){
                alert("Image Uploaded Succsessfully");
                if(response != 0){
                    console.log("uploaded");
                }
            },
            error: function(response) {
                alert("error");
            }
        });
    }
    console.log(files[0]);  
});