<?php 
    // inform db of the new class
    //TODO
    // then return it to be dynamically added to view
    echo "<li><span class=\"id_span\">[" . $_POST["id"] . "]</span><h2>" . $_POST["title"] . "</h2><br><span class=\"field_span\"><label>Καθηγητής/ές: </label>" . $_POST["professors"] . "</span><span class=\"field_span\"><label>Εξάμηνο: </label>" . $_POST["semester"] . "o</span><br><label>Σχόλια: </label>" . $_POST["comments"] . "</li>\n";
?>