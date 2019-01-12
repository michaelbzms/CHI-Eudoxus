$(document).ready(function() {
    $("#bookDeclFormPage1").on("submit", function(e){
        if ( $("#bookDeclFormPage1 input:checkbox:checked").length == 0 ) {       // no books are checked
            alert('Δεν έχετε επιλέξει κανένα σύγγραμμα!');
            return false;
        }
        return true;
    });
});

$("#submit_book_declaration_form").on("submit", function(e){
    if ( !confirm('Είστε σίγουροι ότι θέλετε να υποβάλετε αυτή τη Δήλωση Συγγραμμάτων;') ){
        e.preventDefault();
    }
});

$(document).on("click", "[id^='checkbDiv']", function(e){
    e.stopPropagation();     // ptevents data-toggle
    var checkbox = $(this);
    // only uncheck if it's checked
    var classID = ($(this).attr('id')).replace("checkbDiv", "");
    if ( ! $(checkbox).is(":checked") ) {   // "!" because when we get here the checkbox has already been toggled
        //alert("UNCHECK");
        $(checkbox).prop('checked', false);
        // also unselect any radio selcted
        $("input[name=book" + classID + "]").prop('checked', false);
    } else {
        //alert("CHECK");
        $(checkbox).prop('checked', false);
        $("#collapse" + classID).collapse('show');
    }
});

$(document).on("click", "[id^='book']", function(e){
    $(this).closest(".class_card").find(".card-header").find('[type=checkbox]').prop('checked', true);
});

function showDptDropdown() {
    var uniSelected = $("#unis :selected").attr("data-myindex");
    $("[id^='dpts_uni']").attr("style", "display: none !important");
    $("[id^='dpts_uni']").removeAttr("name");
    $("#dpts_uni" + uniSelected).css("display", "");
    $("#dpts_uni" + uniSelected).attr("name", "dptSelected");
}
