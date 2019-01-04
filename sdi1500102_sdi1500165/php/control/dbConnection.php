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
    return ( $result->num_rows > 0 ) ? $result->fetch_assoc()['number_of_semesters'] : -1;

}

function getUniForSecretary($mysqli, $secretary_id){
    if ( mysqli_connect_errno() ){
        echo "Warning: connection not established at getUniForSecretary()!";
        return "";
    }
    $result = $mysqli->query("SELECT university FROM SECRETARIES WHERE idUser = $secretary_id;");
    return ( $result->num_rows > 0 ) ? $result->fetch_assoc()['university'] : "";

}

function getAllDepartementsForUniExceptGiven($mysqli, $uni, $exceptionID){   // give false ID if you do not want the exception (ex: -1)
    if ( mysqli_connect_errno() ){
        echo "Warning: connection not established at getAllDepartementsForUniExceptGiven()!";
        return [];
    }
    $result = $mysqli->query("SELECT idUser, department, number_of_semesters FROM SECRETARIES WHERE university = '$uni' AND idUser != $exceptionID;");
    $list = [];
    if ($result->num_rows > 0) {
        while ($row =  $result->fetch_assoc()){
            $list[] = [$row['idUser'], $row['department'], $row['number_of_semesters']];
        }
    }
    return $list;
}

?>
