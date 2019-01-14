<?php
    include("../control/sessionManager.php");
    include("../bookModal.php");
    $conn = connectToDB();
    if ( $conn->connect_errno ) { die("AJAX Database connection failed: " . $conn->connect_error); }
    $hasSession = isset($_SESSION['userID']);
    if ( $hasSession && isset($_SESSION['userType']) && $_SESSION['userType'] == 'secretary' ) {
        if (isset($_POST['book_id'])){
            $sqlStmt1 = $conn->prepare("SELECT * FROM BOOKS WHERE idBook = ?");
            $sqlStmt1->bind_param("i", $_POST['book_id']);
            $sqlStmt1->execute();
            $results1 = $sqlStmt1->get_result();
            if ( $results1->num_rows > 0){ // exists
                $book = $results1->fetch_assoc();
                bookModal($conn, $book);
            } else {
                echo "NOT_EXISTS";
            }
            $sqlStmt1->close();
        } else {
            echo "NO_PARAMETERS";
        }
    } else {
        echo "NO_SESSION";
    }
    $conn->close();
?>