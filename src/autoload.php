<?php
spl_autoload_register(
	function( $classname )
	{
		$classname =   '/' . $classname . ".php";
		include $classname;
		
	}
);
