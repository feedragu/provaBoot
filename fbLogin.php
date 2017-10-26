<?php
session_start();

$con = mysqli_connect( "localhost:3306", "root", "test", "thinkfit" );
// Check connection
if ( !$con ) {
	die();
	header( 'Location: .index.html' );
}

$parametri = json_decode(base64_decode($_GET['p']), true);
$idFacebook = $con->real_escape_string($parametri['idFacebook']);

echo "FIN QUI TUTTAPPOSTO 1";


mysqli_select_db( $con, "thinkfit" );

$sql = "SELECT idaccounts, email, password, tipo_account FROM `accounts` WHERE email='" . $_GET[ "email" ] . "' OR idFacebook='".$idFacebook."'";

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

		echo "<a class='nav-link js-scroll-trigger' href='javascript:logout();'>LOGOUT</a>";

		mysqli_close( $con );

	} else {
		echo "<a class='nav-link js-scroll-trigger' href='javascript:logout();'>LOGOUT</a>";

		mysqli_close( $con );

	}
	echo "FIN QUI TUTTAPPOSTO 2";



} else {
	
	$email = $con->real_escape_string($parametri['email']);
	$cognome = $con->real_escape_string($parametri['cognome']);
	$nome = $con->real_escape_string($parametri['nome']);
	$gender = $con->real_escape_string($parametri['gender']);
	$city = $con->real_escape_string($parametri['city']);
	$picture = $con->real_escape_string($parametri['picture']);
	
	echo "FIN QUI TUTTAPPOSTO 3 ";

	
	function random_str( $length, $keyspace = '0123456789' ) {
	$str = '';
	$max = mb_strlen( $keyspace, '8bit' ) - 1;
	for ( $i = 0; $i < $length; ++$i ) {
		$str .= $keyspace[ random_int( 0, $max ) ];
	}
	return $str;
	}
		echo "FIN QUI TUTTAPPOSTO 4";

		
	$query_registrazioneAcc = mysqli_query( $con, "INSERT INTO accounts (idaccounts, email, password, tipo_account, idFacebook)	VALUES ('" . random_str( 11 ) . "','" . $email . "','NULL','U','".$idFacebook."')" )
		or die( "query di registrazione non riuscita" . mysqli_error() );
		
	$query_registrazioneUser = mysqli_query( $con, "INSERT INTO users (nome, cognome, sesso, citta, picture)	VALUES ('" . $nome. "','" . $cognome . "','" . $gender . "','" . $city . "','".$picture."')" )
		or die( "query di registrazione non riuscita" . mysqli_error() );	
		
		echo $idFacebook.$nome.$cognome.$gender.$city.$email;
}





?>