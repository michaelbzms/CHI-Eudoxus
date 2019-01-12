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

function getByID($mysqli, $item, $itemId) {
    if ( mysqli_connect_errno() ){
        echo "Warning: connection not established at getBookPublisherName()!";
        return [];
    }
    if ($item == "class") {
        $result = $mysqli->query("SELECT * FROM UNIVERSITY_CLASSES WHERE idClass=$itemId;");
    } elseif ($item == "book") {
        $result = $mysqli->query("SELECT * FROM BOOKS WHERE idBook=$itemId;");
    } else {
        echo "Warning: unknown item at getByID()!";
        return [];
    }
    return $result->fetch_assoc();
}

function getSecId($mysqli, $uni, $dpt) : int {
    if ( mysqli_connect_errno() ){
        echo "Warning: connection not established at getSecId()!";
        return -1;
    }
    $result = $mysqli->query("SELECT idUser FROM SECRETARIES WHERE university='$uni' AND department='$dpt';");
    return ( $result->num_rows > 0 ) ? $result->fetch_assoc()['idUser'] : -1;
}

function getDptNumberOfSemesters($mysqli, $university, $department) : int {
    if ( mysqli_connect_errno() ){
        echo "Warning: connection not established at getDptNumberOfSemesters()!";
        return -1;
    }
    $result = $mysqli->query("SELECT number_of_semesters FROM SECRETARIES WHERE university='$university' AND department='$department';");
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

function getDptForSecretary($mysqli, $secretary_id){
    if ( mysqli_connect_errno() ){
        echo "Warning: connection not established at getUniForSecretary()!";
        return "";
    }
    $result = $mysqli->query("SELECT department FROM SECRETARIES WHERE idUser = $secretary_id;");
    return ( $result->num_rows > 0 ) ? $result->fetch_assoc()['department'] : "";
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

function getDptSemClasses($mysqli, $university, $dpt, $sem){
    if ( mysqli_connect_errno() ){
        echo "Warning: connection not established at getDptSemClasses()!";
        return [];
    }
    $result = $mysqli->query("SELECT * FROM UNIVERSITY_CLASSES uc, SECRETARIES s WHERE s.university='$university' AND s.department='$dpt' AND s.idUser=uc.SECRETARIES_id AND uc.semester=$sem;");
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
        echo "Warning: connection not established at getClassBooks()!";
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

function getBookDistPoints($mysqli, $bookId){
    if ( mysqli_connect_errno() ){
        echo "Warning: connection not established at getBookDistPoints()!";
        return [];
    }
    $result = $mysqli->query("SELECT dp.*, dphb.count FROM DISTRIBUTION_POINTS dp, DISTRIBUTION_POINTS_has_BOOKS dphb WHERE dphb.BOOKS_id=$bookId AND dphb.DISTRIBUTION_POINTS_id=dp.idUser;");
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

function getDeclaredInOrder($mysqli, $type, $array){
    if ( mysqli_connect_errno() ){
        echo "Warning: connection not established at getDeclaredInOrder()!";
        return [];
    }
    $impodedArray = implode(",", $array);
    if ($type == "classes") {
        $result = $mysqli->query("SELECT * FROM UNIVERSITY_CLASSES WHERE idClass IN ($impodedArray) ORDER BY FIELD(idClass,$impodedArray);");
    } elseif ($type == "books") {       // this won't return duplicates books (from different classes); now getting books seperately
        $result = $mysqli->query("SELECT * FROM BOOKS WHERE idBook IN ($impodedArray) ORDER BY FIELD(idBook,$impodedArray);");
    } else {
        echo "Warning: unknown type at getDeclaredInOrder()!";
        return [];
    }
    $list = [];
    if ($result->num_rows > 0) {
        while ($row =  $result->fetch_assoc()){
            $list[] = $row;
        }
    }
    return $list;
}

function getBookDeclarationTuples($mysqli, $idType, $id){
    if ( mysqli_connect_errno() ){
        echo "Warning: connection not established at getBookDeclarationTuples()!";
        return [];
    }
    if ($idType == "declarationId") {
        $result = $mysqli->query("SELECT * FROM BOOK_CLASS_TUPLES WHERE BOOK_DECLARATION_id=$id;");
    } elseif ($idType == "studentId") {
        $result = $mysqli->query("SELECT bct.* FROM BOOK_CLASS_TUPLES bct, BOOK_DECLARATION bd WHERE bd.STUDENTS_id=$id AND bd.idDeclaration=bct.BOOK_DECLARATION_id;");
    } else {
        echo "Warning: unknown type at getBookDeclarationTuples()!";
        return [];
    }
    $list = [];
    if ($result->num_rows > 0) {
        while ($row =  $result->fetch_assoc()){
            $list[] = $row;
        }
    }
    return $list;
}

?>
