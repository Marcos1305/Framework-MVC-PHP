<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table = 'users';
    public $timestamp = false;

    protected $fillable =['name', 'email', 'password'];

    public function rules()
    {
        
    }
}


?>