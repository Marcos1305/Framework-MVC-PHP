<?php 

namespace App\Controllers;

class PostsController
{
    public function index(){
        echo 'posts';
    }

    public function show($id){
        echo 'Ola ' . $id;
    }
}


?>