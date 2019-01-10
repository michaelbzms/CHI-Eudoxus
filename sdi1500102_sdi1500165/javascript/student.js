$("#submit_book_declaration_form").on("submit", function(e){
    if ( !confirm('Είστε σίγουροι ότι θέλετε να υποβάλετε αυτή τη Δήλωση Συγγραμμάτων;') ){
        e.preventDefault();
    }
});

$(document).on("click", "[id^='checkbDiv']", function(e){
    e.stopPropagation();     // ptevents data-toggle
    var checkbox = $(this);
    // only uncheck if it's checked
    if ( ! $(checkbox).is(":checked") ) {   // "!" because when we get here the checkbox has already been toggled
        //alert("UNCHECK");
        $(checkbox).prop('checked', false);
        // also unselect any radio selcted
        var classID = ($(this).attr('id')).replace("checkbDiv", "");
        $("input[name=book" + classID + "]").prop('checked', false);
    } else {
        //alert("CHECK");
        $(checkbox).prop('checked', false);
    } else {        // open accordion
        .collapse('toggle');    // TODO
    }
});

$(document).on("click", "[id^='book']", function(e){
    $(this).closest(".class_card").find(".card-header").find('[type=checkbox]').prop('checked', true);
});
