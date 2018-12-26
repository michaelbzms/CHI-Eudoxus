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
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/php/book_declaration1.php">Δήλωση Συγγραμμάτων</a> >
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/php/book_declaration2.php">Επισκόπηση Δήλωσης</a> >
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/book_declaration3.php">Παραλαβή</a>
        </nav>
        <h2 class="orange_header m-3"><?php print "Παραλαβή Συγγραμμάτων"; ?></h2>
        <div class="text-center">
            <button type="submit" class="btn btn-secondary d-inline-block" onClick="alert('Το PIN που θα πρέπει να παρουσιάσετε κατά την παραλαβή των συγγραμμάτων σας είναι:  [PIN]');">Προβολή PIN</button>
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
                        bookModal($bookRow);
                    }
                ?>
                <a href="/sdi1500102_sdi1500165/php/book_declaration1.php" class="d-inline-block"> < Τροποποίηση Δήλωσης </a>
            </div>
        </div>
        <br>
        <?php include("../footer.html"); ?>
    </div>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip(); 
        });
    </script>
</body>
</html>