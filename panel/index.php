<?php include"header.php"; ?>
<?php include"menu.php"; ?>
<?php
function getGet( $key ){
	return isset( $_GET[ $key ] ) ? $_GET[ $key ] : null;
}


$pg = getGet('pg');
if( is_file( 'nav'.$pg.'.php' ) )
	include 'nav'.$pg.'.php';
		
else  
	include 'nav/login.php';	
	
	



?>  
<?php include"footer.php"; ?> 