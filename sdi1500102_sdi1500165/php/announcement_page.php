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
    <script src="/sdi1500102_sdi1500165/javascript/lib/popper.min.js"></script>
    <script src="/sdi1500102_sdi1500165/javascript/lib/bootstrap.min.js"></script>
    <!-- style for only this page -->
    <style>
        .this_orange_header{
            color: rgb(231, 150, 0);
            text-align: center;
            font-size: 150%;
            font-weight: 600;
        }

        .subtitle{
            font-size: 110%; 
            text-align: center;
        }
    </style>
<?php 
    function printCategory($category){
        switch ($category){
            case "general":
                echo "Γενικές";
                break;
            case "students":
                echo "Φοιτητές";
                break;
            case "publishers":
                echo "Εκδότες";
                break;
            case "secretaries":
                echo "Γραμματείες";
                break;
            case "dist_points":
                echo "Σημεία Διανομής";
                break;
            default:
                echo "Χωρίς Κατηγορία";
                break;
        }
    }
?>
</head>
<body>
    <div class="main-container">
    <?php include("headlines.php") ?>
        <?php include("general_navbar.php"); ?>
        <nav class="my_breadcrump">
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/index.php">Αρχική Σελίδα</a> > 
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/php/announcements.php">Ανακοινώσεις</a> > 
            <a class="breadcrump_item last_item" href="">Σελίδα Ανακοίνωσης</a> 
        </nav>
        <?php 
            $conn = connectToDB();
            if (! $conn) {
                die("Database connection failed: " . $conn->connect_error);
            }
            if ( isset($_GET['id']) ){
                $ann_id = $_GET['id'];
                $sqlStmt = $conn->prepare("SELECT * FROM ANNOUNCEMENTS WHERE idAnnouncement = ?");
                $sqlStmt->bind_param("s", $ann_id);
                $sqlStmt->execute();
                $result = $sqlStmt->get_result();
                if ($result->num_rows > 0) {
                    $announcement = $result->fetch_assoc();
                ?>                    
                    <div class="container">
                        <h2 class="this_orange_header"><?php echo $announcement['title']; ?></h2>
                        <div class="subtitle"><?php echo $announcement['date']; ?>, <?php printCategory($announcement['category']); ?></div>
                        <br><br>
                        <p><?php echo $announcement['text']; ?></p>
                        <br>
                    </div>
        <?php   } else { ?>
                    <div class="text-center">
                        <div class="alert-warning p-3 ml-5 mr-5">
                            <p>⚠ Η ανακοίνωση που ψάξατε δεν υπάρχει στην βάση μας.</p>
                        </div>
                        <img class="mt-3" src="/sdi1500102_sdi1500165/images/oops-sign.jpg"/>
                    </div>
        <?php   }
            } else { ?>
                <div class="text-center">
                    <div class="alert-warning p-3 ml-5 mr-5">
                        <p>⚠ Το link προς την ανακοίνωση που ψάξατε είναι λάθος.</p>
                    </div>
                    <img class="mt-3" src="/sdi1500102_sdi1500165/images/oops-sign.jpg"/>
                </div>
    <?php  } ?>
        <div class="container">
            <a href="/sdi1500102_sdi1500165/php/announcements.php" class="grey_link"> < Πίσω στις Ανακοινώσεις </a>
            </div>
    <?php include("../footer.html"); ?>
    </div>
    <script src="/sdi1500102_sdi1500165/javascript/tooltipInit.js"></script>
    <script src="/sdi1500102_sdi1500165/javascript/formResubmissionPrevention.js"></script>
    <?php include("control/loginFailureHandler.php"); ?>
</body>
</html>