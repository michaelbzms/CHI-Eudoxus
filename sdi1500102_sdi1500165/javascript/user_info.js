function checkValid(str){
    return str.replace(/\s/g, "") !== "";
}

$("#edit_btn").on("click", function(){
    $("#info_box").hide();
    $("#edit_box").show();
    $('html, body').animate({
        scrollTop: $("form").offset().top
    }, 450);
});

$("#cancel_edit_btn").on("click", function(){
    $("#edit_box").hide();
    $("#info_box").show();
});

$("#secretary_edit_info_form").on("submit", function(e){
    e.preventDefault();
    var formdata = {
        sem_num : $("#sem_num").val(),
        city : $("#city").val(),
        county : $("#county").val(),
        TK : $("#TK").val(),
        address : $("#address").val(),
        email : $("#email").val(),
        phone : $("#phone").val()
    };
    if ( !isNaN(formdata['sem_num']) && checkValid(formdata['city']) && checkValid(formdata['county'])
       && checkValid(formdata['address']) && checkValid(formdata['TK']) && checkValid(formdata['email']) && checkValid(formdata['phone']) ) {
        $.ajax({
            url: "/sdi1500102_sdi1500165/php/AJAX/change_secretary_info.php",
            type: "post",
            data: formdata,
            async: false,   /* (!) Synchronous: wait for AJAX to finish */
            success: function(response){
                if ( response === "NO_SESSION"){
                    alert("Η συνεδρία σας έχει τελειώσει. Παρακαλώ συνδεθείτε ξανά.");
                } else  if ( response === "MISSING_PARAMETERS" ) {
                    alert("Error: Ελλειπή δεδομένα φόρμας.");
                } else {  // success
                    window.location.replace("/sdi1500102_sdi1500165/php/secretary_info.php");  //reload
                }
            }
        });
    } else if (isNaN(formdata['sem_num'])){
        alert("Ο αριθμός εξαμήνων πρέπει να είναι αριθμός.");
    } else {
        alert("Έχετε αφήσει κενά πεδία.");
    }
});

$("#student_edit_info_form").on("submit", function(e){
    e.preventDefault();
    var formdata = {
        email : $("#email").val(),
        phone : $("#phone").val()
    };
    if ( checkValid(formdata['email']) && checkValid(formdata['phone']) ) {
        $.ajax({
            url: "/sdi1500102_sdi1500165/php/AJAX/change_student_info.php",
            type: "post",
            data: formdata,
            async: false,   /* (!) Synchronous: wait for AJAX to finish */
            success: function(response){
                if ( response === "NO_SESSION"){
                    alert("Η συνεδρία σας έχει τελειώσει. Παρακαλώ συνδεθείτε ξανά.");
                } else  if ( response === "MISSING_PARAMETERS" ) {
                    alert("Error: Ελλειπή δεδομένα φόρμας.");
                } else {  // success
                    window.location.replace("/sdi1500102_sdi1500165/php/student_info.php");  //reload
                }
            }
        });
    } else {
        alert("Έχετε αφήσει κενά πεδία.");
    }
});