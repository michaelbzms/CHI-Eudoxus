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
            <br>
            <h2 class="orange_header"><?php print "Ανακοινώσεις"; ?></h2>
            <div style="width: 75vw; margin-left: 5vw;">
                <form style="width: 200px;">
                    <select name="Category" class="form-control">
                        <option value="all">Όλες</option>
                        <option value="general">Γενικές</option>
                        <option value="students">Φοιτητές</option>
                        <option value="publishers">Εκδότες</option>
                        <option value="secretaries">Γραμματείες</option>
                        <option value="distribution_points">Σημεία Διανομής</option>
                        <option value="other_users">Άλλοι Χρήστες</option>
                    </select> 
                </form>
                <br>
                <table>
                    <tr>
                        <th>Ανακοινώσεις</th>
                        <th>Ημερομηνία</th>
                    </tr>
                    <?php
                        $Anouncements = [ ['Έναρξη Δήλωσης και Διανομής Συγγραμμάτων Χειμερινής Περιόδου 2018-2019', '23/10/2018'],
                                        ['Παράταση περιόδου καταχώρησης συνολικών καταλόγων συγγραμμάτων 2018-2019', '12/09/2018'],
                                        ['Παράταση ανάρτησης διδακτικών συγγραμμάτων ακαδημαϊκού έτους 2018-2019 στο Π.Σ. Εύδοξος', '27/07/2018'] ];
                        foreach ( $Anouncements as $row ){
                            print "<tr><td style=\"padding-right: 30px\">" . $row[0] . "</td><td>" . $row[1] . "</td></tr>\n";
                        } 
                    ?>
                </table>
            </div>
        </div>
        <br>
        <?php include("../footer.html"); ?>
    </div>
</body>
</html>