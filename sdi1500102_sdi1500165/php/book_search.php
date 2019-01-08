<?php include("control/sessionManager.php") ?>
<!DOCTYPE html>
<?php $active_page = "BookSearch"; ?>
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
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/book_search.php">Αναζήτηση Συγγραμμάτων</a>
        </nav>
        <div>
            <h2 class="orange_header">Αναζήτηση Συγγραμμάτων - Under Construction (Modal check)</h2>
            <h5> Insert search form here <h5>
            <div>
                <?php include("bookModal.php") ?>
                <?php
                    $conn = connectToDB();
                    $Books = getClassBooks($conn, 5);
                    foreach ($Books as $book) {
                        echo "<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#book{$book['idBook']}\">
                            {$book['title']}
                        </button>";
                        bookModal($conn, $book);
                    }
                ?>
            </div>
        </div>
        <br>
        <?php include("../footer.html"); ?>
    </div>
</body>
</html>