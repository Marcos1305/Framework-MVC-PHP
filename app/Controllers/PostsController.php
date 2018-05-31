<?php 

namespace App\Controllers;

use Core\BaseController;
use Core\Container;


class PostsController extends BaseController
{
    public function index(){
        $model = Container::getModel("Post");
        $posts = $model->All();
        print_r($posts);
    }

    public function show($id, $request){
        echo 'Ola ' . $id.'<br>';
        echo $request->get->nome .'<br>';
        echo $request->get->sexo .'<br>';
    }
}


?>