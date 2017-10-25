<html lang="en">
<?php
session_start();
?>

<head>
	<title>Thinkfit</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style>
		.modal-header,
		h4,
		.close {
			background-color: #5cb85c;
			color: white !important;
			text-align: center;
			font-size: 30px;
		}
		
		.modal-footer {
			background-color: #f9f9f9;
		}
	</style>
	<style>
		div.calendar {
			width: 100%;
			border: 3px solid gray;
		}
		
		header {
			padding: 2em;
			color: white;
			background-color: #4d88ff;
			clear: right;
			text-align: center;
		}
		
		.tablediv {
			border-left: 3px solid gray;
			margin-top: 2%;
			width: 80%;
			float: right;
		}
		
		.title {
			float: top;
		}
		
		input[type=text],
		input[type=password],
		input[type=date],
		input[type=email] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}
		/* Set a style for all buttons */
		
		button,
		input[type=button] {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: auto;
		}
		
		button:hover {
			opacity: 0.8;
		}
		
		input[type=button]:hover {
			opacity: 0.8;
		}
	</style>
</head>

<body>
	<div class="jumbotron text-center">
		<h1>Company</h1>
		<p>Facendo schifo ogni giorno di meno</p>

		<form class="form-inline" action="prova.php" method="POST">
			<div class="input-group">
				<input type="email" class="form-control" size="50" placeholder="Email Address">
				<div class="input-group-btn">
					<button type="submit" class="btn btn-danger">Subscribe</button>
				</div>
			</div>
		</form>
	</div>

	<nav class="navbar navbar-default navbar-fixed-top col-lg-12">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="#">Logo</a> </div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li> <button type="button" data-toggle="modal" data-target="#myModalReg">REGISTRATI</button>
					</li>
					<?php 					
					
					if(isset($_COOKIE["logRem"])   ) {
						if(!isset($_SESSION['loggedOut'])) {
					   ?>
					<li id="txtHint"><button onclick="logout()">LOGOUT</button>
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
					<li id="txtHint"><button onclick="logout()">LOGOUT</button>
					</li>


					<?php 
							}else{
								
							?>

					<li id="txtHint"><button data-toggle="modal" data-target="#myModalLog">LOGIN</button>
					</li>

					<?php 
							}
					} 
				}else {
						if(!isset($_SESSION['loggedOut'])) {
					?>

					<li id="txtHint"><button data-toggle="modal" data-target="#myModalLog">LOGIN</button>
					</li>

					<?php 
						}else {
							if($_SESSION['loggedOut']==1){
								
								?>
					<li id="txtHint"><button onclick="logout()">LOGOUT</button>
					</li>


					<?php 
							}else{
								
							?>

					<li id="txtHint"><button data-toggle="modal" data-target="#myModalLog">LOGIN</button>
					</li>

					<?php 
							}
						}
					}
		?>

					<li><a href="#portfolio">PORTFOLIO</a>
					</li>
					<li><a href="#pricing">PRICING</a>
					</li>
					<li><a href="#contact">CONTACT</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<style>
		.bg-grey {
			background-color: #f6f6f6;
		}
	</style>
	<style>
		.jumbotron {
			background-color: #f4511e;
			color: #fff;
			padding: 100px 25px;
		}
		
		.container-fluid {
			padding: 60px 50px;
		}
	</style>
	<style>
		.logo {
			font-size: 200px;
		}
		
		@media screen and (max-width: 768px) {
			.col-sm-4 {
				text-align: center;
				margin: 25px 0;
			}
		}
		
		.myCarousel {
			.carousel-inner {
				> .item {
					transition: 500ms ease-in-out left;
				}
				.active {
					&.left {
						left: -30%;
					}
					&.right {
						left: 33%;
					}
				}
				.next {
					left: 33%;
				}
				.prev {
					left: -33%;
				}
				@media all and (transform-3d),
				(-webkit-transform-3d) {
					> .item {
						transition: 500ms ease-in-out left;
						transition: 500ms ease-in-out all;
						backface-visibility: visible;
						transform: none!important;
					}
				}
			}
			.carouse-control {
				&.left,
				&.right {
					background-image: none;
				}
			}
		}
		
		.carousel-inner> .item> img,
		.carousel-inner> .item> a> img {
			width: 70%;
			margin: auto;
		}
	</style>

	<div id="theCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#theCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#theCarousel" data-slide-to="1"></li>
			<li data-target="#theCarousel" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
				<img src="https://media-cdn.tripadvisor.com/media/photo-s/07/72/27/a3/chicago.jpg" alt="Chania">
				<div class="carousel-caption">
					<h3>Los Angeles</h3>
					<p>LA is always so much fun!</p>
				</div>
			</div>

			<div class="item">
				<img src="http://cdn-image.travelandleisure.com/sites/default/files/styles/1600x1000/public/1446655168/chicago-header-dg1115.jpg?itok=MqZFOaTi" alt="Chicago">
				<div class="carousel-caption">
					<h3>Chicago</h3>
					<p>Thank you, Chicago!</p>
				</div>
			</div>

			<div class="item">
				<img src="ny.jpg" alt="New York">
				<div class="carousel-caption">
					<h3>New York</h3>
					<p>We love the Big Apple!</p>
				</div>
			</div>
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#theCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
	

		<a class="right carousel-control" href="#theCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
	
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-8">
				<h2>About Company Page</h2>
				<h4>Lorem ipsum..</h4>
				<p>Lorem ipsum..</p>
				<button class="btn btn-default btn-lg">Get in Touch</button>
			</div>
			<div class="col-sm-4"> <span class="glyphicon glyphicon-signal logo"></span> </div>
		</div>
	</div>

	<div class="modal fade" id="myModalReg" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="padding:35px 50px;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4><span class="glyphicon glyphicon-lock"></span> Registrati</h4>
				</div>
				<div class="modal-body" style="padding:40px 50px;">
					<form action="registrazione.php" method="POST" role="form">
						<div class="form-group">
							<label for="usrname"><span class="glyphicon glyphicon-user"></span> Email</label>
							<input type="text" class="form-control" id="emailReg" name="email" placeholder="Enter email">
						</div>
						<div class="form-group">
							<label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
							<input type="password" class="form-control" id="pswReg" name="psw" placeholder="Enter password">
						</div>
						<button type="submit" class="btn btn-success btn-block" onclick="reg()" data-dismiss="modal"><span class="glyphicon glyphicon-off"></span> Registrati</button>
					</form>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Chiudi</button>

				</div>
			</div>

		</div>
	</div>

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


	<div class="container-fluid bg-grey">
		<div class="row">
			<div class="col-sm-4"> <span class="glyphicon glyphicon-globe logo"></span> </div>
			<div class="col-sm-8">
				<h2>Our Values</h2>
				<h4><strong>MISSION:</strong> Our mission lorem ipsum..</h4>
				<p><strong>VISION:</strong> Our vision Lorem ipsum..</p>
			</div>
		</div>
	</div>
	<div id="googleMap" style="height:400px;width:100%;"></div>
	<script>
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
	<script>
		// Instantiate the Bootstrap carousel
		$( '.multi-item-carousel' ).carousel( {
			interval: false
		} );

		// for every slide in carousel, copy the next slide's item in the slide.
		// Do the same for the next, next item.
		$( '.multi-item-carousel .item' ).each( function () {
			var next = $( this ).next();
			if ( !next.length ) {
				next = $( this ).siblings( ':first' );
			}
			next.children( ':first-child' ).clone().appendTo( $( this ) );

			if ( next.next().length > 0 ) {
				next.next().children( ':first-child' ).clone().appendTo( $( this ) );
			} else {
				$( this ).siblings( ':first' ).children( ':first-child' ).clone().appendTo( $( this ) );
			}
		} );

		function myMap() {
			var myCenter = new google.maps.LatLng( 41.878114, -87.629798 );
			var mapProp = {
				center: myCenter,
				zoom: 12,
				scrollwheel: false,
				draggable: false,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			var map = new google.maps.Map( document.getElementById( "googleMap" ), mapProp );
			var marker = new google.maps.Marker( {
				position: myCenter
			} );
			marker.setMap( map );
		}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
</body>

</html>