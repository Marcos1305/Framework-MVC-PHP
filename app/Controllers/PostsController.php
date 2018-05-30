<?php 

namespace App\Controllers;

class PostsController
{
    public function index(){
        echo 'posts';
    }

    public function show($id, $request){
        echo 'Ola ' . $id.'<br>';
        echo $request->get->nome .'<br>';
        echo $request->get->sexo .'<br>';
    }
}


?>