<?php
    include("../control/sessionManager.php");
    include("../bookModal.php"); 
    $conn = connectToDB();
    if (! $conn) {
        die("Database connection failed: " . $conn->connect_error);
    }
    // SEARCH LOGIC
    $nonexistantword = "##############";
    $booksfound = [];
    if (isset($_POST['id']) && $_POST['id'] != ""){   // search only needs to use idBook
        $sqlStmt = $conn->prepare("SELECT * FROM BOOKS WHERE idBook = ?");
        $sqlStmt->bind_param("i", $_POST['id']);
        $sqlStmt->execute();
        $results = $sqlStmt->get_result();
        if ($results->num_rows > 0){
            while ($row = $results->fetch_assoc()){
                $booksfound[$row['idBook']] = $row;
            }
            echo "<div class=\"container mb-2\">To βιβλίο με κωδικό " . $_POST['id']  . " είναι το εξής:</div>";
        } else {
            echo "<div class=\"container mb-2\">Δεν υπάρχει βιβλίο με κωδικό " . $_POST['id'] . " στον Εύδοξο.</div>";
        }
        $sqlStmt->close();
    } else {   // search will use all of the other fields
        // add wildcards:
        $_POST['title'] = "%" . trim($_POST['title']) . "%";
        $_POST['authors'] = "%" . trim($_POST['authors']) . "%";
        $_POST['ISBN'] = "%" . trim($_POST['ISBN']) . "%";
        if ( str_replace(' ', '', $_POST['keywords']) == "" ){  // no keywords given
            $sqlStmt = $conn->prepare("SELECT * FROM BOOKS WHERE title LIKE ? AND authors LIKE ? AND ISBN LIKE ?;");
            $sqlStmt->bind_param("sss", $_POST['title'], $_POST['authors'], $_POST['ISBN']);
        } else {   // keywords given
            $input_text = $_POST['keywords'];
            $input_words = preg_split('/\s+/', $input_text);
            for ($i = 0 ; $i < count($input_words) ; $i++){     // convert everything to lowercase
                $input_words[$i] = mb_strtolower($input_words[$i]);
            }
            for ($i = count($input_words) ; $i < 10 ; $i++){    // if under 10 words add more
                $input_words[$i] = $nonexistantword;            // a word that will not exists and as such not affect the outcome
            }
            // add wildcards to input words
            for ($i = 0 ; $i < 10 ; $i++){
                if ($input_words[$i] != $nonexistantword) $input_words[$i] = '%' . $input_words[$i] . '%';
            }
            $sqlStmt = $conn->prepare("SELECT * FROM BOOKS WHERE title LIKE ? AND authors LIKE ? AND ISBN LIKE ? AND (keywords LIKE ? OR keywords LIKE ? OR keywords LIKE ? OR keywords LIKE ? OR keywords LIKE ? OR keywords LIKE ? OR keywords LIKE ? OR keywords LIKE ? OR keywords LIKE ? OR keywords LIKE ?);");
            $sqlStmt->bind_param("sssssssssssss", $_POST['title'], $_POST['authors'], $_POST['ISBN'], $input_words[0], $input_words[1], $input_words[2], $input_words[3], $input_words[4], $input_words[5], $input_words[6], $input_words[7], $input_words[8], $input_words[9]);
        }
        $sqlStmt->execute();
        $results = $sqlStmt->get_result();
        if ($results->num_rows > 0){
            while ($row = $results->fetch_assoc()){
                $booksfound[$row['idBook']] = $row;
            }
            echo "<div class=\"container mb-2\">Βρέθηκαν " . $results->num_rows . " βιβλία σύμφωνα με τα κριτήρια αναζήτησης:</div>";
        } else {
            echo "<div class=\"container mb-2\">Δεν βρέθηκαν βιβλία σύμφωνα με τα κριτήρια αναζήτησης.</div>";
        }
        $sqlStmt->close();
    }
?>
<ol class="container">
<?php foreach ($booksfound as $id => $book) { 
        include("../book_info_box.php"); 
    }
    foreach ($booksfound as $id => $book) {
        bookModal($conn, $book);
    }
 ?>
</ol>
<?php 
    $conn->close();
?>
