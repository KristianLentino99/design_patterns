<?php
spl_autoload_register(function ($class) {

	$dir = str_replace(['app','\\'],['..','/'],$class);

	include_once $dir.'.php';
});
?>