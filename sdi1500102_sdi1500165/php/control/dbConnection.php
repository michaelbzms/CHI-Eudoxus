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

function getDptNumberOfSemesters($mysqli, $department) : int {
    if ( mysqli_connect_errno() ){
        echo "Warning: connection not established at getDptNumberOfSemesters()!";
        return -1;
    }
    $result = $mysqli->query("SELECT number_of_semesters FROM SECRETARIES WHERE department = '$department';");
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

function getAllUnis($mysqli){
    if ( mysqli_connect_errno() ){
        echo "Warning: connection not established at getAllUnis()!";
        return [];
    }
    $result = $mysqli->query("SELECT DISTINCT university FROM SECRETARIES;");
    $list = [];
    if ($result->num_rows > 0) {
        while ($row =  $result->fetch_assoc()){
            $list[] = $row['university'];
        }
    }
    return $list;
}

function getDptSemClasses($mysqli, $dpt, $sem){
    if ( mysqli_connect_errno() ){
        echo "Warning: connection not established at getDptSemClasses()!";
        return [];
    }
    $result = $mysqli->query("SELECT * FROM UNIVERSITY_CLASSES uc, SECRETARIES s WHERE s.department='$dpt' AND s.idUser=uc.SECRETARIES_id AND uc.semester=$sem;");
    $list = [];
    if ($result->num_rows > 0) {
        while ($row =  $result->fetch_assoc()){
            $list[] = $row;
        }
    }
    return $list;
}

function getClassBooks($mysqli, $classId){
    if ( mysqli_connect_errno() ){
        echo "Warning: connection not established at getDptSemClasses()!";
        return [];
    }
    $result = $mysqli->query("SELECT b.* FROM BOOKS b, UNIVERSITY_CLASSES_has_BOOKS uhb WHERE uhb.UNIVERSITY_CLASSES_id=$classId AND uhb.BOOKS_id=b.idBook;");
    $list = [];
    if ($result->num_rows > 0) {
        while ($row =  $result->fetch_assoc()){
            $list[] = $row;
        }
    }
    return $list;
}

function getAllUniDepartments($mysqli, $uni){
    if ( mysqli_connect_errno() ){
        echo "Warning: connection not established at getAllUniDepartments()!";
        return [];
    }
    $result = $mysqli->query("SELECT department FROM SECRETARIES WHERE university = '$uni';");
    $list = [];
    if ($result->num_rows > 0) {
        while ($row =  $result->fetch_assoc()){
            $list[] = $row['department'];
        }
    }
    return $list;
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
            $list[$row['idUser']] = [$row['idUser'], $row['department'], $row['number_of_semesters']];
        }
    }
    return $list;
}

function getBookPublisherName($mysqli, $bookId) {
    if ( mysqli_connect_errno() ){
        echo "Warning: connection not established at getBookPublisherName()!";
        return [];
    }
    $result = $mysqli->query("SELECT p.firstname, p.lastname FROM PUBLISHERS p, BOOKS b WHERE b.idBook=$bookId AND b.published_by=p.idUser");
    if ($result->num_rows > 0) {
        $row =  $result->fetch_assoc();
        return $row['firstname'] . " " . $row['lastname'];
    }
    return "-";
}

?>
