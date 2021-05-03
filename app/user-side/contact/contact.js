
$(document).on("click", "#send_mail", function () {
    param = new Object();
    param.address = $("#mail_address").val();
    param.name = $("#mail_name").val();
    param.body = $("#mail_text").val();
    console.log(param);

    
    $("#mail_address").val("");
    $("#mail_name").val("");
    $("#mail_text").val("");
});
$(document).on("keyup", "#mail_address", function () {
    if (ValidMail.test($(this).val())) {
        $(this).css("border", "2px solid #AF1F1F");
   }
});