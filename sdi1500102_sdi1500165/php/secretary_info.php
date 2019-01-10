<?php include("control/sessionManager.php") ?>
<!DOCTYPE html>
<?php $active_page = "SecretaryInfo"; ?>
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
    <style>
        strong {
            font-weight: 600;
        }
    </style>
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
                if ($result->num_rows == 0) { die("Error: Invalid UserID"); }   // should be caught at login
                $secretary_info = $result->fetch_assoc();
        ?>
                <h2 class="orange_header mt-3 mb-4">Στοιχεία Γραμματείας</h2>
                <div id="info_box" class="m-3 mb-5">
                    <div class="container border border-dark rounded bg-light w-60 pl-3 pr-3 pt-2 pb-2">
                        <div class="row">
                            <div class="col-6"><strong>Πανεπιστήμιο:</strong></div>
                            <div class="col-6"><?php echo $secretary_info['university']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><strong>Τμήμα:</strong></div>
                            <div class="col-6"><?php echo $secretary_info['department']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><strong>Κωδικός Γραμματείας στον Εύδοξο:</strong></div>
                            <div class="col-6"><?php echo $secretary_info['idUser']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><strong>Αριθμός Εξαμήνων:</strong></div>
                            <div class="col-6"><?php echo $secretary_info['number_of_semesters']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><strong>Πόλη:</strong></div>
                            <div class="col-6"><?php echo $secretary_info['city']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><strong>Νομός:</strong></div>
                            <div class="col-6"><?php echo $secretary_info['county']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><strong>Διεύθυνση:</strong></div>
                            <div class="col-6"><?php echo $secretary_info['address']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><strong>T.K.:</strong></div>
                            <div class="col-6"><?php echo $secretary_info['TK']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><strong>Email:</strong></div>
                            <div class="col-6"><?php echo $secretary_info['email']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><strong>Τηλέφωνο:</strong></div>
                            <div class="col-6"><?php echo $secretary_info['phone']; ?></div>
                        </div>
                    </div>
                    <div class="text-center m-3"><button id="edit_btn" class="btn btn-warning">✏ Τροποποίηση</button></div>
                </div>
                <div id="edit_box" class="m- mb-5" style="display: none"> <!-- hidden at start -->
                    <form id="secretary_edit_info_form">
                        <div class="container border border-dark rounded bg-light w-60 pl-3 pr-3 pt-2 pb-2">
                            <div class="row mb-2">
                                <div class="col-6"><strong>Πανεπιστήμιο:</strong></div>
                                <div class="col-6"><div style="padding-bottom: 5px"><?php echo $secretary_info['university']; ?></div></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6"><strong>Τμήμα:</strong></div>
                                <div class="col-6"><div style="padding-bottom: 5px"><?php echo $secretary_info['department']; ?></div></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6"><strong>Κωδικός Γραμματείας στον Εύδοξο:</strong></div>
                                <div class="col-6"><div style="padding-bottom: 5px"><?php echo $secretary_info['idUser']; ?></div></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6"><strong>Αριθμός Εξαμήνων:</strong></div>
                                <div class="col-6"><input id="sem_num" type="text" class="form-control input-sm" value="<?php echo $secretary_info['number_of_semesters']; ?>" required/></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6"><strong>Πόλη:</strong></div>
                                <div class="col-6"><input id="city" type="text" class="form-control input-sm" value="<?php echo $secretary_info['city']; ?>" required/></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6"><strong>Νομός:</strong></div>
                                <div class="col-6"><input id="county" type="text" class="form-control input-sm" value="<?php echo $secretary_info['county']; ?>" required/></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6"><strong>Διεύθυνση:</strong></div>
                                <div class="col-6"><input id="address" type="text" class="form-control input-sm" value="<?php echo $secretary_info['address']; ?>" required/></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6"><strong>T.K.:</strong></div>
                                <div class="col-6"><input id="TK" type="text" class="form-control input-sm" value="<?php echo $secretary_info['TK']; ?>" required/></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6"><strong>Email:</strong></div>
                                <div class="col-6"><input id="email" type="email" class="form-control input-sm" value="<?php echo $secretary_info['email']; ?>" required/></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6"><strong>Τηλέφωνο:</strong></div>
                                <div class="col-6"><input id="phone" type="text" class="form-control input-sm" value="<?php echo $secretary_info['phone']; ?>" required/></div>
                            </div>
                        </div>
                        <div class="text-center m-3">
                            <button type="submit" class="btn btn-warning mr-1">Αποθήκευση</button>
                            <button type="reset" id="cancel_edit_btn" class="btn btn-outline-secondary ml-1">Ακύρωση</button>
                        </div>
                    </form>
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
    <script src="/sdi1500102_sdi1500165/javascript/user_info.js"></script>
</body>
</html>