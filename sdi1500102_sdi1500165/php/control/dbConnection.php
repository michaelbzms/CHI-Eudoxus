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
