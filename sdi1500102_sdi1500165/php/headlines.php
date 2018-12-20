<!-- This is consistent through most of the pages and thus can be php-included seperately -->
<a href="/sdi1500102_sdi1500165/index.php"><img id="logo" src="/sdi1500102_sdi1500165/images/logo.png"/></a>
<h1 id="title">Ηλεκτρονική Υπηρεσία<br>Ολοκληρωμένης Διαχείρισης<br>Συγγραμμάτων και Λοιπών Βοηθημάτων</h1>
<!-- <img id="slogan" src="/sdi1500102_sdi1500165/images/slogan.png"/> -->
<!-- Login | register (or log out) always on top right-->
<div id="login_register_div">
    <?php if ( /* NotInSession */ true ) { // TODO: check session ?>
        <a href="/sdi1500102_sdi1500165/php/login_page.php"><img class="pr-1" src="/sdi1500102_sdi1500165/images/login.png"/>Log In</a>
         | 
        <a href="/sdi1500102_sdi1500165/php/register_page.php">Register</a> <!-- Only ONE register page for all-->
    <?php } else { ?>
        <button class="btn btn-outline-secondary"><img class="pr-2" src="/sdi1500102_sdi1500165/images/logout.png"/>Log Out</button>
    <?php } ?>
</div>
<!-- Global search bar -->
<img id="global_help" src="/sdi1500102_sdi1500165/images/help_icon.png"/><!-- add onClick() event -->
<form id="global_search_form" action="#" method="get">
    <input class="form-control" type="text" name="global_search_str" placeholder="Αναζήτηση">
    <!-- submit with 'enter' -->
</form>