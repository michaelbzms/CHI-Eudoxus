$("#book_search_form").on("submit", function(e){
    e.preventDefault();
    if ($("#id").val() !== "" && isNaN($("#id").val())) {
        alert("O κωδικός του βιβλίου στον Εύδοξο πρέπει να είναι αριθμός!");
    } else {
        formdata = {
            'id' : $("#id").val(),
            'title' : $("#title_param").val(),
            'authors' : $("#authors").val(),
            'ISBN' : $("#ISBN").val(),
            'keywords' : $("#keywords").val()
        }
        $.ajax({
            url: "/sdi1500102_sdi1500165/php/AJAX/book_search_results.php",
            type: "post",
            data: formdata,
            success: function(response){
                if (response !== "" && response !== "FAIL") {
                    $("#book_search_results").html(response);
                    $('html, body').animate({
                        scrollTop: $("#book_search_results").offset().top
                    }, 450);
                } else {
                    alert("Κάτι πήγε στραβά με την αναζήτηση!");
                }
            }
        });
    }
});