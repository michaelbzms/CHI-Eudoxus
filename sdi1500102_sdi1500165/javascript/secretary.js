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