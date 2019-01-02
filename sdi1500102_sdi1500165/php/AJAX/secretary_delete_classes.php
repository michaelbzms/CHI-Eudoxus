<?php 
    include("../control/sessionManager.php");
    $conn = connectToDB();
    if (! $conn) { die("AJAX Database connection failed: " . mysqli_connect_error()); }
    $hasSession = isset($_SESSION['userID']);
    if ( $hasSession && isset($_SESSION['userType']) && $_SESSION['userType'] == 'secretary' ) {
        $secretary_id = $_SESSION['userID']; 
        // Delete classes and associated books from db for this secretary
        //TODO
    } else {
        echo "NO_SESSION";
    }
    $conn->close();
?>