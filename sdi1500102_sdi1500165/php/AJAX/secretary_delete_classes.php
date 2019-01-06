<?php 
    include("../control/sessionManager.php");
    $conn = connectToDB();
    if (! $conn) { die("AJAX Database connection failed: " . mysqli_connect_error()); }
    $hasSession = isset($_SESSION['userID']);
    if ( $hasSession && isset($_SESSION['userType']) && $_SESSION['userType'] == 'secretary' ) {
        $secretary_id = $_SESSION['userID']; 
        if ( isset($_POST['class_id']) ){
            // Delete only the specific class (and its associated books) from db for this secretary
            $sqlStmt = $conn->prepare("DELETE FROM UNIVERSITY_CLASSES WHERE SECRETARIES_id = $secretary_id AND idClass = ?;");
            $sqlStmt->bind_param("s", $_POST['class_id']);
            $sqlStmt->execute();
            $sqlStmt->close();
        } else {
            // Delete all classes (and their associated books -> cascade) from db for this secretary
            $sql = "DELETE FROM UNIVERSITY_CLASSES WHERE SECRETARIES_id = $secretary_id;";
            $conn->query($sql);
        }
    } else {
        echo "NO_SESSION";
    }
    $conn->close();
?>