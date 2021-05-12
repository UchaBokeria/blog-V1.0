var mail_send_ok = false;
var mail_fields_ok = false;
$(document).on("click", "#send_mail", function () {

    if ($("#mail_address").val() == "")
        mail_fields_ok = false;
    else if ($("#mail_name").val() == "")
        mail_fields_ok = false;
    else if ($("#mail_text").val() == "")
        mail_fields_ok = false;
    else
        mail_fields_ok = true;
    
    if(mail_send_ok && mail_fields_ok) {
        param = new Object();
        param.address = $("#mail_address").val();
        param.body = $("#mail_text").val();
        param.subject = $("#mail_name").val();

        
        $.ajax({
            url: "app/user-side/contact/contact.action.php",
            data: param,
            success: function (response) {
                $("#mail_address").val("");
                $("#mail_name").val("");
                $("#mail_text").val("");
                $("#mail_sent_res").html("<p style='color:#1FAF1F'>Your Mail Has Been Sent Successfully</p>");
            }
        });
    }
    else {
        $("#mail_sent_res").html("<p style='color:#AF1F1F'>Please Fill Every Field Correctly</p>");
    }
    
    mail_send_ok = false;
    mail_fields_ok = false;
});

$(document).on("keyup", "#mail_address", function () {
    if (!ValidMail.test($("#mail_address").val())) {
        $("#mail_address").css("border", "4px solid #AF1F1F");
    }
    else {
        mail_send_ok = true;
        $("#mail_address").css("border", "1px solid #252525");
    }
});