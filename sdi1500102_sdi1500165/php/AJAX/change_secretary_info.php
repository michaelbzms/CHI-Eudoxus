<?php 
    if(!isset($_POST['sem_num']) || !isset($_POST['sem_num']) || !isset($_POST['sem_num']) || !isset($_POST['sem_num']) 
      || !isset($_POST['sem_num']) || !isset($_POST['sem_num']) || !isset($_POST['sem_num'])) {
        echo "MISSING_PARAMETERS";
        return;
    }
    include("../control/sessionManager.php");
    $conn = connectToDB();
    if ( $conn->connect_errno ) { die("AJAX Database connection failed."); }
    $hasSession = isset($_SESSION['userID']);
    if ( $hasSession && isset($_SESSION['userType']) && $_SESSION['userType'] == 'secretary' ) {
        $secretary_id = $_SESSION['userID'];
        $sqlStmt = $conn->prepare("UPDATE eudoxusdb.SECRETARIES s SET s.number_of_semesters = ?, s.city = ?, s.county = ?,  s.address = ?, s.TK = ?, s.email = ?, s.phone = ? WHERE s.idUser = $secretary_id");
        if(!$sqlStmt) { die("INVALID_QUERY"); }   // TODO: FIX !
        $sqlStmt->bind_param("ississs", $_POST['sem_num'], $_POST['city'], $_POST['county'], $_POST['TK'], $_POST['address'], $_POST['email'], $_POST['phone']);
        $sqlStmt->execute();
        $sqlStmt->close();
    } else {
        echo "NO_SESSION";
    }
    $conn->close();
?>