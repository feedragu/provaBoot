<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Cacca - Start Bootstrap Theme</title>

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

	<!-- Plugin CSS -->
	<link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/creative.min.css" rel="stylesheet">

</head>

<body id="page-top">

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand js-scroll-trigger" href="#page-top">Start Bootstrap</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
		
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<?php 					
					
					if(isset($_COOKIE["logRem"])   ) {
						if(!isset($_SESSION['loggedOut'])) {
					   ?>
					<li class="nav-item" id="txtHint"><a class="nav-link js-scroll-trigger" href="javascript:logout();">LOGOUT</a>
					</li>



					<?php 
								$con = mysqli_connect( "localhost:3306", "root", "test", "thinkfit" );
								// Check connection
								if ( !$con ) {
									die();
									header( 'Location: .index.html' );
								}

								mysqli_select_db( $con, "thinkfit" );

								$sql = "SELECT idaccounts, email, password, tipo_account FROM `accounts` WHERE idaccounts='" . $_COOKIE["logRem"] . "' ";

								$result = mysqli_query( $con, $sql );
								$psw_control = "";
								$idAcc = "";
								if ( mysqli_num_rows( $result ) > 0 ) {
									while ( $row = mysqli_fetch_row( $result ) ) {
										$email=$row[ 1 ];
										$psw_control = $row[ 2 ];
										$idAcc = $row[ 0 ];
										$type = $row[ 3 ];
									}

									$_SESSION[ 'email' ] = $email;
									$_SESSION[ "ida" ] = $idAcc;
									$_SESSION[ "tipoAcc" ] = $type;
								}
						}else {
							if($_SESSION['loggedOut']==1){
								
								?>
					<li class="nav-item" id="txtHint"><a class="nav-link js-scroll-trigger" href="javascript:logout();">LOGOUT</a>
					</li>

					</li>


					<?php 
							}else{
								
							?>

					<li class="nav-item" id="txtHint">
						<a class="nav-link js-scroll-trigger" href='javascript:openModal();'>Login</a>
					</li>

					<?php 
							}
					} 
				}else {
						if(!isset($_SESSION['loggedOut'])) {
					?>

					<li class="nav-item" id="txtHint">
						<a class="nav-link js-scroll-trigger" href='javascript:openModal();' >Login</a>
					</li>

					<?php 
						}else {
							if($_SESSION['loggedOut']==1){
								
								?>
					<li class="nav-item" id="txtHint">
					<a class="nav-link js-scroll-trigger" href="javascript:logout();">LOGOUT</a>
					</li>



					<?php 
							}else{
								
							?>

					<li class="nav-item" id="txtHint">
						<a class="nav-link js-scroll-trigger" href='javascript:openModal();'>Login</a>
					</li>

					<?php 
							}
						}
					}
		?>

					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="#services">Prova</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<header class="masthead">
		<div class="header-content">
			<div class="header-content-inner">
				<h1 id="homeHeading">Your Favorite Source of Free Bootstrap Themes</h1>
				<hr>
				<p>Start Bootstrap can help you build better websites using the Bootstrap CSS framework! Just download your template and start going, no strings attached!</p>
				<a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
			</div>
		</div>
	</header>

	<section class="bg-primary" id="about">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mx-auto text-center">
					<h2 class="section-heading text-white">We've got what you need!</h2>
					<hr class="light">
					<p class="text-faded">Start Bootstrap has everything you need to get your new website up and running in no time! All of the templates and themes on Start Bootstrap are open source, free to download, and easy to use. No strings attached!</p>
					<a class="btn btn-default btn-xl js-scroll-trigger" href="#services">Get Started!</a>
				</div>
			</div>
		</div>
	</section>

	<section id="services">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2 class="section-heading">At Your Service</h2>
					<hr class="primary">
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 text-center">
					<div class="service-box">
						<i class="fa fa-4x fa-diamond text-primary sr-icons"></i>
						<h3>Sturdy Templates</h3>
						<p class="text-muted">Our templates are updated regularly so they don't break.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 text-center">
					<div class="service-box">
						<i class="fa fa-4x fa-paper-plane text-primary sr-icons"></i>
						<h3>Ready to Ship</h3>
						<p class="text-muted">You can use this theme as is, or you can make changes!</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 text-center">
					<div class="service-box">
						<i class="fa fa-4x fa-newspaper-o text-primary sr-icons"></i>
						<h3>Up to Date</h3>
						<p class="text-muted">We update dependencies to keep things fresh.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 text-center">
					<div class="service-box">
						<i class="fa fa-4x fa-heart text-primary sr-icons"></i>
						<h3>Made with Love</h3>
						<p class="text-muted">You have to make your websites with love these days!</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="p-0" id="portfolio">
		<div class="container-fluid">
			<div class="row no-gutter popup-gallery">
				<div class="col-lg-4 col-sm-6">
					<a class="portfolio-box" href="img/portfolio/fullsize/1.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/1.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
				
				</div>
				<div class="col-lg-4 col-sm-6">
					<a class="portfolio-box" href="img/portfolio/fullsize/2.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/2.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
				
				</div>
				<div class="col-lg-4 col-sm-6">
					<a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
				
				</div>
				<div class="col-lg-4 col-sm-6">
					<a class="portfolio-box" href="img/portfolio/fullsize/4.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/4.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
				
				</div>
				<div class="col-lg-4 col-sm-6">
					<a class="portfolio-box" href="img/portfolio/fullsize/5.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/5.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
				
				</div>
				<div class="col-lg-4 col-sm-6">
					<a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
				
				</div>
			</div>
		</div>
	</section>

	<div class="modal fade" id="myModalLog" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="padding:35px 50px;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
				</div>
				<div class="modal-body" style="padding:40px 50px;">
					<div class="form-group">
						<label for="usrname"><span class="glyphicon glyphicon-user"></span> Email</label>
						<input type="text" class="form-control" id="emailLog" name="email" placeholder="Enter email">
					</div>
					<div class="form-group">
						<label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
						<input type="password" class="form-control" id="pswLog" name="psw" placeholder="Enter password">
					</div>
					<div class="checkbox">
						<label><input type="checkbox" value="" id="checkLog" name="check">Remember me</label>
					</div>
					<button class="btn btn-success btn-block" onclick="login()" data-dismiss="modal"><span class="glyphicon glyphicon-off" ></span> Login</button>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
					<p>Not a member? <a href="#">Sign Up</a>
					</p>
					<p>Forgot <a href="#">Password?</a>
					</p>
				</div>
			</div>

		</div>
	</div>

	<div class="call-to-action bg-dark">
		<div class="container text-center">
			<h2>Free Download at Start Bootstrap!</h2>
			<a class="btn btn-default btn-xl sr-button" href="http://startbootstrap.com/template-overviews/creative/">Download Now!</a>
		</div>
	</div>

	<section id="contact">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mx-auto text-center">
					<h2 class="section-heading">Let's Get In Touch!</h2>
					<hr class="primary">
					<p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 ml-auto text-center">
					<i class="fa fa-phone fa-3x sr-contact"></i>
					<p>123-456-6789</p>
				</div>
				<div class="col-lg-4 mr-auto text-center">
					<i class="fa fa-envelope-o fa-3x sr-contact"></i>
					<p>
						<a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a>
					</p>
				</div>
			</div>
		</div>
	</section>

	<script>
		
		function openModal() {
			$( "#myModalLog" ).modal();
		}
		
		

		function logout() {
			if ( window.XMLHttpRequest ) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject( "Microsoft.XMLHTTP" );
			}
			xmlhttp.onreadystatechange = function () {

				if ( this.readyState == 4 && this.status == 200 ) {
					document.getElementById( "txtHint" ).innerHTML = this.responseText;

				}
			};
			xmlhttp.open( "GET", "logout.php", true );
			xmlhttp.send();

		}

		function myFunction( str ) {
			alert( str );
		}

		function login() {

			var email = document.getElementById( 'emailLog' ).value;
			var pass = document.getElementById( 'pswLog' ).value;
			var check = document.getElementById( 'checkLog' ).value;
			if ( email == "" || pass == "" ) {
				alert( "Errore nell'inserimento\nI dati inseriti non sono corretti" );
				return;
			} else {

				if ( window.XMLHttpRequest ) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else {
					// code for IE6, IE5
					xmlhttp = new ActiveXObject( "Microsoft.XMLHTTP" );
				}
				xmlhttp.onreadystatechange = function () {
					if ( this.readyState == 4 && this.status == 200 ) {
						document.getElementById( "txtHint" ).innerHTML = this.responseText;
					}
				};
				xmlhttp.open( "GET", "login.php?email=" + email + "&psw=" + pass + "&check=" + check, true );
				xmlhttp.send();
			}

		}

		function reg() {

			var email = document.getElementById( 'emailReg' ).value;
			var pass = document.getElementById( 'pswReg' ).value;
			if ( email == "" || pass == "" ) {
				alert( "Errore nell'inserimento\nI dati inseriti non sono corretti" );
				return;
			} else {

				if ( window.XMLHttpRequest ) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else {
					// code for IE6, IE5
					xmlhttp = new ActiveXObject( "Microsoft.XMLHTTP" );
				}
				xmlhttp.onreadystatechange = function () {
					if ( this.readyState == 4 && this.status == 200 ) {
						document.getElementById( "txtHint" ).innerHTML = this.responseText;
					}
				};
				xmlhttp.open( "GET", "registrazione.php?email=" + email + "&psw=" + pass, true );
				xmlhttp.send();
			}



		}
	</script>

	<!-- Bootstrap core JavaScript -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Plugin JavaScript -->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="vendor/scrollreveal/scrollreveal.min.js"></script>
	<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

	<!-- Custom scripts for this template -->
	<script src="js/creative.min.js"></script>

</body>

</html>