<?php 
    // inform db of the new class
    //TODO
    // then return it to be dynamically added to view
    echo "<li>[" . $_POST["id"] . "]<h2>" . $_POST["title"] . "</h2><br>Καθηγητής/ές: " . $_POST["professors"] . " Εξάμηνο: " . $_POST["semester"] . "o Σχόλια: " . $_POST["comments"] . "</li>\n";
?>