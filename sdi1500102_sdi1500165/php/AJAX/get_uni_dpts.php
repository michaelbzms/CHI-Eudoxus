<?php 
    $conn = connectToDB();
    if(!empty($_GET['uni'])) {
        $uni = $_GET["uni"];           
        $dpts = getAllUniDepartments($conn, $uni);

        foreach($dpts as $dpt) {
            echo "<option>$uni</option>";
        }
    }
?>
