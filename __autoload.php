<?php 
	function __autoload($file_name){
		
		include_once($file_name.'.php');
	}

?>