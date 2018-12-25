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
	<script src="/sdi1500102_sdi1500165/javascript/lib/bootstrap.min.js"></script>
</head>
<body>
    <div class="main-container">
        <?php include("headlines.php") ?>
        <?php include("general_navbar.php"); ?>
        <nav class="my_breadcrump">
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/index.php">Αρχική Σελίδα</a> > 
            <p class="breadcrump_item">Φοιτητές</p> > 
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/php/book_declaration1.php">Δήλωση Συγγραμμάτων</a> >
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/php/book_declaration2.php">Επισκόπηση Δήλωσης</a> >
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/book_declaration3.php">Παραλαβή</a>
        </nav>
        <h2 class="orange_header m-3"><?php print "Παραλαβή Συγγραμμάτων"; ?></h2>
        <h1>UNDER CONSTRUCTION</h1>
        <?php include("../footer.html"); ?>
    </div>
</body>
</html>