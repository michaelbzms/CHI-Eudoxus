<?php
    // returns true if login fails
	session_start(); 
	$dbConnectionPath = $_SERVER['DOCUMENT_ROOT'];
	$dbConnectionPath .= "/sdi1500102_sdi1500165/php/control/dbConnection.php";
	include_once($dbConnectionPath);
	if ( isset($_POST['logoutSubmit']) ) {
		unset($_POST['logoutSubmit']);
        session_unset();
		session_destroy();
    } else if ( isset($_POST['loginSubmit']) ) {
		unset($_POST['loginSubmit']);
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
	            return true;
	        }
	    	$userRow = $result->fetch_assoc();
	        $_SESSION['userID'] = $userRow['idUser'];
			$_SESSION['userType'] = $userRow['user_type'];
			$_SESSION['email'] = $_POST['email'];
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
                	if ( isset($_SESSION['bookDeclUni']) && $_SESSION['bookDeclUni'] == $_SESSION['studentUni'] && $_SESSION['bookDeclDpt'] == $_SESSION['studentDpt']  && isset($_SESSION['bookDeclClassesArr']) && $_SESSION['bookDeclClassesArr'] != [] ) {
                		$_SESSION['tempBookDeclClassesArr'] = [];
                		$_SESSION['tempBookDeclBooksArr'] = [];
                		for ($i = 0; $i < count($_SESSION['bookDeclClassesArr']); $i++) {
                			$_SESSION['tempBookDeclClassesArr'][] = $_SESSION['bookDeclClassesArr'][$i];
                			$_SESSION['tempBookDeclBooksArr'][] = $_SESSION['bookDeclBooksArr'][$i];
                		}
                	}
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
	}
    return false;
?>
