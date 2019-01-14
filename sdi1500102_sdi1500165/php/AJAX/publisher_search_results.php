<?php
    include("../control/sessionManager.php");
    $conn = connectToDB();
    if (! $conn) {
        die("Database connection failed: " . $conn->connect_error);
    }
    // SEARCH LOGIC
    $publishersfound = [];
    // add wildcards:
    $_POST['firstname'] = "%" . trim($_POST['firstname']) . "%";
    $_POST['lastname'] = "%" . trim($_POST['lastname']) . "%";
    $_POST['address'] = "%" . trim($_POST['address']) . "%";
    $sqlStmt = $conn->prepare("SELECT * FROM PUBLISHERS WHERE firstname LIKE ? AND lastname LIKE ? AND address LIKE ?;");
    $sqlStmt->bind_param("sss", $_POST['firstname'], $_POST['lastname'], $_POST['address']);
    $sqlStmt->execute();
    $results = $sqlStmt->get_result();
    if ($results->num_rows > 0){
        while ($row = $results->fetch_assoc()){
            $publishersfound[$row['idUser']] = $row;
        }
        echo "<div class=\"container mb-2\">Βρέθηκαν " . $results->num_rows . " εκδότες σύμφωνα με τα κριτήρια αναζήτησης:</div>";
    } else {
        echo "<div class=\"text-center mb-2\">Δεν βρέθηκαν εκδότες σύμφωνα με τα κριτήρια αναζήτησης.</div>";
    }
    $sqlStmt->close();
?>
<ol class="container">
<?php foreach ($publishersfound as $id => $publisher) { 
        include("../publisher_info_box.php"); 
    }
 ?>
</ol>
<?php 
    $conn->close();
?>