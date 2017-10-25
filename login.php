<?php
session_start();

$con = mysqli_connect( "localhost:3306", "root", "test", "thinkfit" );
// Check connection
if ( !$con ) {
	die();
	header( 'Location: .index.html' );
}



mysqli_select_db( $con, "thinkfit" );

$sql = "SELECT idaccounts, email, password, tipo_account FROM `accounts` WHERE email='" . $_GET[ "email" ] . "' ";

$result = mysqli_query( $con, $sql );
$psw_control = "";
$idAcc = "";
if ( mysqli_num_rows( $result ) > 0 ) {
	while ( $row = mysqli_fetch_row( $result ) ) {
		$psw_control = $row[ 2 ];
		$idAcc = $row[ 0 ];
		$type = $row[ 3 ];
	}

	if ( $psw_control == $_GET[ "psw" ] ) {

		$_SESSION[ 'email' ] = $_GET[ "email" ];
		$_SESSION[ "ida" ] = $idAcc;
		$_SESSION[ "tipoAcc" ] = $type;

		if ( isset( $_GET[ 'check' ] ) ) {
			$cookie_name = "logRem";
			$cookie_value = $idAcc;
			setcookie( $cookie_name, $cookie_value, time() + ( 86400 * 30 ), "/" ); // 86400 = 1 day

		}
		
		$_SESSION['loggedOut']=1;

		echo "<button onclick='logout()'>LOGOUT</button>";

		mysqli_close( $con );

	} else {
		echo "<button onclick='logout()'>LOGOUT</button>";

		mysqli_close( $con );

	}


} else {
	echo "<button onclick='logout()'>LOGOUT</button>";
	mysqli_close( $con );
}



?>