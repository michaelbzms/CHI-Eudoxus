<!DOCTYPE html>
<?php $active_page = "SecretaryApp"; ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eudoxus</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/secretary.css"/>
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/navbar.css"/>
	<link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/lib/bootstrap.min.css"/>
	<!-- JS -->
	<script src="/sdi1500102_sdi1500165/javascript/lib/jquery-3.3.1.min.js"></script>
	<script src="/sdi1500102_sdi1500165/javascript/lib/bootstrap.min.js"></script>
</head>
<body>
    <div class="main-container">
        <?php include("headlines.php") ?>
        <?php include("general_navbar.php"); ?>
        <nav class="my_breadcrump">
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/index.php">Αρχική Σελίδα</a> > 
            <p class="breadcrump_item">Γραμματείες</p> > 
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/php/secretary_app.php">Διαχείριση Μαθημάτων/Συγγραμμάτων</a> > 
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/php/secretary_app2.php">Υποβολή Μαθημάτων</a> > 
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/secretary_app3.php">Υποβολή Συγγραμμάτων</a>
        </nav>
        <h2 class="orange_header mb-4">Υποβολή Συγγραμμάτων Μαθημάτων του ΠΣ</h2>
        <?php 
            // check in all secretary_app.php pages for safety (and also backend)
            $alreadyUploadedPS = False;  // TODO: check in with db
            if  ( $alreadyUploadedPS ) { 
        ?>
            <div class="text-center">
                <p>
                    Έχετε ήδη κάνει μία υποβολή για το νέο Πρόγραμμα Σπουδών για το τρέχον ακαδημαϊκό έτος.
                    Θέλετε να τροποποιήσετε αυτήν ή να υποβάλετε νέα;
                </p>
                <div class="mt-4">
                    <button id="modify" class="d-inline-block btn btn-dark hover_orange">Τροποποίηση Τρέχουσας Υποβολής</button>
                    <button id="submit_new" class="d-inline-block btn btn-dark hover_orange">Νέα Υποβολή</button>
                </div>
            </div>
        <?php } else { ?>
            <div class="container m-0">
                <div class="row">
                    <div class="col-4">
                        HERE GOES LIST OF CLASSES
                    </div>
                    <div class="col-8">
                        HERE IS OPTIONS
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php include("../footer.html"); ?>
    </div>
    <script src="/sdi1500102_sdi1500165/javascript/secretary.js"></script>
<body>
</head>