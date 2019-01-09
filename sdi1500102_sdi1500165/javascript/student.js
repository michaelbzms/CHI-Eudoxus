$("#submit_book_declaration_form").on("submit", function(e){
    if ( !confirm('Είστε σίγουροι ότι θέλετε να υποβάλετε αυτή τη Δήλωση Συγγραμμάτων;') ){
        e.preventDefault();
    }
});

$(document).on("click", "[id^='checkbDiv']", function(e){
    e.preventDefault();
    var checkbox = $(this).find('[type=checkbox]')
    // only uncheck if it's checked
    if ( $(checkbox).prop('checked') ) {
        $(checkbox).prop('checked', false);
        // also unselect any radio selcted
        var classID = ($(this).attr('id')).replace("checkbDiv", "");
        $("input[name=book" + classID + "]").prop('checked', false);
    }
    // console.log( $(this).prop('checked') );
    // $(this).closest("[id^='checkbox']").prop('checked', true);
    // $(this).prop('checked', false);
    // if ( $(this).prop('checked') == true ) {
    //     $(this).next('input[type=checkbox]').prop('checked', true);
    //     $(this).next('input[type=checkbox]').prop('checked', true);
    // }
});

$(document).on("click", "[id^='book']", function(e){
    var classID = ($(this).attr('id')).replace("book", "");
    classID = classID.slice(0, classID.lastIndexOf("_"));
    $("#checkbox" + classID).prop('checked', true);
});