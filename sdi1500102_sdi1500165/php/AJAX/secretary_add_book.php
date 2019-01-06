<?php 
    include("../control/sessionManager.php");
    $conn = connectToDB();
    if ( $conn->connect_errno ) { die("AJAX Database connection failed: " . $conn->connect_error); }
    $hasSession = isset($_SESSION['userID']);
    if ( $hasSession && isset($_SESSION['userType']) && $_SESSION['userType'] == 'secretary' ) {
        $secretary_id = $_SESSION['userID'];
        
        // First check if book id given exists and if so get any necessary fields
        $sqlStmt1 = $conn->prepare("SELECT title, authors, ISBN, published_year, front_page_url FROM BOOKS WHERE idBook = ?");
        $sqlStmt1->bind_param("s", $_POST['idBook']);
        $sqlStmt1->execute();
        $results1 = $sqlStmt1->get_result();
        if ( $results1->num_rows > 0){ // exists
            
            // Check if that book is already on this class's "has_BOOKS" list
            $sqlStmt2 = $conn->prepare("SELECT 1 FROM UNIVERSITY_CLASSES_has_BOOKS WHERE BOOKS_id = ? AND UNIVERSITY_CLASSES_id = ? AND EXISTS (SELECT 1 FROM UNIVERSITY_CLASSES WHERE idClass = ? AND SECRETARIES_id = $secretary_id);");
            $sqlStmt2->bind_param("sss", $_POST['idBook'], $_POST['idClass'], $_POST['idClass']);
            $sqlStmt2->execute();
            $results2 = $sqlStmt2->get_result();
            if ( $results2->num_rows == 0 ){  // does not already exist on list
                
                // add new class-book association to db
                $sqlStmt3 = $conn->prepare("INSERT INTO eudoxusdb.UNIVERSITY_CLASSES_has_BOOKS (`UNIVERSITY_CLASSES_id`, `BOOKS_id`) VALUES (?, ?)"); 
                $sqlStmt3->bind_param("ss", $_POST['idClass'], $_POST['idBook']);
                $sqlStmt3->execute();
                $sqlStmt3->close();

                // create book object
                $row = $results1->fetch_assoc();
                $book = [$row['title'], $row['authors'], $row['published_year'], $row['ISBN'], ($row['front_page_url'] != null) ? $row['front_page_url'] : "/sdi1500102_sdi1500165/images/default_book_front_page.jpg"];

                // then return it to be dynamically added to view
                $book_id = $_POST['idBook'];
                echo <<<EOT
                <li book_id="$book_id">
                    <div class="row">
                        <div class="col-2"><img class="book_cover_icon" src="$book[4]"/></div>
                        <div class="col-10">
                            <h3>$book[0]</h3><img class="delete_book_box" src="/sdi1500102_sdi1500165/images/red_cross_box.png"/><br>
                            <span class="field_span"><label>Συγγραφέας/ες:</label> $book[1]</span><span class="field_span"><label>Έτος:</label> $book[2]</span><br>
                            <label>ISBN:</label> $book[3]<br>
                        </div>
                    </div>
                </li>
EOT;
            } else {   // already exists on book list
                echo "ALREADY_EXISTS";
            }
            $sqlStmt2->close();
        } else {   // does not exist as a book
            echo "NOT_EXISTS";
        }
        $sqlStmt1->close();
    } else {
        echo "NO_SESSION";
    }
    $conn->close();
?>