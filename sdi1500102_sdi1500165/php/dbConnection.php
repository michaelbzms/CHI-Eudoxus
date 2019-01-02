<?php
function connectToDB() {
	$host = 'localhost';
    $user = 'root';
    $password = '';
    $db ='eudoxusdb';

    $mysqli = new mysqli($host, $user, $password, $db);
    if (! mysqli_connect_errno()) $mysqli->set_charset('utf8');		// allow greek characters
    return $mysqli;
}

// OBSOLETE; to be deleted:
function userIsType($conn, $user_id, $type) : bool {
    if (! $conn) {
        echo "Warning: connection not established at userIsType()!";
        return false;
    }
    $sqlQuery = "";
    switch ($type) {
        case 'student':
            $sqlQuery = "SELECT 1 FROM STUDENTS st WHERE st.idUser = $user_id;";
            break;
        case 'publisher':
            $sqlQuery = "SELECT 1 FROM PUBLISHERS pb WHERE pb.idUser = $user_id;";
            break;
        case 'secretary':
            $sqlQuery = "SELECT 1 FROM SECRETARIES sec WHERE sec.idUser = $user_id;";
            break;
        case 'distribution_point':
            $sqlQuery = "SELECT 1 FROM DISTRIBUTION_POINTS st WHERE st.idUser = $user_id;";
            break;
        default:
            echo "Warning: Wrong type of user: \"" . $type . "\" at userIsType()!";
            return false;
    }
    $result = $conn->query($sqlQuery);
    return $result->num_rows > 0;  // == 1
}

function getNumberOfSemesters($mysqli, $secr_id) : int {
    if ( mysqli_connect_errno() ){
        echo "Warning: connection not established at getNumberOfSemesters()!";
        return -1;
    }
    $result = $mysqli->query("SELECT number_of_semesters FROM SECRETARIES WHERE idUser = $secr_id;");
    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['number_of_semesters'];
    } else {   // should not happen
        return -1;
    }
}
?>
