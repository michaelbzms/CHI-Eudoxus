<?php include("control/sessionManager.php") ?>
<!DOCTYPE html>
<?php $active_page = "BookDeclaration"; ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eudoxus</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/books.css"/>
	<link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/lib/bootstrap.min.css"/>
	<!-- JS -->
	<script src="/sdi1500102_sdi1500165/javascript/lib/jquery-3.3.1.min.js"></script>
    <script src="/sdi1500102_sdi1500165/javascript/lib/popper.min.js"></script>
	<script src="/sdi1500102_sdi1500165/javascript/lib/bootstrap.min.js"></script>
</head>
<body>
    <div class="main-container">
        <?php include("headlines.php") ?>
        <?php include("general_navbar.php"); ?>
        <nav class="my_breadcrump">
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/index.php">Αρχική Σελίδα</a> > 
            <p class="breadcrump_item">Φοιτητές</p> > 
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/php/book_declaration1.php">Δήλωση Συγγραμμάτων (1/3)</a> >
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/php/book_declaration2.php">Επισκόπηση Δήλωσης (2/3)</a> >
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/book_declaration3.php">Παραλαβή Συγγραμμάτων (3/3)</a>
        </nav>
        <?php 
            $conn = connectToDB();
            if (! $conn) {
                die("Database connection failed: " . $conn->connect_error);
            }
            $hasSession = isset($_SESSION['userID']);
            if ( $hasSession && isset($_SESSION['userType']) && $_SESSION['userType'] == 'student' ) {
                $declaration_period = "2018-09";
                if ( isset($_POST['bookDeclSubmitFinal']) ) {
                    // delete previous book declaration
                    if ( ! $conn->query("DELETE FROM BOOK_DECLARATION WHERE STUDENTS_id={$_SESSION['userID']};") ) {
                        die("Failed to delete previous book declaration from database: {$conn->error}");
                    }
                    // Insert book declaration to DB
                    $generatedPIN = mt_rand(100000000, 999999999);          // substr( md5($_SESSION['userID'] . $declaration_period), 0, 10 );
                    if ( ! $conn->query("INSERT INTO BOOK_DECLARATION (idDeclaration, STUDENTS_id, PIN, declaration_period) VALUES (default, {$_SESSION['userID']}, $generatedPIN, '$declaration_period');") ) {
                        die("Failed to insert book declaration to database: {$conn->error}");
                    }
                    $declarationId = $conn->insert_id;
                    for ($i = 0; $i < count($_SESSION['bookDeclClassesArr']); $i++) {
                        if ( ! $conn->query("INSERT INTO BOOK_CLASS_TUPLES (BOOK_DECLARATION_id, UNIVERSITY_CLASSES_id, BOOKS_id, received) VALUES ($declarationId, {$_SESSION['bookDeclClassesArr'][$i]}, {$_SESSION['bookDeclBooksArr'][$i]}, false);") ) {
                            die("Failed to insert book_class_tuple to database: {$conn->error}");
                        }
                    } 
                }
                $result = $conn->query("SELECT * FROM BOOK_DECLARATION WHERE STUDENTS_id={$_SESSION['userID']} AND declaration_period='$declaration_period';");
                if ($result->num_rows == 0) {
                    die("Could not fetch book declaration from DB");
                }
                $bookDeclaration = $result->fetch_assoc();
                $studentPIN = $bookDeclaration['PIN'];
                exit();
        ?>
            <h2 class="orange_header m-3"><?php print "Παραλαβή Συγγραμμάτων"; ?></h2>
            <div class="text-center">
                <button type="submit" class="btn btn-secondary d-inline-block" onClick="alert('Το PIN που θα πρέπει να παρουσιάσετε κατά την παραλαβή των συγγραμμάτων σας είναι:  <?php echo $studentPIN; ?>');">Προβολή PIN</button>
            </div> 
            <div class="row justify-content-center">
                <div class="col-10 m-2 text_div">
                    <div class="row mb-2">
                        <div class="col-6 text-center">
                            <h3 class="text-primary mb-2 d-inline-block">Συγγράμματα</h3>
                        </div>
                        <div class="col-6 text-center">
                            <h3 class="text-primary mb-2 d-inline-block">Επιλογές Παραλαβής</h3>
                        </div>
                    </div>
                    <?php include("printReceivingBookRow.php") ?>
                    <?php include("bookModal.php") ?>
                    <?php
                        $selectedSubjects = ["subject", "Τεχνητή Νοημοσύνη"];
                        if ( count($selectedSubjects) == 0 ) echo "Δεν επιλέχθηκαν συγγράμματα";    // TODO error messsage?
                        $selectedBooksRows = [ ["eudoxusID", "title", "authors", "version", "versionYear", "keywords", "ISBN", "Publisher", "Tie", "dimensions", "pageNum", "website", "contents", "excerpt", "frontpage", "backpage", false], [13909, "ΤΕΧΝΗΤΗ ΝΟΗΜΟΣΥΝΗ: ΜΙΑ ΣΥΓΧΡΟΝΗ ΠΡΟΣΕΓΓΙΣΗ", "STUART RUSSELL, PETER NORVIG", "2η", "2005", "ΕΜΠΕΙΡΑ ΣΥΣΤΗΜΑΤΑ, ΕΥΦΥΗ ΣΥΣΤΗΜΑΤΑ, ΘΕΩΡΙΑ ΛΗΨΗΣ ΑΠΟΦΑΣΕΩΝ, ΛΟΓΙΚΟΣ ΠΡΟΓΡΑΜΜΑΤΙΣΜΟΣ, ΜΗΧΑΝΙΚΗ ΓΝΩΣΗΣ, ΠΡΑΚΤΟΡΕΣ, ΤΕΧΝΗΤΗ ΝΟΗΜΟΣΥΝΗ", "960-209-873-2", "ΕΚΔΟΣΕΙΣ ΚΛΕΙΔΑΡΙΘΜΟΣ ΕΠΕ", "Σκληρό Εξώφυλλο", "[21 x 29]", "1200", "https://www.klidarithmos.gr/texnhth-nohmosynh-2h-ekdosh", "https://static.eudoxus.gr/books/09/toc-13909.pdf", "https://static.eudoxus.gr/books/09/chapter-13909.pdf", "https://static.eudoxus.gr/books/preview/09/cover-13909.jpg", "https://static.eudoxus.gr/books/preview/09/backcover-13909.jpg", true] ];
                        for ($i = 0; $i < count($selectedSubjects); $i++) {
                            printReceivingBookRow($selectedSubjects[$i], $selectedBooksRows[$i]);
                        }
                        foreach ($selectedBooksRows as $bookRow) {
                            bookModal($conn, $bookRow);
                        }
                    ?>
                    <a href="/sdi1500102_sdi1500165/php/book_declaration1.php" class="d-inline-block"> < Τροποποίηση Δήλωσης </a>
                </div>
            </div>
            <br>
            <script>
                $(document).ready(function(){
                    $('[data-toggle="tooltip"]').tooltip(); 
                });
            </script>
        <?php
            } else if (!$hasSession){
                include("../notconnected.html");
            } else {
                include("../unauthorized.html");
            } 
            include("../footer.html"); 
            $conn->close();
        ?>
    </div>
</body>
</html>