<!-- This is consistent through most of the pages and thus can be php-included seperately -->
<div class="mb-2">
	<a href="/sdi1500102_sdi1500165/index.php"><img id="logo" src="/sdi1500102_sdi1500165/images/logo.png"/></a>
	<h1 id="title">Ηλεκτρονική Υπηρεσία<br>Ολοκληρωμένης Διαχείρισης<br>Συγγραμμάτων και Λοιπών Βοηθημάτων</h1>
	<!-- <img id="slogan" src="/sdi1500102_sdi1500165/images/slogan.png"/> -->
	<!-- Login | register (or log out) always on top right-->
	<div id="login_register_div">
		<?php if ( ! isset($_SESSION["userID"]) ) { ?>
			<a id="login" data-toggle="modal" data-target="#loginModal"><img class="pr-1" src="/sdi1500102_sdi1500165/images/login.png"/>Είσοδος</a>
			| 
			<a id="register" href="/sdi1500102_sdi1500165/php/register_page.php?userType=student">Εγγραφή</a> <!-- Only ONE register page for all-->
		<?php } else { ?>	
			<div class="dropdown">
				<div class="d-inline-block dropdown-toggle p-2 pr-0" style="cursor: pointer;" href="#" role="button" id="AccountDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span id="account_name"><?php echo $_SESSION["email"] ?></span>
				</div>
				<div class="dropdown-menu bg-secondary" aria-labelledby="AccountDropdownMenu">
					<a class="dropdown-item" href="/sdi1500102_sdi1500165/php/notimplemented.php">Ρυθμίσεις Λογαριασμού</a>
					<a class="dropdown-item" href="/sdi1500102_sdi1500165/php/notimplemented.php">Βοήθεια</a>
					<a class="dropdown-item" href="#" onClick="$('#logout_form').submit();">
						<img class="pr-2 d-inline-block" src="/sdi1500102_sdi1500165/images/logout.png"/>Αποσύνδεση
					</a>
					<form id="logout_form" action="#" method="POST">
						<input name="logoutSubmit" value="logoutSubmit" hidden/>
					</form>
				</div>
			</div>
		<?php } ?>
	</div>
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered book-modal-dialog justify-content-center" role="document">
			<div class="login-modal-content">
				<div class="modal-body login-form p-0 m-0">
					<button type="button" class="close m-1 mr-2" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<form action="#" method="POST">
						<h2 class="text-center" style="color: #cd7400; font-weight: 500;">Είσοδος</h2>       
						<div class="form-group">
							<input name="email" type="email" class="form-control login-form-control w-100" placeholder="Email" required="required">
						</div>
						<div class="form-group">
							<input name="password" type="password" class="form-control login-form-control w-100" placeholder="Password" required="required">
						</div>
						<div class="form-group">
							<button name="loginSubmit" type="submit" class="btn login-btn btn-primary btn-block">Σύνδεση</button>
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
	<div id="global_search_div">
		<form id="global_search_form" action="/sdi1500102_sdi1500165/php/global_search.php" method="get">
			<input class="form-control" type="text" name="global_search_str" placeholder="Αναζήτηση">
			<!-- submit with 'enter' -->
		</form>
		<img id="global_help" src="/sdi1500102_sdi1500165/images/help_icon.png" data-toggle="tooltip" data-placement="top" title="Αναζητήστε κάποια λειτουργία-σελίδα του Εύδοξου με κατάλληλες λέξεις-κλειδιά."/>
	</div>
</div>