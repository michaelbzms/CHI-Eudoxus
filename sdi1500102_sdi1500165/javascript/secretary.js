$("#modify").on("click", function(){
    window.location.href = "/sdi1500102_sdi1500165/php/secretary_app2.php";
});

$("#submit_new").on("click", function(){
    // ask for validation
    if ( !confirm("Προσοχή! Αυτή η πράξη θα διαγράψει την προηγούμενή σας δήλωση. Είστε σίγουροι ότι θέλετε να προχωρήσετε;") ) return;
    // send ajax (AND WAIT FOR IT TO FINISH) to delete current submission
    $.ajax({
        url: "/sdi1500102_sdi1500165/php/AJAX/secretary_delete_classes.php",
        type: "post",
        data: {},
        async: false,   /* (!) Synchronous */
        success: function(response){
            if ( response === "NO_SESSION"){
                alert("Η συνεδρία σας έχει τελειώσει. Παρακαλώ συνδεθείτε ξανά.");
            }
        }
    });
    // redirect user to submit page
    window.location.replace("/sdi1500102_sdi1500165/php/secretary_app.php");
});

$("#delete_all_classes").on("click", function(){
    // ask for validation
    if ( !confirm("Προσοχή! Αυτή η πράξη θα διαγράψει όλα τα μαθήματα που έχετε δηλώσει μέχρι τώρα. Είστε σίγουροι ότι θέλετε να προχωρήσετε;") ) return;
    // send ajax (AND WAIT FOR IT TO FINISH) to delete current submission
    $.ajax({
        url: "/sdi1500102_sdi1500165/php/AJAX/secretary_delete_classes.php",
        type: "post",
        data: {},
        success: function(response){
            if ( response === "NO_SESSION"){
                alert("Η συνεδρία σας έχει τελειώσει. Παρακαλώ συνδεθείτε ξανά.");
            }
        }
    });
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
        comments : $("#comment_param").val(),
        isForeign : ( $("#is_foreign_param").is(":checked") ) ? "true" : "false",
        foreignDepartment : $("#foreign_department_param").val()
    };
    if (checkValid(formdata["id"]) && checkValid(formdata["title"]) && checkValid(formdata["professors"]) && (formdata['isForeign'] !== "true" || (formdata['foreignDepartment'] !== null && formdata['foreignDepartment'] !== "" ) ) ) {
        $.ajax({
            url: "/sdi1500102_sdi1500165/php/AJAX/secretary_add_class.php?removePrevious=false",
            type: "post",
            data: formdata,
            success: function(response){
                if (response !== "" && response !== "FAIL" && response !== "NO_SESSION") {
                    $("#ajax_target_div").append(response);
                    $('html, body').animate({
                        scrollTop: $("#add_class_form").offset().top
                    }, 450);
                } else if ( response === "NO_SESSION"){
                    alert("Η συνεδρία σας έχει τελειώσει. Παρακαλώ συνδεθείτε ξανά.");
                }
                // clear data:
                document.getElementById("add_class_form").reset();
                $("#semester_param").val(formdata["semester"]);  // reset but save this
                $("#add_class_form").find(".foreign_class_options").hide();
            }
        });
    } else {
        var remaining = "";
        if (!checkValid(formdata["title"])) remaining += "- Τίτλος Μαθήματος\n";
        if (!checkValid(formdata["id"])) remaining += "- Κωδικός Μαθήματος\n";
        if (!checkValid(formdata["professors"])) remaining += "- Διδάσκοντας/ες\n";
        if (!(formdata['isForeign'] !== "true" || (formdata['foreignDepartment'] !== null && formdata['foreignDepartment'] !== "" ) )) remaining += "- Επιλέξτε Σχολή\n";
        alert("Παρακαλώ συμπληρώστε ορθά τα ακόλουθα πεδία:\n" + remaining);
    }
});

$(document).on('submit','.edit_class_form', function(e){
    e.preventDefault();
    var item = $(this).closest("li");
    var formdata = { 
        class_id : item.val(),
        title : item.find(".title_param").val(),
        id : item.find(".id_param").val(),
        professors : item.find(".prof_param").val(),
        semester : item.find(".semester_param").val(),
        comments : item.find(".comment_param").val(),
        isForeign : ( item.find(".is_foreign_param").is(":checked") ) ? "true" : "false",
        foreignDepartment : item.find(".foreign_department_param").val()
    };
    if (checkValid(formdata["id"]) && checkValid(formdata["title"]) && checkValid(formdata["professors"]) && (formdata['isForeign'] !== "true" || (formdata['foreignDepartment'] !== null && formdata['foreignDepartment'] !== "" ) )){
        $.ajax({
            url: "/sdi1500102_sdi1500165/php/AJAX/secretary_add_class.php?removePrevious=true",
            type: "post",
            data: formdata,
            success: function(response){
                if (response !== "" && response !== "FAIL" && response !== "NO_SESSION") {
                    item.html(response);
                } else if ( response === "NO_SESSION"){
                    alert("Η συνεδρία σας έχει τελειώσει. Παρακαλώ συνδεθείτε ξανά.");
                }
            }
        });
    } else {
        var remaining = "";
        if (!checkValid(formdata["title"])) remaining += "- Τίτλος Μαθήματος\n";
        if (!checkValid(formdata["id"])) remaining += "- Κωδικός Μαθήματος\n";
        if (!checkValid(formdata["professors"])) remaining += "- Διδάσκοντας/ες\n";
        if (!(formdata['isForeign'] !== "true" || (formdata['foreignDepartment'] !== null && formdata['foreignDepartment'] !== "" ) )) remaining += "- Επιλέξτε Σχολή\n";
        alert("Παρακαλώ συμπληρώστε ορθά τα ακόλουθα πεδία:\n" + remaining);
    }
});

$("#submit_PS").on("click", function(){
    window.location.href = "/sdi1500102_sdi1500165/php/secretary_app3.php";
});

$(document).on('click','.edit_box', function(e){
    var item = $(this).closest("li");
    item.find(".item").hide();
    item.find(".container").show();
});

$(document).on('click','.delete_box', function(e){
    if (confirm("Είστε σίγουροι ότι θέλετε να διαγράψετε αυτό το μάθημα;")){
        var item = $(this).closest("li");
        $.ajax({
            url: "/sdi1500102_sdi1500165/php/AJAX/secretary_delete_classes.php",
            type: "post",
            data: { class_id : item.val() },
            async: false,   /* (!) Synchronous */
            success: function(response){
                if (response !== "FAIL" && response !== "NO_SESSION") {
                    item.remove();
                } else if ( response === "NO_SESSION"){
                    alert("Η συνεδρία σας έχει τελειώσει. Παρακαλώ συνδεθείτε ξανά.");
                } else {
                    alert("Unknown Error: Could not delete class.");   // should not happen
                }
            }
        });
    }
});

$(document).on('click','.cancel_edit', function(e){
    var item = $(this).closest("li");
    item.find(".container").hide();
    item.find(".item").show();
});

$(document).on('change','.foreign_class_checkbox', function(e){
    var options = $(this).closest('.row').find(".foreign_class_options");
    if ($(this).is(':checked')){
        options.show();
    } else {
        options.hide();
    }
});

$(".add_book_form").on("submit", function(e){
    e.preventDefault();
    var class_id = $(this).closest("li").val();
    var formdata = { 
        idClass : class_id,
        idBook : $(this).find(".book_id_input").val()
    };
    if (checkValid(formdata["idBook"])) {
        $.ajax({
            url: "/sdi1500102_sdi1500165/php/AJAX/secretary_add_book.php",
            type: "post",
            data: formdata,
            success: function(response){
                if (response !== "" && response !== "FAIL" && response !== "NOT_EXISTS" && response !== "NO_SESSION") {
                    $("#ajax_target_div").append(response);
                } else if ( response === "NOT_EXISTS") {
                    alert("Δεν υπάρχει σύγγραμμα με αυτόν τον κωδικό στον Εύδοξο.")
                } else if ( response === "NO_SESSION"){
                    alert("Η συνεδρία σας έχει τελειώσει. Παρακαλώ συνδεθείτε ξανά.");
                }
                // clear data:
                //$(this).reset();   // <- fix
            }
        });
    } 
    else {
        alert("Παρακαλώ συμπληρώστε ορθά τα ακόλουθα πεδία:\n" + "- Kωδικός Συγγράμματος στον Εύδοξο\n");
    }
});

$(document).on('click','.delete_book_box', function(e){
    if (confirm("Είστε σίγουροι ότι θέλετε να διαγράψετε αυτό το σύγγραμμα;")){
        var item = $(this).closest("li");
        $.ajax({
            url: "/sdi1500102_sdi1500165/php/AJAX/secretary_delete_book.php",
            type: "post",
            data: { book_id : item.val() },
            async: false,   /* (!) Synchronous */
            success: function(response){
                if (response !== "FAIL" && response !== "NO_SESSION") {
                    item.remove();
                } else if ( response === "NO_SESSION"){
                    alert("Η συνεδρία σας έχει τελειώσει. Παρακαλώ συνδεθείτε ξανά.");
                } else {
                    alert("Unknown Error: Could not delete book.");   // should not happen
                }
            }
        });
    }
});