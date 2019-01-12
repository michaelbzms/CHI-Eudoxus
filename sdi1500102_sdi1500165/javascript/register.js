function showUserRegisterOptions() {
    var userSelected = $("#userType").val();
    $("[id$='Options']").attr("style", "display: none !important");
    switch (userSelected) {
        case "1":
            document.getElementById('registerTitle').textContent = "Εγγραφή Φοιτητή";
            $("#studentOptions").css("display", "");
            break;
        case "2":
            document.getElementById('registerTitle').textContent = "Εγγραφή Εκδότη";
            $("#publisherOptions").css("display", "");
            break;
        case "3":
            document.getElementById('registerTitle').textContent = "Εγγραφή Γραμματείας";
            $("#secretaryOptions").css("display", "");
            break;
        case "4":
            document.getElementById('registerTitle').textContent = "Εγγραφή Σημείου Διανομής";
            $("#distPointOptions").css("display", "");
            break;
    }
}

function showDptDropdown() {
    var uniSelected = $("#student_req_uni :selected").attr("data-myindex");
    $("[id^='student_req_dpt_uni']").attr("style", "display: none !important");
    $("#student_req_dpt_uni" + uniSelected).css("display", "");
}

$(document).ready(function() {
    $("#registerForm").on("submit", function(e){
        if ($("#password").val() != $("#rePassword").val()) {
            alert("Οι κωδικοί δεν είναι ίδιοι!");
            return false;
        }

        var userSelected = $("#userType").val();
        var formSelector; 
        switch (userSelected) {
            case "1":
                formSelector = "[id^='student_req_']";
                break;
            case "2":
                formSelector = "[id^='publisher_req_']";
                break;
            case "3":
                formSelector = "[id^='secretary_req_']";
                break;
            case "4":
                formSelector = "[id^='distPoint_req_']";
                break;
        }

        var emptyRequired = false;
        $(formSelector).each(function(){ 
            if( $(this).val() == "" ) {
                emptyRequired = true;
                return;
            }               
        });

        if (emptyRequired) {
            alert('Πρέπει να συμπληρώσετε όλα τα υποχρεωτικά πεδία για να εγγραφείτε!');
            return false;
        }
        return true;
    });
});
