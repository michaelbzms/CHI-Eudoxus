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
            <p class="breadcrump_item">Γραμματείες</p> > 
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/secretary_info.php">Επισκόπιση Στοιχείων Γραμματείας </a>
        </nav>
        <?php
            $conn = connectToDB();
            if (! $conn) {
                die("Database connection failed: " . mysqli_connect_error());
            }
            $hasSession = isset($_SESSION['userID']);
            if ( $hasSession && isset($_SESSION['userType']) && $_SESSION['userType'] == 'secretary' ) {
                $secretary_id = $_SESSION['userID'];
                
                $sqlQuery = "SELECT us.email, sec.* FROM SECRETARIES sec, Users us WHERE sec.idUser = $secretary_id AND us.idUser = sec.idUser;";
                $result = $conn->query($sqlQuery);
                if ($result->num_rows == 0) {
                    die("Error: Invalid UserID");
                }
                $secretary_info = $result->fetch_assoc();
        ?>
                <div>
                    <h2 class="orange_header m-3"><?php echo "Στοιχεία Γραμματείας" ?></h2>
                    <div class="centered_bordered_field">
                        <label>Πανεπιστήμιο:</label> <?php echo $secretary_info['university']; ?> <br>
                        <label>Τμήμα:</label> <?php echo $secretary_info['department']; ?> <br>
                        <label>Αριθμός Εξαμήνων:</label> <?php echo $secretary_info['number_of_semesters']; ?> <br>
                        <label>Κωδικός Εύδοξου:</label> <?php echo $secretary_info['idUser']; ?> <br>
                        <label>Πόλη:</label> <?php echo $secretary_info['city']; ?> <br>
                        <label>Νομός:</label> <?php echo $secretary_info['county']; ?> <br>
                        <label>Διεύθυνση:</label> <?php echo $secretary_info['address']; ?> <br>
                        <label>T.K.:</label> <?php echo $secretary_info['TK']; ?> <br>
                        <label>Email:</label> <?php echo $secretary_info['email']; ?> <br> 
                        <label>Τηλέφωνο:</label> <?php echo $secretary_info['phone']; ?> <br>
                    </div>
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
</body>
</html>