<?php $loginFailed = include("control/sessionManager.php"); 
    if ( !isset($_SESSION['userType']) || $_SESSION['userType'] != "student" || !isset($_SESSION['tempBookDeclClassesArr']) || $_SESSION['tempBookDeclClassesArr'] == [] ) {
        header("Location: /sdi1500102_sdi1500165/php/book_declaration1.php");
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
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/book_declaration0.php">Δήλωση Συγγραμμάτων </a>
        </nav>
        <h2 class="orange_header mb-4">Δήλωση Συγγραμμάτων</h2>
        <div class="text-center">
            <p>
                Έχετε ήδη υποβάλει δήλωση συγγραμμάτων για το τρέχον εξάμηνο. Η υποβολή αυτής που έχετε ξεκινήσει θα διαγράψει την παλιά σας.<br>
                Είστε σίγουροι ότι θέλετε να συνεχίσετε;
            </p>
            <div class="mt-4">
                <form action="/sdi1500102_sdi1500165/php/book_declaration3.php" class="d-inline-block" method="POST">
                    <button class="d-inline-block btn btn-danger" name="tempBookDeclSubmitFinal">Ναι, θέλω να υποβάλω την καινούργια μου δήλωση</button>
                </form>
                <form action="/sdi1500102_sdi1500165/php/book_declaration3.php" class="d-inline-block" method="POST">
                    <button class="d-inline-block btn btn-dark hover_orange" name="bookDeclKeepOld">Όχι, θέλω να κρατήσω την παλιά μου δήλωση</button>
                </form>
            </div>
        </div>
        <?php include("../footer.html"); ?>
    </div>
    <script src="/sdi1500102_sdi1500165/javascript/student.js"></script>
    <script src="/sdi1500102_sdi1500165/javascript/tooltipInit.js"></script>
    <script src="/sdi1500102_sdi1500165/javascript/formResubmissionPrevention.js"></script>
    <?php include("control/loginFailureHandler.php"); ?>
<body>
</head>