$(".form").on("change", ".field", function(){
    $(this).parent(".upload").attr("data-text", $(this).val().replace(/.*(\/|\\)/, '') );
});

$(".form").submit(function(){
    $("#n_upload").css({'display': 'none'});

    var formData = new FormData($(this)[0]);

    $.ajax({
        url: '/application/extensions/upload.php',
        type: 'POST',
        data: formData,
        async: false,
        success: function (data) {
            $("#result").val(data);
            $("#n_result").css({'display': 'block'});
        },
        cache: false,
        contentType: false,
        processData: false
    });

    return false;
});

$("#return").click(function() {
    $("#n_result").css({'display': 'none'});
    $(".upload").attr('data-text', "Выберите файл!");
    $(".field").val('');
    $("#n_upload").css({'display': 'block'});
});