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
