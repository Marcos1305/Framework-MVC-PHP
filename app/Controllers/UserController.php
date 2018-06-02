<?php 
use Core\BaseController;
use App\Model\user;
use Core\Redirect;

class userController extends BaseController
{
    private $user;
    public function __construct()
    {
        parent::__construct();
        $this->user = new User;
    }
    public function create()
    {
        $this->setPageTitle('New User');
        return $this->renderView('user/create');
    }
    public function store($request)
    {   
        $data = [
            'name' => $request->post->name,
            'email' => $request->post->email,
            'password' => $request->post->password
        ];
        $data['password'] = password_hash ( $request->post->password , PASSWORD_BCRYPT);
        try{
            $this->user->create($data);
            return Redirect::route('/posts');

        }catch(\Exception $e){
            throw new Exception("Error ao salvar", 1);
            
        }
    }
}
?>