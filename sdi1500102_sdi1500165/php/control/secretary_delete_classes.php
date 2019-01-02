<?php 
    include "../dbConnection.php";
    $conn = connectToDB();
    if (! $conn) { die("AJAX Database connection failed: " . mysqli_connect_error()); }
    $hasSession = array_key_exists('userID', $_SESSION);
    if ( $hasSession && userIsType($conn, $_SESSION['userID'], 'secretary') ) {
        $secretary_id = $_SESSION['userID']; 
        // Delete classes and associated books from db for this secretary
        //TODO
    } else {
        echo "NO_SESSION";
    }
?>