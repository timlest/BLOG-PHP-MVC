<?php
require_once('connection.php');
define('URL','http://localhost/blog_php_mvc/');

if(isset($_GET['url'])){
 $url = $_GET['url']; // 'posts/index'
 // Quita / innecesarias a la derecha.
 $url = rtrim($url, '/');

 // Devuelve un array utilizando la / como delimitador.
 $url = explode('/', $url); // ['posts', 'index'] else {
 	$controller = $url[0];
 	$action = $url[1];
 	$dato= (!empty($url[2])) ? $url[2] : null;
 }else{
 	$controller = 'pages';
 	$action = 'home';
 	$dato= null;
 }
 require_once('views/layout.php');
 ?>
