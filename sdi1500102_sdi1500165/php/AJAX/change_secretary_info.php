<?php 
    include("../control/sessionManager.php");
    $conn = connectToDB();
    if ( $conn->connect_errno ) { die("AJAX Database connection failed."); }
    $hasSession = isset($_SESSION['userID']);
    if ( $hasSession && isset($_SESSION['userType']) && $_SESSION['userType'] == 'secretary' ) {
        $secretary_id = $_SESSION['userID'];
        
        $sqlStmt1 = $conn->prepare("UPDATE SECRETARIES SET number_of_semesters = ?, city = ?, county = ?,  address = ?, TK = ?, phone = ? WHERE idUser = $secretary_id");
        if(!$sqlStmt1) { die("INVALID_QUERY 1"); }
        $sqlStmt1->bind_param("isssis", $_POST['sem_num'], $_POST['city'], $_POST['county'], $_POST['address'], $_POST['TK'], $_POST['phone']);
        $sqlStmt1->execute();
        $sqlStmt1->close();

        $sqlStmt2 = $conn->prepare("UPDATE USERS SET email = ? WHERE idUser = $secretary_id");
        if(!$sqlStmt2) { die("INVALID_QUERY 2"); }
        $sqlStmt2->bind_param("s", $_POST['email']);
        $sqlStmt2->execute();
        $sqlStmt2->close();
    } else {
        echo "NO_SESSION";
    }
    $conn->close();
?>