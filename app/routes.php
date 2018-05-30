<?php 

$route[] = ['/', 'HomeController@index'];
$route[] = ['/posts', 'PostsController@index'];
$route[] = ['/posts/{id}/show', 'PostsController@show'];



return $route;

?>