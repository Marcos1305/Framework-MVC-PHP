<?php 

namespace App\Controllers;

use Core\BaseController;
use App\Models\Post;
use Core\Redirect;


class PostsController extends BaseController
{
    private $post;
    public function __construct()
    {
        parent::__construct();
        $this->post = new Post;
    }
    public function index(){
        $this->setPageTitle('Posts');
        $this->view->posts =  $this->post->all();
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
        
        try {
            $this->post->create($data);
            Redirect::route('/posts');
            }catch(\Exception $e){
                throw new Exception("ERRO AO ATUALIZAR", 1);
                Redirect::route('/posts');
                
            }
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
            'title' => $request->post->title,
            'content' => $request->post->content
        ];
        try {
        $post = $this->post->find($id);
        $post->update($data);
        Redirect::route('/posts');
        }catch(\Exception $e){
            throw new Exception("ERRO AO ATUALIZAR", 1);
            Redirect::route('/posts');
            
        }
        
        // $this->post->update($data, $id);
        // Redirect::route('/posts');
    }
    public function delete($id)
    {
        try {
            $post = $this->post->find($id);
            $post->delete();
            Redirect::route('/posts');
            }catch(\Exception $e){
                throw new Exception("ERRO AO EXCLUIR", 1);
                Redirect::route('/posts');
                
            }
    }
}


?>