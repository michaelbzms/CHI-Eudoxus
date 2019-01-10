<?php
	session_start(); 
	$dbConnectionPath = $_SERVER['DOCUMENT_ROOT'];
	$dbConnectionPath .= "/sdi1500102_sdi1500165/php/control/dbConnection.php";
	include_once($dbConnectionPath);
    if ( isset($_POST['loginSubmit']) ) {
    	// TODO: better connection management per page?
        $conn = connectToDB();
        if ( $conn->connect_errno ) {
            die("Database connection failed: " . $conn->connect_errno());
        }
        if ($sqlStmt = $conn->prepare("SELECT idUser, user_type FROM USERS WHERE email=? AND password=?") ) {
			$sqlStmt->bind_param("ss", $_POST['email'], $_POST['password']);
	    	$sqlStmt->execute();
	    	$result = $sqlStmt->get_result();
	        if ($result->num_rows == 0) {
	    		$sqlStmt->close();
        		$conn->close();
	        	// TODO: redirect to error page
	            die("Wrong credentials");
	        }
	    	$userRow = $result->fetch_assoc();
	        $_SESSION['userID'] = $userRow['idUser'];
	        $_SESSION['userType'] = $userRow['user_type'];
	    	$sqlStmt->close();
	        if ($_SESSION['userType'] == "student") {
	        	$result = $conn->query("SELECT sec.university, sec.department FROM SECRETARIES sec, STUDENTS st WHERE st.idUser={$_SESSION['userID']} AND st.SECRETARIES_id=sec.idUser;");
	        	$studentRow =  $result->fetch_assoc();
	        	$_SESSION['studentUni'] = $studentRow['university'];
	        	$_SESSION['studentDpt'] = $studentRow['department'];
                $declaration_period = "2018-09";
                $result = $conn->query("SELECT * FROM BOOK_DECLARATION WHERE STUDENTS_id={$_SESSION['userID']} AND declaration_period='$declaration_period';");
                $_SESSION['studentHasMadeBookDecl'] = ($result->num_rows > 0);
                if ( $_SESSION['studentHasMadeBookDecl'] ) {
                	$_SESSION['bookDeclClassesArr'] = [];
                	$_SESSION['bookDeclBooksArr'] = [];
                    $bookClassTuples = getBookDeclarationTuples($conn, "studentId", $_SESSION['userID']);
                    foreach ($bookClassTuples as $bcTuple) {
                    	$_SESSION['bookDeclClassesArr'][] = $bcTuple['UNIVERSITY_CLASSES_id'];
                        $_SESSION['bookDeclBooksArr'][] = $bcTuple['BOOKS_id'];
                    }
                }
	        }
        	$conn->close();
	    } else {
        	$conn->close();
	    	die("Could not prepare SQL statement");
	    }
    } else if ( isset($_POST['logoutSubmit']) ) {
        session_unset();
        session_destroy();
    }
?>
