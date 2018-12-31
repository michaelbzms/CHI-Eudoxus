<!-- This is consistent through most of the pages and thus can be php-included seperately -->
<a href="/sdi1500102_sdi1500165/index.php"><img id="logo" src="/sdi1500102_sdi1500165/images/logo.png"/></a>
<h1 id="title">Ηλεκτρονική Υπηρεσία<br>Ολοκληρωμένης Διαχείρισης<br>Συγγραμμάτων και Λοιπών Βοηθημάτων</h1>
<!-- <img id="slogan" src="/sdi1500102_sdi1500165/images/slogan.png"/> -->
<!-- Login | register (or log out) always on top right-->
<div id="login_register_div">
    <?php if ( /* NotInSession */ true ) { // TODO: check session ?>
        <a class="linkLike" data-toggle="modal" data-target="#loginModal"><img class="pr-1" src="/sdi1500102_sdi1500165/images/login.png"/>Log In</a>
         | 
        <a href="/sdi1500102_sdi1500165/php/register_page.php">Register</a> <!-- Only ONE register page for all-->
    <?php } else { ?>
        <button class="btn btn-outline-secondary"><img class="pr-2" src="/sdi1500102_sdi1500165/images/logout.png"/>Log Out</button>
    <?php } ?>
</div>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered book-modal-dialog justify-content-center" role="document">
        <div class="login-modal-content">
            <div class="modal-body login-form p-0 m-0">
            	<button type="button" class="close m-1 mr-2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
			    <form action="#" method="post">
			        <h2 class="text-center">Log in</h2>       
			        <div class="form-group">
			            <input type="email" class="login-form-control w-100" placeholder="Email" required="required">
			        </div>
			        <div class="form-group">
			            <input type="password" class="login-form-control w-100" placeholder="Password" required="required">
			        </div>
			        <div class="form-group">
			            <button type="submit" class="btn login-btn btn-primary btn-block">Log in</button>
			        </div>
			        <div class="clearfix text-center">
			            <a href="/sdi1500102_sdi1500165/php/notimplemented.php" class="text-center">Ξεχάσατε τον κωδικό σας?</a><br>
			            <a href="/sdi1500102_sdi1500165/php/register_page.php" class="text-center">Δημιουργήστε νέο λογαριασμό</a>
			        </div>        
			    </form>
			</div>
        </div>
    </div>
</div>
<!-- Global search bar -->
<img id="global_help" src="/sdi1500102_sdi1500165/images/help_icon.png"/><!-- add onClick() event -->
<form id="global_search_form" action="#" method="get">
    <input class="form-control" type="text" name="global_search_str" placeholder="Αναζήτηση">
    <!-- submit with 'enter' -->
</form>
