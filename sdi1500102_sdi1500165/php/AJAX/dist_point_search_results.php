<?php
    include("../control/sessionManager.php");
    $conn = connectToDB();
    if (! $conn) {
        die("Database connection failed: " . $conn->connect_error);
    }
    // SEARCH LOGIC
    $distpointsfound = [];
    // add wildcards:
    $_POST['name'] = "%" . trim($_POST['name']) . "%";
    $_POST['address'] = "%" . trim($_POST['address']) . "%";
    $sqlStmt = $conn->prepare("SELECT * FROM DISTRIBUTION_POINTS WHERE name LIKE ? AND address LIKE ?;");
    $sqlStmt->bind_param("ss", $_POST['name'], $_POST['address']);
    $sqlStmt->execute();
    $results = $sqlStmt->get_result();
    if ($results->num_rows > 0){
        while ($row = $results->fetch_assoc()){
            $distpointsfound[$row['idUser']] = $row;
        }
        echo "<div class=\"container mb-2\">Βρέθηκαν " . $results->num_rows . " σημεία διανομής σύμφωνα με τα κριτήρια αναζήτησης:</div>";
    } else {
        echo "<div class=\"text-center mb-2\">Δεν βρέθηκαν σημεία διανομής σύμφωνα με τα κριτήρια αναζήτησης.</div>";
    }
    $sqlStmt->close();
?>
<ol class="container">
<?php foreach ($distpointsfound as $id => $distpoint) { 
        include("../dist_point_info_box.php"); 
    }
 ?>
</ol>
<?php 
    $conn->close();
?>
