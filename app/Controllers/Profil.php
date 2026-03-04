<?php namespace App\Controllers;

use App\Models\UserModel;

class Profil extends BaseController
{
    public function index()
    {
        $m = new UserModel();
        $id = session()->get('user_id');
        $row = $m->find($id);

        return view('layout/header')
            . view('profil/index', ['row'=>$row])
            . view('layout/footer');
    }

    public function edit()
    {
        $m = new UserModel();
        $id = session()->get('user_id');
        $row = $m->find($id);

        return view('layout/header')
            . view('profil/edit', ['row'=>$row])
            . view('layout/footer');
    }

    public function update()
    {
        $m = new UserModel();
        $id = session()->get('user_id');
        $post = $this->request->getPost();

        $m->update($id, [
            'nama'=>$post['nama'],
            'email'=>$post['email'],
            'telepon'=>$post['telepon'],
        ]);

        return redirect()->to(base_url('profil'))->with('ok','Profil diperbarui');
    }

    public function password()
    {
        return view('layout/header')
            . view('profil/password')
            . view('layout/footer');
    }

    public function passwordSave()
    {
        $m = new UserModel();
        $id = session()->get('user_id');

        $lama = $this->request->getPost('password_lama');
        $baru = $this->request->getPost('password_baru');

        $user = $m->find($id);
        if(!$user || $user['password_sha1'] !== sha1($lama)){
            return redirect()->back()->with('error','Password lama salah');
        }

        $m->update($id, ['password_sha1'=>sha1($baru)]);
        return redirect()->to(base_url('profil'))->with('ok','Password berhasil diganti');
    }
}
