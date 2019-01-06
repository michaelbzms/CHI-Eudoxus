<?php 
    include("../control/sessionManager.php");
    $conn = connectToDB();
    if (! $conn) { die("AJAX Database connection failed: " . mysqli_connect_error()); }
    $hasSession = isset($_SESSION['userID']);
    if ( $hasSession && isset($_SESSION['userType']) && $_SESSION['userType'] == 'secretary' ) {
        $secretary_id = $_SESSION['userID']; 
        if ( isset($_POST['book_id']) ){    // (!) we delete the association 'UNIVERSITY_CLASSES_has_BOOKS' not the book itself!
            // Delete only the specific book from db for this secretary's class
            $sqlStmt = $conn->prepare("DELETE FROM UNIVERSITY_CLASSES_has_BOOKS WHERE BOOKS_id = ? AND UNIVERSITY_CLASSES_id IN (SELECT idClass FROM UNIVERSITY_CLASSES WHERE SECRETARIES_id = $secretary_id);");
            $sqlStmt->bind_param("s", $_POST['book_id']);
            $sqlStmt->execute();
            $sqlStmt->close();
        } else {
            // Delete all books from db for this secretary's class
            $sql = "DELETE FROM UNIVERSITY_CLASSES_has_BOOKS WHERE UNIVERSITY_CLASSES_id IN (SELECT idClass FROM UNIVERSITY_CLASSES WHERE SECRETARIES_id = $secretary_id);";
            $conn->query($sql);
        }
    } else {
        echo "NO_SESSION";
    }
    $conn->close();
?>