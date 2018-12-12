<!-- This is consistent through most of the pages and thus can be php-included seperately -->
<nav class="navbar navbar-expand-lg bg-dark general_navbar">
    <ul class="nav"  role="navigation">
        <!-- Fact: &nbsp is a space that will not break to a new line -->
        <li class="nav-item">
            <a class="nav-link <?php if ( $active_page == "HomePage" ) { print "active"; } ?>" href="/sdi1500102_sdi1500165/index.php">Αρχική&nbspΣελίδα</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ( $active_page == "Announcements" ) { print "active"; } ?>" href="/sdi1500102_sdi1500165/php/announcements.php">Ανακοινώσεις</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ( $active_page == "BookSearch" ) { print "active"; } ?>" href="/sdi1500102_sdi1500165/php/book_search.php">Αναζήτηση&nbspΣυγγραμμάτων</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ( $active_page == "SelectedBooks" ) { print "active"; } ?>" href="/sdi1500102_sdi1500165/php/selected_books.php">Επιλεγμένα&nbspΣυγγράμματα</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ( $active_page == "FAQ" ) { print "active"; } ?>" href="/sdi1500102_sdi1500165/faq.html">FAQ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ( $active_page == "Communication" ) { print "active"; } ?>" href="/sdi1500102_sdi1500165/php/communication.php">Επικοινωνία</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ( $active_page == "AboutUs" ) { print "active"; } ?>" href="/sdi1500102_sdi1500165/php/aboutus.php">About&nbspus</a>
        </li>
    </ul>
</nav>