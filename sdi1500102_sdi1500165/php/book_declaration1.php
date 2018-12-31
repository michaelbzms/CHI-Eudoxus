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
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/book_declaration1.php">Δήλωση Συγγραμμάτων</a>
        </nav>
        <h2 class="orange_header m-3"><?php print "Δήλωση Συγγραμμάτων"; ?></h2>
        <form action="/sdi1500102_sdi1500165/php/book_declaration2.php" method="POST">
            <div class="form-group">
                <label>&emsp;&emsp;&emsp; Τμήμα: &ensp;</label>
                <select class="form-control d-inline-block w-25">
                    <?php
                        $Departments = ["Νομική (Τμήμα Φοιτητή)", "Φιλοσοφική", "Μαθηματικό"];
                        foreach ($Departments as $dpt){
                            echo "<option>$dpt</option>";
                        } 
                    ?>
                </select>
            </div>
            <div class="row">
                <div class="col-2">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                        <?php
                            $Semesters = ["1ο Εξάμηνο", "3ο Εξάμηνο", "5ο Εξάμηνο", "7ο Εξάμηνο"];
                            $i = 1;
                            foreach ($Semesters as $sem){
                                if ($i == 1) {
                                    echo "<a class=\"nav-link active\" id=\"v-pills-tab1-tab\" data-toggle=\"pill\" href=\"#v-pills-tab1\" role=\"tab\" aria-controls=\"v-pills-tab1\" aria-expanded=\"true\">$sem</a>";
                                } else {
                                    echo "<a class=\"nav-link\" id=\"v-pills-tab$i-tab\" data-toggle=\"pill\" href=\"#v-pills-tab$i\" role=\"tab\" aria-controls=\"v-pills-tab$i\" aria-expanded=\"true\">$sem</a>";
                                }
                                $i++;
                            } 
                        ?>
                    </div>
                </div>
                <div class="col-10">
                    <div class="tab-content" id="v-pills-tabContent">
                        <!-- something something -->
                        <div class="tab-pane fade show active" id="v-pills-tab1" role="tabpanel" aria-labelledby="v-pills-home-tab">UNDER CONSTRUCTION</div>
                        <div class="tab-pane fade" id="v-pills-tab2" role="tabpanel" aria-labelledby="v-pills-tab2-tab">Here is a content for tab 2.</div>
                        <div class="tab-pane fade" id="v-pills-tab3" role="tabpanel" aria-labelledby="v-pills-tab3-tab">Here is a content for tab 3.</div>
                        <div class="tab-pane fade" id="v-pills-tab4" role="tabpanel" aria-labelledby="v-pills-tab4-tab">Here is a content for tab 4.</div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-dark hover_orange">Συνέχεια</button>
            </div>         
        </form>
        <?php include("../footer.html"); ?>
    </div>
</body>
</html>