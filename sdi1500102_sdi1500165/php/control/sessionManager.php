<?php
	session_start(); 
	$dbConnectionPath = $_SERVER['DOCUMENT_ROOT'];
	$dbConnectionPath .= "/sdi1500102_sdi1500165/php/dbConnection.php";
	include_once($dbConnectionPath);
    if ( isset($_POST['loginSubmit']) ) {
    	// TODO: better connection management per page?
        $conn = connectToDB();
        if (! $conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }
        $sqlQuery = "SELECT idUser, user_type FROM USERS WHERE email='" . $_POST['email'] . "'AND password='" . $_POST['password'] . "'";
        $result = $conn->query($sqlQuery);
        $userRow = $result->fetch_assoc();
        if ($result->num_rows == 0) {
        	// TODO: redirect to error page
            die("Wrong credentials");
        }
        $_SESSION['userType'] = $userRow['user_type'];
        $_SESSION['userID'] = $userRow['idUser'];
        $conn->close();
    } elseif ( isset($_POST['logoutSubmit']) ) {
        session_unset();
        session_destroy();
    }
?>
