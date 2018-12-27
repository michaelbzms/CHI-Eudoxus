$("#modify").on("click", function(){
    window.location.href = "/sdi1500102_sdi1500165/php/notimplemented.php";  // TODO: implement?
});

$("#submit_new").on("click", function(){
    // ask for validation
    if ( !confirm("Προσοχή! Αυτή η πράξη θα διαγράψει την προηγούμενή σας δήλωση. Είστε σίγουροι ότι θέλετε να προχωρήσετε;") ) return;
    // send ajax (AND WAIT FOR IT TO FINISH) to delete current submission
    //TODO
    // redirect user to submit page
    window.location.replace("/sdi1500102_sdi1500165/php/secretary_app.php");  // TODO: implement?
});

function checkValid(str){
    return str.replace(/\s/g, "") !== "";
}

$("#add_class_form").on("submit", function(e){
    e.preventDefault();
    var formdata = { 
        title : $("#title_param").val(),
        id : $("#id_param").val(),
        professors : $("#prof_param").val(),
        semester : $("#semester_param").val(),
        comments : $("#comment_param").val()
    };
    if (checkValid(formdata["id"]) && checkValid(formdata["title"]) && checkValid(formdata["professors"]) ){
        $.ajax({
            url: "/sdi1500102_sdi1500165/php/control/secretary_add_class.php",
            type: "post",
            data: formdata,
            success: function(response){
                if (response !== "" && response !== "FAIL") {
                    $("#ajax_target_div").append(response);
                }
                $('html, body').animate({
                    scrollTop: $("#add_class_form").offset().top
                }, 450);
                // clear data:
                document.getElementById("add_class_form").reset();
                $("#semester_param").val(formdata["semester"]);  // reset but save this
            }
        });
    } else {
        var remaining = "";
        if (!checkValid(formdata["title"])) remaining += "- Τίτλος Μαθήματος\n";
        if (!checkValid(formdata["id"])) remaining += "- Κωδικός Μαθήματος\n";
        if (!checkValid(formdata["professors"])) remaining += "- Διδάσκοντας/ες\n";
        alert("Παρακαλώ συμπληρώστε ορθά τα ακόλουθα πεδία:\n" + remaining);
    }
});