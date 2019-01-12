<?php include("control/sessionManager.php") ?>
<?php 
    if ( isset($_POST['loginSubmit']) && $_SESSION['userType'] == "student" && $_SESSION['bookDeclClassesArr'] != [] && $_SESSION['bookDeclBooksArr'] != []) {
        header("Location: /sdi1500102_sdi1500165/php/book_declaration3.php");
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
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/book_declaration2.php">Επισκόπηση Δήλωσης (2/3)</a>
        </nav>
        <?php 
            $conn = connectToDB();
            if (! $conn) {
                die("Database connection failed: " . $conn->connect_error);
            }
            $isLoggedInStudent = isset($_SESSION['userID']) && isset($_SESSION['userType']) && $_SESSION['userType'] == 'student';
            // Handle book_declaration1.php form:
            if ( isset($_POST['bookDeclSubmit']) ) {
                $_SESSION['bookDeclClassesArr'] = [];
                $_SESSION['bookDeclBooksArr'] = [];
                $semNum = getDptNumberOfSemesters($conn, $_SESSION['bookDeclUni'], $_SESSION['bookDeclDpt']);
                $i = 1;     // TODO: period?
                for (; $i <= $semNum; $i += 2) {
                    $semClasses = getDptSemClasses($conn, $_SESSION['bookDeclUni'], $_SESSION['bookDeclDpt'], $i);
                    foreach ($semClasses as $class) {
                        if ( isset($_POST["class{$class['idClass']}"]) && isset($_POST["book{$class['idClass']}"]) ) {
                            $_SESSION['bookDeclClassesArr'][] = $class['idClass'];
                            $_SESSION['bookDeclBooksArr'][] = $_POST["book{$class['idClass']}"];
                        }
                    }
                }
            }
            if ( isset($_SESSION['bookDeclBooksArr']) && $_SESSION['bookDeclBooksArr'] != [] ) {
        ?>
                <h2 class="orange_header mt-3 mb-4">Επισκόπηση Δήλωσης Συγγραμμάτων</h2>
                <?php include("bookModal.php") ?>
                <?php
                    $classesInOrder = getDeclaredInOrder($conn, "classes", $_SESSION['bookDeclClassesArr']);
                    $booksInOrder = [];
                    foreach ($_SESSION['bookDeclBooksArr'] as $bookId) {
                        $booksInOrder[] = getByID($conn, "book", $bookId);
                    }
                    echo "<div class=\"container\"><table class=\"table table-striped table-bordered border book_table mb-4\" style=\"border: 2px solid gray!important\">";
                    for ($i = 0; $i < count($classesInOrder); $i++) { 
                        if ( isset($classesInOrder[$i]['FREE_CLASS_SECRETARIES_id']) ) $freeClassDpt = "&ensp;(" . getDptForSecretary($conn, $classesInOrder[$i]['FREE_CLASS_SECRETARIES_id']) . ")";
                        else $freeClassDpt = "";
                        echo "
                            <tr>
                                <th style=\"border-right: 2px solid gray!important\">{$classesInOrder[$i]['title']}<span class=\"font-weight-normal\">$freeClassDpt</span></th>
                                <th class=\"font-weight-normal\"><strong>[{$booksInOrder[$i]['idBook']}]:</strong> <span class=\"simpler_link bookModalSpan\" data-toggle=\"modal\" data-target=\"#book{$booksInOrder[$i]['idBook']}\">{$booksInOrder[$i]['title']}</span> | {$booksInOrder[$i]['authors']}</th>
                            </tr>";
                    } 
                    echo "</table></div>";
                    foreach ($booksInOrder as $book) {
                        bookModal($conn, $book);
                    }
                ?>
                <div class="text-center">
                    <a href="/sdi1500102_sdi1500165/php/book_declaration1.php" class="d-inline-block grey_link"> < Τροποποίηση Δήλωσης </a>
                    <?php if ($isLoggedInStudent) { ?>
                            <form id="submit_book_declaration_form" action="/sdi1500102_sdi1500165/php/book_declaration3.php" class="d-inline-block" method="POST">
                                <button type="submit" class="btn btn-dark hover_orange ml-3 mr-5" name="bookDeclSubmitFinal">Υποβολή Δήλωσης</button>
                            </form>
                    <?php } else { ?>
                            <button class="btn btn-dark ml-3 mr-5 disabled" data-toggle="tooltip" data-placement="right" data-html="true" title="Για να υποβάλετε τη δήλωση πρέπει πρώτα να <a class=&quot;linklike&quot; data-toggle=&quot;modal&quot; data-target=&quot;#loginModal&quot;>συνδεθείτε</a> ως φοιτητής." data-delay='{"hide":"5000"}'>Υποβολή Δήλωσης</button>
                            <script>
                                $(document).ready(function(){
                                    $('[data-toggle="tooltip"]').tooltip();
                                });
                            </script>
                    <?php } ?>
                </div>  
                <br>
        <?php
            } else { ?>
                <div class="text-center">
                    <div class="alert-warning p-3 ml-5 mr-5">
                        <p>⚠ Για να υποβάλλετε μία δήλωση συγγραμμάτων πρέπει πρώτα να <a href="/sdi1500102_sdi1500165/php/book_declaration1.php">επιλέξετε συγγράμματα</a>!</p>
                    </div>
                    <img class="mt-3" src="/sdi1500102_sdi1500165/images/oops-sign.jpg"/>
                </div>
        <?php
            } 
            include("../footer.html"); 
            $conn->close();
        ?>
    </div>
    <script src="/sdi1500102_sdi1500165/javascript/student.js"></script>
</body>
</html>