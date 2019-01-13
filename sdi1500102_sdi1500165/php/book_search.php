<?php $loginFailed = include("control/sessionManager.php"); ?>
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
    <script src="/sdi1500102_sdi1500165/javascript/lib/popper.min.js"></script>
    <script src="/sdi1500102_sdi1500165/javascript/lib/bootstrap.min.js"></script>
</head>
<body style="overflow-y: scroll">
    <div class="main-container">
        <?php include("headlines.php"); ?>
        <?php include("general_navbar.php"); ?>
        <nav class="my_breadcrump">
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/index.php">Αρχική Σελίδα</a> > 
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/book_search.php">Αναζήτηση Συγγραμμάτων</a>
        </nav>
        <h2 class="orange_header mb-4">Αναζήτηση Συγγραμμάτων</h2>
        <div class="container w-50 border border-dark rounded p-3 bg-light">
            <form id="book_search_form">
                <div class="row">
                    <div class="col-4 mb-2">Τίτλος:</div>
                    <div class="col-8 mb-2">
                        <input id="title_param" class="form-control" type="text" name="title"/>
                    </div>
                    <div class="col-4 mb-2">Συγγραφέας/ες:</div>
                    <div class="col-8 mb-2">
                        <input id="authors" class="form-control" type="text" name="authors"/>
                    </div>
                    <div class="col-4 mb-2">ISBN:</div>
                    <div class="col-8 mb-2">
                        <input id="ISBN" class="form-control" type="text" name="ISBN"/>
                    </div>
                    <div class="col-4 mb-2">Κωδικός Βιβλίου στον Εύδοξο:</div>
                    <div class="col-8 mb-2">
                        <input id="id" class="form-control" type="text" name="id"/>
                    </div> 
                    <div class="col-4 mb-2">Λέξεις Κλειδιά:</div>
                    <div class="col-8 mb-2">
                        <input id="keywords" class="form-control" type="text" name="keywords"/>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-8">
                        <button class="btn btn-dark hover_orange" type="submit">Αναζήτηση</button>
                        <button class="btn btn-outline-danger float-right" type="reset">Clear</button>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <!-- AJAX content down here -->
        <div id="book_search_results">

        </div>
        <br>
        <?php include("../footer.html"); ?>
    </div>
    <script src="/sdi1500102_sdi1500165/javascript/book_search.js"></script>
    <?php include("control/loginFailureHandler.php"); ?>
</body>
</html>