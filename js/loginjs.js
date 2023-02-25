$("#form").submit(function (event) {
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: "js/php-ajax/login.php",
        data: {
            "email": $("#email").val(),
            "MTP": $("#MTP").val()
        },
        success: function (response) {
            if (parseInt(response) == -1) {
                $("#em_used").show();
            } else {
                $("#em_used").hide();
                $("#form1").remove();
                $("#main").append(`
                <form action="administration/administration.php" id="form1" style="display: none;" method="post" >
                    <input type="text" name="id" id="id" value="`+ response + `" >
                    
                </form>`);
                $("#form1").trigger("submit");
            }
        }
    });
});