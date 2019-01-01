<?php include("control/sessionManager.php") ?>
<!DOCTYPE html>
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
        <?php $formUserType = $_GET['userType']; ?>
        <div class="row justify-content-center">
            <div class="col-6 m-2 text_div">
                <h2 id="registerTitle" class="m-3">Εγγραφή Φοιτητή</h2>     <!-- changes dynamically -->
                <form class="border rounded m-3 p-3">
                    <div class="form-group">
                        <label class="requiredField">Email</label>
                        <input class="form-control" id="email" type="email" required>
                    </div>
                    <div class="form-group">
                        <label class="requiredField">Κωδικός</label>
                        <input class="form-control" id="password" type="password" required>
                    </div>
                    <div class="form-group">
                        <label class="requiredField">Επιβεβαίωση κωδικού</label>
                        <input class="form-control" id="rePassword" type="password" required>
                    </div>
                    <div class="form-group">
                        <label class="requiredField">Είδος Χρήστη</label>
                        <select class="form-control" id="userType" onchange="changeFormByType();">
                            <?php if ($formUserType == "student") { ?>
                                <option value="1" selected>Φοιτητής</option>
                            <?php } else { ?>
                                <option value="1">Φοιτητής</option>
                            <?php } ?>
                            <?php if ($formUserType == "publisher") { ?>
                                <option value="2" selected>Εκδότης</option>
                            <?php } else { ?>
                                <option value="2">Εκδότης</option>
                            <?php } ?>
                            <?php if ($formUserType == "secretary") { ?>
                                <option value="3" selected>Γραμματεία</option>
                            <?php } else { ?>
                                <option value="3">Γραμματεία</option>
                            <?php } ?>
                            <?php if ($formUserType == "distPoint") { ?>
                                <option value="4" selected>Σημείο Διανομής</option>
                            <?php } else { ?>
                                <option value="4">Σημείο Διανομής</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div id="variableDivByType"></div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Εγγραφή</button>
                    </div>
                </form>
            </div>
        </div>
        <?php include("../footer.html"); ?>
    </div>
    <script src="/sdi1500102_sdi1500165/javascript/changeFormByType.js"></script>
    <script> changeFormByType(); </script>
</body>
</html>