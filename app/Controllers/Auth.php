<?php
namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function loginForm()
    {
        return view('auth/login');
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = sha1($this->request->getPost('password'));

        $user = (new UserModel())
            ->where('username', $username)
            ->where('password', $password)
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Username atau Password salah');
        }

        session()->set([
            'isLoggedIn' => true,
            'user_id' => $user['id'],
            'nama' => $user['nama'],
        ]);

        return redirect()->to(base_url('dashboard'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
