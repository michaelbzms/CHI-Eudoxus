<?php $loginFailed = include("control/sessionManager.php"); ?>
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
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/php/secretary_app.php">Διαχείριση Μαθημάτων/Συγγραμμάτων (1/3)</a> > 
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/php/secretary_app2.php">Υποβολή Μαθημάτων (2/3)</a> > 
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/secretary_app3.php">Υποβολή Συγγραμμάτων (3/3)</a>
        </nav>
        <?php 
            $conn = connectToDB();
            if (! $conn) {
                die("Database connection failed: " . $conn->connect_error);
            }
            $hasSession = isset($_SESSION['userID']);
            if ( $hasSession && isset($_SESSION['userType']) && $_SESSION['userType'] == 'secretary' ) {
                $secretary_id = $_SESSION['userID'];
                $affiliated_departments = getAllDepartementsForUniExceptGiven($conn, getUniForSecretary($conn, $secretary_id), $secretary_id);
                $sqlQuery1 = "SELECT idClass, code, title, professors, semester, FREE_CLASS_SECRETARIES_id FROM UNIVERSITY_CLASSES WHERE SECRETARIES_id = $secretary_id ORDER BY semester;";
                $result1 = $conn->query($sqlQuery1);
                $classes = [];
                if ($result1->num_rows > 0){
                    while ($row = $result1->fetch_assoc()){
                        $classes[$row['idClass']] = [$row['code'], $row['title'], $row['professors'], $row['semester'], ($row['FREE_CLASS_SECRETARIES_id'] != NULL ) ? true : false, ($row['FREE_CLASS_SECRETARIES_id'] != NULL ) ? $row['FREE_CLASS_SECRETARIES_id'] : -1];
                    }
                }
        ?>
            <h2 class="orange_header mb-4">Υποβολή Συγγραμμάτων Μαθημάτων του ΠΣ</h2>
            <div>
                <div class="row">
                    <div class="col-4 pr-0">
                        <ul id="left_class_list" class="mb-0">
                            <?php
                                $i = 0;
                                foreach ($classes as $class) {
                                    $freeclassstr = ($class[4]) ? "(" . $affiliated_departments[$class[5]][1] . ")" : "";
                                    echo <<<EOT
                                        <li id="selector_$i" class="left_class_list_item">
                                            [$class[0]] $class[1] $freeclassstr
                                        </li>
                                        <script> <!-- scripts for selecting classes from the list -->
                                            $("#selector_$i").on("click", function(){
                                                $("#noselection").hide();
                                                $(".content").hide();
                                                $("#content_$i").show();
                                                $(".left_class_list_item").removeClass("active_tab");
                                                $(this).addClass("active_tab");
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
                            $sqlStmt = $conn->prepare("SELECT a.idBook, a.title, a.authors, a.ISBN, a.published_year, a.front_page_url FROM BOOKS a, UNIVERSITY_CLASSES_has_BOOKS b WHERE a.idBook = b.BOOKS_id AND b.UNIVERSITY_CLASSES_id = ?;");
                            $idClass = -1;
                            $sqlStmt->bind_param("s", $idClass);
                            $i = 0;
                            foreach ($classes as $class_id => $class) {
                                $idClass = $class_id;
                                $freeclassstr = ($class[4]) ? "<span class=\"foreign_title\">(" . $affiliated_departments[$class[5]][1] . ")</span>" : "";
                                $sqlStmt->execute();
                                $results2 = $sqlStmt->get_result();
                                $books = [];
                                if ( $results2->num_rows > 0 ){
                                    while ($row = $results2->fetch_assoc()){
                                        $books[$row['idBook']] = [$row['title'], $row['authors'], $row['published_year'], $row['ISBN'], ($row['front_page_url'] != null) ? $row['front_page_url'] : "/sdi1500102_sdi1500165/images/default_book_front_page.jpg"];
                                    }
                                }
                                echo <<<EOT
                                    <div id="content_$i" class="content" style="display: none">
                                        <span class="id_span">[$class[0]]</span><h2>$class[1]</h2> $freeclassstr<br>
                                        $class[2], $class[3]ο Εξάμηνο<br><br>
                                        <p class="mb-0">Προσθήκη / Αφαίρεση συγγραμμάτων:</p><br>
                                        <ol class="book_list">
EOT;
                                            foreach ($books as $book_id => $book) {
                                                echo <<<EOT
                                                <li book_id="$book_id">
                                                    <div class="row">
                                                        <div class="col-2"><img class="book_cover_icon" src="$book[4]"/></div>
                                                        <div class="col-10">
                                                            <h3>$book[0]</h3><img class="delete_book_box" src="/sdi1500102_sdi1500165/images/red_cross_box.png"/><br>
                                                            <span class="field_span"><label>Συγγραφέας/ες:</label> $book[1]</span><span class="field_span"><label>Έτος:</label> $book[2]</span><br>
                                                            <label>ISBN:</label> $book[3]<br>
                                                        </div>
                                                    </div>
                                                </li>
EOT;
                                            }
                                    echo <<<EOT
                                            <div id="ajax_target_div$class_id">

                                            </div>
                                            <li class_num="$i" class_id="$class_id">
                                                <form class="add_book_form"> <!-- AJAX form to add new book -->
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <img style="height: 100px; width: 100px;" class="plus_img" src="/sdi1500102_sdi1500165/images/add_green_plus.png"/>
                                                        </div>
                                                        <div class="col-10">
                                                            <label>Κωδικός Συγγράμματος στον Εύδοξο:</label><br>
                                                            <input class="form-control book_id_input" type="text" name="book_id" required/>
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
                            $sqlStmt->close();
                        ?>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button id="finish_PS" class="btn btn-dark hover_orange m-4"><img src="/sdi1500102_sdi1500165/images/checkGreen.png" style="width:20px; height:20px; margin-right: 10px;"/>Ολοκλήρωση Υποβολής Συγγραμμάτων</button>
            </div>
    <?php 
        } else if (!$hasSession){
            include("../notconnected.html");
        } else {
            include("../unauthorized.html");
        }
        include("../footer.html"); 
        $conn->close();
    ?>
    </div>
    <script src="/sdi1500102_sdi1500165/javascript/secretary.js"></script>
<body>
</head>