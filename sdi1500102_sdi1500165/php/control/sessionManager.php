<?php
	session_start(); 
	$dbConnectionPath = $_SERVER['DOCUMENT_ROOT'];
	$dbConnectionPath .= "/sdi1500102_sdi1500165/php/dbConnection.php";
	include_once($dbConnectionPath);
    if ( isset($_POST['loginSubmit']) ) {
    	// TODO: better connection management per page?
        $mysqli = connectToDB();
        if ( mysqli_connect_errno() ) {
            die("Database connection failed: " . mysqli_connect_error());
        }
        if ($sqlStmt = $mysqli->prepare("SELECT idUser, user_type FROM USERS WHERE email=? AND password=?") ) {
			$sqlStmt->bind_param("ss", $_POST['email'], $_POST['password']);
	    	$sqlStmt->execute();
	    	$result = $sqlStmt->get_result();
	        if ($result->num_rows == 0) {
	    		$sqlStmt->close();
        		$mysqli->close();
	        	// TODO: redirect to error page
	            die("Wrong credentials");
	        }
	    	$userRow = $result->fetch_assoc();
	        $_SESSION['userType'] = $userRow['user_type'];
	        $_SESSION['userID'] = $userRow['idUser'];
	    	$sqlStmt->close();
        	$mysqli->close();
	    } else {
        	$mysqli->close();
	    	die("Could not prepare SQL statement");
	    }
    } elseif ( isset($_POST['logoutSubmit']) ) {
        session_unset();
        session_destroy();
    }
?>
