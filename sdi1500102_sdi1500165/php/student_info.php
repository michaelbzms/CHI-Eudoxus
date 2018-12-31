<?php include("control/sessionManager.php") ?>
<!DOCTYPE html>
<?php $active_page = "StudentInfo"; ?>
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
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/student_info.php">Επισκόπιση Στοιχείων Φοιτητή</a>
        </nav>
        <?php
            $conn = connectToDB();
            if (! $conn) {
                die("Database connection failed: " . mysqli_connect_error());
            }
            // TODO: error page if user type != student
            $studentID = $_SESSION['userID'];
            $sqlQuery = "SELECT st.*, sec.university, sec.department, usr.email FROM STUDENTS st, SECRETARIES sec, USERS usr WHERE st.idUser=$studentID AND st.SECRETARIES_id=sec.idUser AND st.idUser=usr.idUser";
            $result = $conn->query($sqlQuery);
            $studentRow = $result->fetch_assoc();
            if ($result->num_rows == 0) {
                die("Invalid UserID");
            }
        ?>
        <div>
            <h2 class="orange_header m-3"> <?php echo $studentRow['firstname'] . " " . $studentRow['lastname']; ?> </h2>
            <div class="centered_bordered_field">
                <label>Σχολή:</label> <?php echo $studentRow['university']; ?> <br>
                <label>Τμήμα:</label> <?php echo $studentRow['department']; ?> <br>
                <label>Κωδικός Εύδοξου:</label> <?php echo $studentRow['idUser']; ?> <br>
                <label>Αριθμός Μητρώου:</label> <?php echo $studentRow['AM']; ?> <br>
                <label>Email:</label> <?php echo $studentRow['email']; ?> <img id="modify_email" class="image_button" src="/sdi1500102_sdi1500165/images/pencil.png"/> <br> 
                <label>Τηλέφωνο:</label> <?php echo $studentRow['phone']; ?> <img id="modify_phone" class="image_button" src="/sdi1500102_sdi1500165/images/pencil.png"/> <br>
                <label>Τρέχον Εξάμηνο:</label> <?php echo $studentRow['current_semester']; ?> <br>
            </div>
        </div>
        <?php $conn->close(); ?>
        <?php include("../footer.html"); ?>
    </div>
</body>
</html>