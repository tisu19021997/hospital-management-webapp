<?php
include_once( 'database-config.php' );

session_start();
if ( session_status() == PHP_SESSION_ACTIVE ) {

	if ( isset( $_SESSION['login_user'] ) ) {

		$user_check = $_SESSION['login_user'];

		$ses_sql = $conn->query( "SELECT id FROM `patient` WHERE id = '$user_check'" );

		$row = mysqli_fetch_array( $ses_sql, MYSQLI_ASSOC );

		$login_session = $row['id'];

	}

	if ( isset( $_SESSION['login_hos'] ) ) {

		$user_check = $_SESSION['login_hos'];

		$ses_sql = $conn->query( "SELECT name FROM `hospital` WHERE id = '$user_check'" );

		$row = mysqli_fetch_array( $ses_sql, MYSQLI_ASSOC );

		$login_session = $row['name'];

	}

	if ( isset( $_SESSION['login_admin'] ) ) {

		$user_check = $_SESSION['login_admin'];

//		$ses_sql = $conn->query( "SELECT id FROM `admin` WHERE id = '$user_check'" );
//
//		$row = mysqli_fetch_array( $ses_sql, MYSQLI_ASSOC );

		$login_session = 'admin';

	}


}
//if(!isset($_SESSION['login_user'])){
//	header("location:index.php");
//}
//?>