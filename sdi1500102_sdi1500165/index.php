<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eudoxus</title>
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/index.css"/>
</head>
<body>
    <div class="main-container">
        <a href="/sdi1500102_sdi1500165/index.php"><img id="logo" src="/sdi1500102_sdi1500165/images/logo.png"/></a>
        <h1 id="title">Ηλεκτρονική Υπηρεσία <br>Ολοκληρωμένης Διαχείρισης <br>Συγγραμμάτων και Λοιπών Βοηθημάτων</h1>
        <img id="slogan" src="/sdi1500102_sdi1500165/images/slogan.png"/>
        <!-- Global search bar -->
        <img id="global_help" src="/sdi1500102_sdi1500165/images/help_icon.png"/>
        <form id="global_search_form" action="#" method="get">
            <input type="text" name="global_search_str">
            <!-- submit with 'enter' -->
        </form>
        <!-- add onClick() event -->
        <!-- common navbar for all without login -->
        <nav class="navbar-general">
            <div class="navbar-general-item"><a href="/sdi1500102_sdi1500165/index.php">Αρχική Σελίδα</a></div>
            <div class="navbar-general-item"><a href="/sdi1500102_sdi1500165/php/announcements.php">Ανακοινώσεις</a></div>
            <div class="navbar-general-item"><a href="/sdi1500102_sdi1500165/php/booksearch.php">Αναζήτηση Συγγραμμάτων</a></div>
            <div class="navbar-general-item"><a href="/sdi1500102_sdi1500165/php/selectedbooks.php">Επιλεγμένα Συγγράμματα</a></div>
            <div class="navbar-general-item"><a href="/sdi1500102_sdi1500165/php/faq.php">FAQ</a></div>
            <div class="navbar-general-item"><a href="/sdi1500102_sdi1500165/php/communication.php">Επικοινωνία</a></div>
            <div class="navbar-general-item"><a href="/sdi1500102_sdi1500165/php/aboutus.php">About us</a></div>
        </nav>
        <!-- specific navbar for each category -->
        <nav class="navbar-specific">
            <div class="navbar-specific-item">Είμαι... ►<div>
            <div class="navbar-specific-item"><button>Φοιτητής</button></div>
            <div class="navbar-specific-item"><button>Εκδότης</button></div>
            <div class="navbar-specific-item"><button>Υπάλληλος Γραμματείας Τμήματος</button></div>
            <div class="navbar-specific-item"><button>Υπάλληλος Σημείου Διανομής</button></div>
            <div class="navbar-specific-item"><button>Άλλο</button></div>
        </nav>
        <?php include "footer.html"; ?>
    </div>
</body>
</html>