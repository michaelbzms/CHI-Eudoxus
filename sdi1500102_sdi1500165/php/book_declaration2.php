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
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/book_declaration2.php">Επισκόπηση Δήλωσης</a>
        </nav>
        <h2 class="orange_header m-3"><?php print "Επισκόπηση Δήλωσης Συγγραμμάτων"; ?></h2>
        <?php include("bookModal.php") ?>
        <?php
            $Departments = ["Νομική (Τμήμα Φοιτητή)", "Φιλοσοφική", "Μαθηματικό"];
            foreach ($Departments as $dpt) {
                $selectedSubjects = ["subject", "Τεχνητή Νοημοσύνη"];
                if ( count($selectedSubjects) == 0 ) continue;
                echo "<h3 class=\"text-primary mb-2\">&ensp;$dpt</h3>";
                // get these with AJAX or something?
                $selectedBooksRows = [ ["eudoxusID", "title", "authors", "version", "versionYear", "keywords", "ISBN", "Publisher", "Tie", "dimensions", "pageNum", "website", "contents", "excerpt", "frontpage", "backpage"], [13909, "ΤΕΧΝΗΤΗ ΝΟΗΜΟΣΥΝΗ: ΜΙΑ ΣΥΓΧΡΟΝΗ ΠΡΟΣΕΓΓΙΣΗ", "STUART RUSSELL, PETER NORVIG", "2η", "2005", "ΕΜΠΕΙΡΑ ΣΥΣΤΗΜΑΤΑ, ΕΥΦΥΗ ΣΥΣΤΗΜΑΤΑ, ΘΕΩΡΙΑ ΛΗΨΗΣ ΑΠΟΦΑΣΕΩΝ, ΛΟΓΙΚΟΣ ΠΡΟΓΡΑΜΜΑΤΙΣΜΟΣ, ΜΗΧΑΝΙΚΗ ΓΝΩΣΗΣ, ΠΡΑΚΤΟΡΕΣ, ΤΕΧΝΗΤΗ ΝΟΗΜΟΣΥΝΗ", "960-209-873-2", "ΕΚΔΟΣΕΙΣ ΚΛΕΙΔΑΡΙΘΜΟΣ ΕΠΕ", "Σκληρό Εξώφυλλο", "[21 x 29]", "1200", "https://www.klidarithmos.gr/texnhth-nohmosynh-2h-ekdosh", "https://static.eudoxus.gr/books/09/toc-13909.pdf", "https://static.eudoxus.gr/books/09/chapter-13909.pdf", "https://static.eudoxus.gr/books/preview/09/cover-13909.jpg", "https://static.eudoxus.gr/books/preview/09/backcover-13909.jpg"] ];
                echo "<table class=\"table table-striped table-bordered border book_table mb-4\" style=\"border: 2px solid gray!important\">";
                for ($i = 0; $i < count($selectedSubjects); $i++) {
                    // [eudoxusID, title, authors, version, versionYear, keywords, ISBN, Publisher, Tie, dimensions, pageNum, website, contents, excerpt, frontpage, backpage]
                    echo "
                        <tr>
                            <th style=\"border-right: 2px solid gray!important\">$selectedSubjects[$i]</th>
                            <th class=\"font-weight-normal\"><strong>[" . $selectedBooksRows[$i][0] . "]:</strong> <span class=\"bookModalSpan\" data-toggle=\"modal\" data-target=\"#book" . $selectedBooksRows[$i][0] . "\">" . $selectedBooksRows[$i][1] . "</span> | " . $selectedBooksRows[$i][2] . "</th>
                        </tr>";
                }
                echo "</table>";
                foreach ($selectedBooksRows as $bookRow) {
                    bookModal($bookRow);
                }
            } 
        ?>
        <div class="text-center">
            <a href="/sdi1500102_sdi1500165/php/book_declaration1.php" class="d-inline-block"> < Τροποποίηση Δήλωσης </a>
            <button type="submit" class="btn btn-dark hover_orange d-inline-block ml-3 mr-5" onClick="window.location='book_declaration3.php';">Συνέχεια</button>
        </div>  
        <br>
        <?php include("../footer.html"); ?>
    </div>
</body>
</html>