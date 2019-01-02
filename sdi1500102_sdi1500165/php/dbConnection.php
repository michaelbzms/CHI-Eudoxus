<?php
function connectToDB() {
	$host = 'localhost';
    $user = 'root';
    $password = '';
    $db ='eudoxusdb';

    $conn = mysqli_connect($host,$user,$password,$db);
    if ($conn) mysqli_set_charset($conn, 'utf8');		// allow greek characters
    return $conn;
}

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

function getNumberOfSemesters($conn, $secr_id) : int {
    if (! $conn){
        echo "Warning: connection not established at getNumberOfSemesters()!";
        return -1;
    }
    $result = $conn->query("SELECT number_of_semesters FROM SECRETARIES WHERE idUser = $secr_id;");
    if ($result->num_rows > 0){
        return $result->fetch_assoc()['number_of_semesters'];
    } else {   // should not happen
        return -1;
    }
}
?>