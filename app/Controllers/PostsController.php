<?php 

namespace App\Controllers;

use Core\BaseController;


class PostsController extends BaseController
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