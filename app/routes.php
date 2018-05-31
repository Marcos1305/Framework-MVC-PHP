<?php 

$route[] = ['/', 'HomeController@index'];
$route[] = ['/posts', 'PostsController@index'];
$route[] = ['/posts/{id}/show', 'PostsController@show'];
$route[] = ['/posts/create', 'PostsController@create'];
$route[] = ['/posts/store', 'PostsController@store'];



return $route;

?>