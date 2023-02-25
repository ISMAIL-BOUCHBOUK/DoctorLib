let selected = -1;

let messages_count = 0;
let messages_count_total = 0;

function get_contacts() {
    $.ajax({
        type: "POST",
        url: "../js/php-ajax/get_contacts.php",
        data: { "id": id, "name": $(this).val(), "selected": selected },
        success: function (response) {
            $(".contacts").html(response);
            $(".dr").on("click", function () {
                $(".dr").removeClass("active");
                $(this).addClass("active");
                selected = $(this).attr("code");
                $(".title").text($(this).find(".name").text());
                $(this).find(".count").remove();
                get_messages(true);
            });
        }
    });
}

function get_messages(bool) {
    $.ajax({
        type: "POST",
        url: "../js/php-ajax/get_messages.php",
        data: { "my_id": id, "id": selected },
        success: function (response) {
            $(".messages").html(response);
            if (bool) {
                $(".conversation").scrollTop($(".messages").height());
            }

        }
    });
}

$("#send").on("click", function () {
    if (selected != -1 && $(".text").val().replaceAll(" ", "") != "") {
        $.ajax({
            type: "POST",
            url: "../js/php-ajax/send_message.php",
            data: { "re": selected, "mes": $(".text").val() },
            success: function () {
                scrollpos = $(".messages").height() - $(".conversation").height() - $(".conversation").scrollTop();

                $(".recherche input").trigger('input');
                get_messages(scrollpos < 42);
            }
        });
    }
    $(".text").val("");
});

$(".text").on("keypress",function(e){
    if (e.keyCode == 13)
    $("#send").trigger("click");
})

function messages_count_change() {
    $.ajax({
        type: "POST",
        url: "../js/php-ajax/detect data change.php",
        data: { "proce": 'CALL `messages_count`('+id+' , '+selected+')'},
        success: function (response) {
            if (parseInt(response) != messages_count) {
                messages_count = parseInt(response);
                scrollpos = $(".messages").height() - $(".conversation").height() - $(".conversation").scrollTop();
                get_messages(scrollpos < 42);
                console.log("messages_count_change");
            }
        }
    });
}

function messages_count_total_change() {
    $.ajax({
        type: "POST",
        url: "../js/php-ajax/detect data change.php",
        data: { "proce": 'CALL `messages_count_total`('+id+')'},
        success: function (response) {
            if (parseInt(response) != messages_count_total) {
                messages_count_total = parseInt(response);
                $(".recherche input").trigger('input');
                console.log("messages_count_total_change");
            }
        }
    });
}

$(".recherche input").on("input", get_contacts);
$(".recherche input").trigger('input');


setInterval(function () {
    messages_count_change();
    messages_count_total_change();
}, 1000);
