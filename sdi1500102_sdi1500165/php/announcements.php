<?php $loginFailed = include("control/sessionManager.php"); ?>
<!DOCTYPE html>
<?php $active_page = "Anouncements"; ?>
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
    <!-- style for only this page -->
</head>
<body>
    <div class="main-container">
        <?php include("headlines.php") ?>
        <?php include("general_navbar.php"); ?>
        <nav class="my_breadcrump">
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/index.php">Αρχική Σελίδα</a> > 
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/announcements.php">Ανακοινώσεις</a>
        </nav>
        <div>
            <?php 
                $limmit = 50;       // CONFIG: Maximum ammount of announcements loaded
                $category = "all";  // default
                if ( isset($_GET['category']) ) { 
                    $category = $_GET['category'];
                }
            ?>
            <h2 class="orange_header">Ανακοινώσεις</h2>
            <br>
            <div class="container">
                <form id="pick_category" style="width: 200px;">
                    <select id="select_cat" name="Category" class="form-control">
                        <option value="all" <?php if ($category == "all") echo "selected" ?>>Όλες</option>
                        <option value="general" <?php if ($category == "general") echo "selected" ?>>Γενικές</option>
                        <option value="students" <?php if ($category == "students") echo "selected" ?>>Φοιτητές</option>
                        <option value="publishers" <?php if ($category == "publishers") echo "selected" ?>>Εκδότες</option>
                        <option value="secretaries" <?php if ($category == "secretaries") echo "selected" ?>>Γραμματείες</option>
                        <option value="distribution_points" <?php if ($category == "distribution_points") echo "selected" ?>>Σημεία Διανομής</option>
                    </select>
                    <script>
                        $("#pick_category").on('change', function(){
                            window.location.replace("/sdi1500102_sdi1500165/php/announcements.php?category=" + $("#select_cat").val());
                        });
                    </script>
                </form>
            </div>
            <br>
            <div class="container mb-3 mt-2">
                <div class="row border-bottom mb-2">
                    <div class="col-10 lead" style="color: #cd7400;"><strong>Ανακοινώσεις</strong></div>
                    <div class="col-2 lead" style="color: #cd7400;"><strong>Ημερομηνία</strong></div>
                </div>
                <?php
                    $conn = connectToDB();
                    if (! $conn) {
                        die("Database connection failed: " . $conn->connect_error);
                    }
                    $result;
                    if ($category == "all"){
                        $sql = "SELECT idAnnouncement, title, date FROM ANNOUNCEMENTS ORDER BY date DESC LIMIT $limmit";
                        $result = $conn->query($sql);
                    } else {
                        $sqlStmt = $conn->prepare("SELECT idAnnouncement, title, date FROM ANNOUNCEMENTS WHERE category = ? ORDER BY date DESC LIMIT $limmit");
                        $sqlStmt->bind_param("s", $category);
                        $sqlStmt->execute();
                        $result = $sqlStmt->get_result();
                    }
                    $Anouncements = [];
                    if ($result->num_rows > 0) { 
                        while ($row = $result->fetch_assoc()){
                            $Anouncements[$row['idAnnouncement']] = [$row['title'], $row['date']];
                        }
                        foreach ( $Anouncements as $id => $anouncement ){
                            echo "<div class=\"row mt-1\"><div class=\"col-10\"><a class=\"simpler_link\" href=\"announcement_page.php?id=$id\">" . $anouncement[0] . "</a></div><div class=\"col-2\">" . $anouncement[1] . "</div></div>\n";
                        }
                    } else {
                        echo "<h6 class=\"text-center\"><i>Δεν υπάρχουν διαθέσιμες ανακοινώσεις.</i></h6>";
                    }
                    $conn->close();
                ?>
            </div>
        </div>
        <br>
        <?php include("../footer.html"); ?>
    </div>
    <?php include("control/loginFailureHandler.php"); ?>
</body>
</html>