<?php 
    // inform db of the new class
    //TODO
    // then return it to be dynamically added to view
    echo "<li><span class=\"id_span\">[" . $_POST["id"] . "]</span><h2>" . $_POST["title"] . "</h2><br><span class=\"field_span\">Καθηγητής/ές: " . $_POST["professors"] . "</span><span class=\"field_span\">Εξάμηνο: " . $_POST["semester"] . "o</span><br>Σχόλια: " . $_POST["comments"] . "</li>\n";
?>