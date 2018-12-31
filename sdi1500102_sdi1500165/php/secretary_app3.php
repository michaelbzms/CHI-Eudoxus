<?php include("control/sessionManager.php") ?>
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
            // TODO: get classes from db
            $classes = [[12101,'Γραμμική Άλγεβρα'], [12102, 'Πιθανότητες Ι'], [12103, 'Ανάλυση Ι'], [12104, 'Θεωρία Παιγνίων'], [12105, 'Στατιστική Ι'], [12106, 'Στοχαστικός Λογισμός'], [12107, 'Επιχειρισιακή Έρευνα'], [12108, 'Διαφορική Γεωμετρία'], [12109, 'Ανάλυση ΙΙ'], [12110, 'Πιθανότητες ΙΙ'], [12112, 'Μιγαδική Ανάλυση']];    
        ?>
        <div>
            <div class="row">
                <div class="col-4 pr-0">
                    <ul id="left_class_list">
                        <?php
                            $i = 0;
                            foreach ($classes as $class){
                                echo <<<EOT
                                    <li id="selector_$i" class="left_class_list_item">
                                        [$class[0]] $class[1]
                                    </li>
                                    <script> <!-- scripts for selecting classes from the list -->
                                        $("#selector_$i").on("click", function(){
                                            $("#noselection").hide();
                                            $(".content").hide();
                                            $("#content_$i").show();
                                        });
                                    </script>
EOT;
                                $i++;
                            }
                        ?>
                    </ul>
                </div>
                <div class="col-8 class_books_div">
                    <div id="noselection">
                        <p>Επιλέξτε ένα μάθημα από την λίστα αριστερά για να προσθέσετε τα συγγράμματά του.</p>
                    </div>
                    <?php
                        $i = 0;
                        foreach ($classes as $class){
                            echo <<<EOT
                                <div id="content_$i" class="content" style="display: none">
                                    <span class="id_span">[$class[0]]</span><h2>$class[1]</h2><br>
                                    <p class="mb-0">Προσθήκη/Αφαίρεση συγγραμμάτων:</p><br>
                                    <ol>
EOT;
                                        $books = []; //TODO get from db
                                        foreach ($books as $book) {
                                            echo "<li>book_info</li>\n";  // TODO: show book
                                        }
                                echo <<<EOT
                                        <li>
                                            <form class="add_book_form"> <!-- AJAX form to add new book -->
                                                <div class="row">
                                                    <div class="col-2">
                                                        <img style="height: 100px; width: 100px;" class="plus_img" src="/sdi1500102_sdi1500165/images/add_green_plus.png"/>
                                                    </div>
                                                    <div class="col-10">
                                                        <label>Κωδικός Συγγράμματος στον Εύδοξο:</label><br>
                                                        <input class="form-control book_id_input" type="text" name="book_id"/>
                                                        <button type="submit" class="btn btn-success mt-2">Προσθήκη</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </li>
                                    </ol>
                                </div>
EOT;
                            $i++;
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php include("../footer.html"); ?>
    </div>
    <script src="/sdi1500102_sdi1500165/javascript/secretary.js"></script>
<body>
</head>