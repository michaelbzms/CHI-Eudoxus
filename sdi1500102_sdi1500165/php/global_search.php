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
    <!-- style only for this page -->
    <style>
        .search_results_list {
            margin-top: 10px;
        }

        .search_results_list ul li{
            list-style-type: circle;
            font-size: 150%;
        }

        .search_results_list ul li{
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <?php include("headlines.php") ?>
        <?php include("general_navbar.php"); ?>
        <nav class="my_breadcrump">
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/index.php">Αρχική Σελίδα</a> > 
            <a class="breadcrump_item last_item" href="">Γενική Αναζήτηση</a> 
        </nav>
        <h2 class="orange_header mb-4">Γενική Αναζήτηση</h2>
        <div class="container w-50">
        <?php 
            $nonexistantword = "##############";
            $conn = connectToDB();
            if (! $conn) {
                die("Database connection failed: " . $conn->connect_error);
            }
            $input_text = $_GET['global_search_str'];
            $input_words = preg_split('/\s+/', $input_text);
            for ($i = 0 ; $i < count($input_words) ; $i++){     // convert everything to lowercase
                $input_words[$i] = mb_strtolower($input_words[$i]);
            }
            for ($i = count($input_words) ; $i < 10 ; $i++){    // if under 10 words add more
                $input_words[$i] = $nonexistantword;            // a word that will not exists and as such not affect the outcome
            }
            $sqlQuery = "SELECT link, title FROM GLOBAL_SEARCH WHERE ";
            $first = true;
            for ($i = 0 ; $i < 10 ; $i++) {                     // maximum of ten words
                if (!$first)  $sqlQuery .= " OR ";
                $sqlQuery .= " keywords LIKE ? ";
                $first = false;
            }
            $sqlQuery .= ";";
            // add wildcards to input words
            for ($i = 0 ; $i < 10 ; $i++){
                if ($input_words[$i] != $nonexistantword) $input_words[$i] = '%' . $input_words[$i] . '%';
            }

            //DEBUG
            //echo "sql query = " . $sqlQuery;
            //echo "input_words = ";
            //print_r($input_words);
            
            $sqlStmt = $conn->prepare($sqlQuery);
            $sqlStmt->bind_param("ssssssssss", $input_words[0], $input_words[1], $input_words[2], $input_words[3], $input_words[4], $input_words[5], $input_words[6], $input_words[7], $input_words[8], $input_words[9]);
            $sqlStmt->execute();
            $results = $sqlStmt->get_result();
            if ($results->num_rows > 0){
                echo "Αποτελέσματα αναζήτησης γιά \"" . $_GET['global_search_str'] . "\":<br>";
                echo "<div class=\"search_results_list\"><ul>";
                while ($row = $results->fetch_assoc()){
                    echo "<li><a class=\"simpler_link\" href = " . $row['link'] . ">" . $row['title']  . "</a></li>";
                }
                echo "</ul></div>";
            } else {
                echo "Δεν βρέθηκε κάτι γιά \"" . $_GET['global_search_str'] . "\".";
            }
        ?>
        </div>
        <?php include("../footer.html"); ?>
    </div>
    <script src="/sdi1500102_sdi1500165/javascript/tooltipInit.js"></script>
    <script src="/sdi1500102_sdi1500165/javascript/formResubmissionPrevention.js"></script>
    <?php include("control/loginFailureHandler.php"); ?>
</body>
</html>