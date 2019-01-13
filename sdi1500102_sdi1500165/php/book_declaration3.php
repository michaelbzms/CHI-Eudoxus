<?php $loginFailed = include("control/sessionManager.php"); ?>
<?php
    if ( isset($_SESSION['tempBookDeclClassesArr']) && isset($_SESSION['tempBookDeclClassesArr']) != 0 && !isset($_POST['tempBookDeclSubmitFinal']) && !isset($_POST['bookDeclKeepOld'])) {
        header("Location: /sdi1500102_sdi1500165/php/book_declaration0.php");
        exit();
    }
?>
<!DOCTYPE html>
<?php $active_page = "BookDeclaration"; ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eudoxus</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/student.css"/>
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
                if ( isset($_POST['tempBookDeclSubmitFinal']) ) {
                    $_SESSION['bookDeclClassesArr'] = $_SESSION['tempBookDeclClassesArr'];
                    $_SESSION['bookDeclBooksArr'] = $_SESSION['tempBookDeclBooksArr'];
                }
                if ( isset($_POST['bookDeclSubmitFinal']) || isset($_POST['tempBookDeclSubmitFinal']) ) {
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
                if (isset($_SESSION['tempBookDeclClassesArr'])) unset($_SESSION['tempBookDeclClassesArr']);
                if (isset($_SESSION['tempBookDeclBooksArr'])) unset($_SESSION['tempBookDeclBooksArr']);

                $result = $conn->query("SELECT * FROM BOOK_DECLARATION WHERE STUDENTS_id={$_SESSION['userID']} AND declaration_period='$declaration_period';");
                if ($result->num_rows == 0) {
                    die("Could not fetch book declaration from DB");
                }
                $bookDeclaration = $result->fetch_assoc();
                $studentPIN = $bookDeclaration['PIN'];
        ?>
                <h2 class="orange_header mt-3 mb-4">Παραλαβή Συγγραμμάτων</h2>
                <div class="text-center">
                    <button type="submit" class="btn btn-secondary d-inline-block" onClick="alert('Το PIN που θα πρέπει να παρουσιάσετε κατά την παραλαβή των συγγραμμάτων σας είναι:  <?php echo $studentPIN; ?>');">Προβολή PIN</button>
                </div> 
                <div class="row justify-content-center">
                    <div class="col-11 m-2 text_div">
                        <div class="row mb-2">
                            <div class="col-6 text-center">
                                <h3 class="text-dark mb-2 d-inline-block">Συγγράμματα</h3>
                            </div>
                            <div class="col-6 text-center">
                                <h3 class="text-dark mb-2 d-inline-block">Επιλογές Παραλαβής</h3>
                            </div>
                        </div>
                        <?php 
                            include("printReceivingBookRow.php");
                            include("bookModal.php");
                            $bookIds = [];
                            $bookClassTuples = getBookDeclarationTuples($conn, "declarationId", $bookDeclaration['idDeclaration']);
                            foreach ($bookClassTuples as $bcTuple) {
                                printReceivingBookRow($conn, $bcTuple);
                                $bookIds[] = $bcTuple['BOOKS_id'];
                            }
                            $declaredBooks = getDeclaredInOrder($conn, "books", $bookIds);
                            foreach ($declaredBooks as $book) {
                                bookModal($conn, $book);
                            }
                        ?>
                        <a href="/sdi1500102_sdi1500165/php/book_declaration1.php" class="d-inline-block grey_link mt-3 mb-4"> < Τροποποίηση Δήλωσης </a>
                    </div>
                </div>
                <br>
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
    <script src="/sdi1500102_sdi1500165/javascript/student.js"></script>
    <script src="/sdi1500102_sdi1500165/javascript/tooltipInit.js"></script>
    <script src="/sdi1500102_sdi1500165/javascript/formResubmissionPrevention.js"></script>
    <?php include("control/loginFailureHandler.php"); ?>
</body>
</html>