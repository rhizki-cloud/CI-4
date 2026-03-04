<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username','nama','password_sha1','role','email','telepon','status','created_at','updated_at'];
    protected $useTimestamps = true;

    public function verifyLogin(string $username, string $password): ?array
    {
        $user = $this->where('username', $username)->where('status','Aktif')->first();
        if(!$user) return null;
        return ($user['password_sha1'] === sha1($password)) ? $user : null;
    }
}
