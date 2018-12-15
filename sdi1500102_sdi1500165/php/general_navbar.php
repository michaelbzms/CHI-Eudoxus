<!-- This is consistent through most of the pages and thus can be php-included seperately -->
<?php 
function addClassIfActive($active_page, $page){
    if ( $active_page == $page ){
        print "my_active";
    }
}
?>
<nav class="navbar navbar-expand-lg bg-dark general_navbar">
    <ul class="nav mr-auto"  role="navigation">
        <!-- Fact: &nbsp is a space that will not break to a new line -->
        <li class="nav-item">
            <a class="nav-link <?php addClassIfActive($active_page, "HomePage"); ?>" href="/sdi1500102_sdi1500165/index.php">Αρχική&nbspΣελίδα</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php addClassIfActive($active_page, "Anouncements"); ?>" href="/sdi1500102_sdi1500165/php/announcements.php">Ανακοινώσεις</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Φοιτητές
            </a>
            <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                <a class="dropdown-item <?php addClassIfActive($active_page, "BookDeclaration"); ?>" href="/sdi1500102_sdi1500165/php/book_decleration.php">Δήλωση Συγγραμμάτων</a>
                <a class="dropdown-item" href="/sdi1500102_sdi1500165/php/notimplemented.php">Ανταλλαγή Συγγραμμάτων</a>
                <a class="dropdown-item" href="/sdi1500102_sdi1500165/php/notimplemented.php">Προηγούμενες Δηλώσεις</a>
                <a class="dropdown-item <?php addClassIfActive($active_page, "StudentInfo"); ?>" href="/sdi1500102_sdi1500165/php/student_info.php">Επισκόπιση Στοιχείων Φοιτητή</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Εκδότες
            </a>
            <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/sdi1500102_sdi1500165/php/notimplemented.php">Εγγραφή Αυτοεκδότη</a>
                <a class="dropdown-item" href="/sdi1500102_sdi1500165/php/notimplemented.php">Εγγραφή Εκδοτικού Οίκου</a>
                <a class="dropdown-item" href="/sdi1500102_sdi1500165/php/notimplemented.php">Διαχείριση Συγγραμμάτων</a>
                <a class="dropdown-item" href="/sdi1500102_sdi1500165/php/notimplemented.php">Κοστολόγιση</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Γραμματείες
            </a>
            <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                <a class="dropdown-item <?php addClassIfActive($active_page, "SecretaryRegister"); ?>" href="/sdi1500102_sdi1500165/php/secretary_register.php">Εγγραφή Γραμματείας</a>
                <a class="dropdown-item <?php addClassIfActive($active_page, "SecretaryApp"); ?>" href="/sdi1500102_sdi1500165/php/secretary_app.php">Διαχείριση Μαθημάτων/Συγγραμμάτων</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Σημεία Διανομής
            </a>
            <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/sdi1500102_sdi1500165/php/notimplemented.php">Εγγραφή Σημείου Διανομής</a>
                <a class="dropdown-item" href="/sdi1500102_sdi1500165/php/notimplemented.php">Παράδοση Συγγραμμάτων</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Άλλοι Χρήστες
            </a>
            <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/sdi1500102_sdi1500165/php/notimplemented.php">Εγγραφή Βιβλιοθήκης</a>
                <a class="dropdown-item" href="/sdi1500102_sdi1500165/php/notimplemented.php">Εφαρμογή Βιβλιοθηκών</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/sdi1500102_sdi1500165/php/notimplemented.php">Εγγραφή Διαθέτη Ηλ. Σημειώσεων & Βοηθημάτων</a>
                <a class="dropdown-item" href="/sdi1500102_sdi1500165/php/notimplemented.php">Εφαρμογή Διαθετών</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Αναζήτηση Συγγραμμάτων
            </a>
            <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                <a class="dropdown-item <?php addClassIfActive($active_page, "BookSearch"); ?>" href="/sdi1500102_sdi1500165/php/book_search.php">Αναζήτηση Συγγραμμάτων</a>
                <a class="dropdown-item <?php addClassIfActive($active_page, "SelectedBookSearch"); ?>" href="/sdi1500102_sdi1500165/php/selected_book_search.php">Αναζήτηση Επιλεγμένων Συγγραμμάτων</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Πληροφορίες
            </a>
            <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                <a class="dropdown-item <?php addClassIfActive($active_page, "FAQ"); ?>" href="/sdi1500102_sdi1500165/php/faq.php">FAQ</a>
                <a class="dropdown-item <?php addClassIfActive($active_page, "Communication"); ?>" href="/sdi1500102_sdi1500165/php/communication.php">Επικοινωνία</a>
                <a class="dropdown-item <?php addClassIfActive($active_page, "AboutUs"); ?>" href="/sdi1500102_sdi1500165/php/aboutus.php">About Us</a>
            </div>
        </li>
    </ul>
</nav>