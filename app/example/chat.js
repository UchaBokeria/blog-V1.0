var member;

$(document).ready(function () {
    localStorage.setItem('lastChatId', 7);
    member = localStorage.getItem('lastChatId');

    const emojiPicker = new FgEmojiPicker({
        trigger: ['#emojiPick'],
        removeOnSelection: true,
        closeButton: true,
        position: ['top', 'left'],
        preFetch: true,
        dir:'plugins/emojiPicker/',
        insertInto: document.querySelector('#text'),
        emit(obj, triggerElement) {
            //console.log(obj, triggerElement);
        }
    });
    
    readChat();
    setInterval(function(){
        readChat();
    }, 3000);
});

$(document).on("click", "#sendButton", function () {
    $.ajax({
        url: "config.php",
        data: {getter:member,act:"get_chat"},
        contenttype:"json",
        success: function (data) {
            $(".messages").html(data);
        }
    });
});

$(document).on("click", ".member img, .member p", function () {
    member = $(this).attr("data-id");
    readChat();
});

$(document).on("click", ".option-toggle", function () {
    $(this).children("div").toggle();
});

function readChat() {
    $.ajax({
        url: "app/chat/chat.action.php",
        data: {act:"get_chat",getter:member},
        contenttype:"json",
        success: function (data) {
            $(".messages").html(data);
        }
    });
}