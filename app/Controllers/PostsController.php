<?php 

namespace App\Controllers;

use Core\BaseController;
use Core\Container;
use  Core\DataBase;
use Core\Redirect;


class PostsController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $conn = DataBase::getDatabase();  //não esquecer do use Core\DataBase;
        $this->post = Container::getModelEx("Post", $conn); 
    }
    public function index(){
        $this->setPageTitle('Posts');
        $this->view->posts = $this->post->All();
        $this->renderView('posts/index', 'layout');
    }

    public function show($id){
        $this->view->post = $this->post->find($id);
        $this->setPageTitle("{$this->view->post->title}");
        $this->renderView('posts/show', 'layout');
    }
    public function create()
    {
        $this->setPageTitle('New Post');
        $this->renderView('posts/create', 'layout');
    }
    public function store($request)
    {   
        $data = [
            'title' => $request->post->title,
            'content' => $request->post->content
        ];
        
        $this->post->create($data);
        Redirect::route('/posts');
    }
    public function edit($id)
    {
        $this->view->post = $this->post->find($id);
        $this->setPageTitle('Edit post ' . $this->view->post->title);
        $this->renderView('posts/edit', 'layout');
    }

    public function update($id, $request)
    {
        $data = [
            'id' => $id,
            'title' => $request->post->title,
            'content' => $request->post->content
        ];
        
        $this->post->update($data, $id);
        Redirect::route('/posts');
    }
}


?>