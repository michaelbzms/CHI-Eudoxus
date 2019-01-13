$("#book_search_form").on("submit", function(e){
    e.preventDefault();
    var valid = 0;
    $(this).find('input[type=text]').each(function(){
        if($(this).val() != "") valid += 1;
    });
    if (!valid){
        alert("Πρέπει να συμπληρώσετε τουλάχιστον ένα πεδίο της αναζήτησης.");
    } else if ($("#id").val() !== "" && isNaN($("#id").val())) {
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
                // clear data:
                document.getElementById("add_class_form").reset();
                $("#semester_param").val(formdata["semester"]);  // reset but save this
                $("#add_class_form").find(".foreign_class_options").hide();
            }
        });
    }
});