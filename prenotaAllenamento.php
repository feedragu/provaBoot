<?php
session_start();
include( 'db_connect.php' )
?>

<head>
	<title>Prenota Allenamento - ThinkFit</title>
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
					if(isset($_COOKIE["logRem"])) {
		 			  ?>
					<li><button id="txtHint" onclick="logout()">LOGOUT</button>
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
					?>
					<li><button type="button" data-toggle="modal" id="txtHint" data-target="#myModalLog">LOGIN</button>
					</li>

					<?php 
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


	<div class="container text-center">
		<h3>Prenota Allenamento</h3><br>
		<div class="row">
			<?php
			$result = mysqli_query( $con, "SELECT nome, cognome, picture, iduser FROM users, accounts WHERE idaccounts=iduser AND tipo_account='PT'" );
			while ( $row = mysqli_fetch_row( $result ) ) {
				echo "<div class='col-sm-4' onclick=window.location='showUser.php?id=" . $row[ 3 ] . "'>";
				echo "<img src='" . $row[ 2 ] . "' class='img-responsive' style='height:300px; width=400px' alt='Image'>";
				echo "<p>" . $row[ 0 ] . " " . $row[ 1 ] . "</p></div>";
			}
			?>

		</div>
	</div><br>


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
							<input type="text" class="form-control" id="usrname" name="email" placeholder="Enter email">
						</div>
						<div class="form-group">
							<label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
							<input type="password" class="form-control" id="psw" name="psw" placeholder="Enter password">
						</div>
						<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Registrati</button>

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
					<form action="login.php" method="POST" role="form">
						<div class="form-group">
							<label for="usrname"><span class="glyphicon glyphicon-user"></span> Email</label>
							<input type="text" class="form-control" id="usrname" name="email" placeholder="Enter email">
						</div>
						<div class="form-group">
							<label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
							<input type="password" class="form-control" id="psw" name="psw" placeholder="Enter password">
						</div>
						<div class="checkbox">
							<label><input type="checkbox" value="" name="check" checked>Remember me</label>
						</div>
						<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
					</form>
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





</body>

</html>