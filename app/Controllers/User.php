<?php namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $m = new UserModel();
        $data['rows'] = $m->orderBy('id','DESC')->findAll();

        return view('layout/header')
            . view('user/index', $data)
            . view('layout/footer');
    }

    public function create()
    {
        return view('layout/header')
            . view('user/form', ['mode'=>'create'])
            . view('layout/footer');
    }

    public function store()
    {
        $m = new UserModel();
        $post = $this->request->getPost();
        $post['password_sha1'] = sha1($post['password']);
        unset($post['password']);

        $m->insert($post);
        return redirect()->to(base_url('user'))->with('ok','User ditambahkan');
    }

    public function edit($id)
    {
        $m = new UserModel();
        $row = $m->find($id);

        return view('layout/header')
            . view('user/form', ['mode'=>'edit','row'=>$row])
            . view('layout/footer');
    }

    public function update($id)
    {
        $m = new UserModel();
        $post = $this->request->getPost();

        // password optional
        if(!empty($post['password'])){
            $post['password_sha1'] = sha1($post['password']);
        }
        unset($post['password']);

        $m->update($id, $post);
        return redirect()->to(base_url('user'))->with('ok','User diperbarui');
    }

    public function delete($id)
    {
        $m = new UserModel();
        $m->delete($id);
        return redirect()->to(base_url('user'))->with('ok','User dihapus');
    }

    public function resetPassword($id)
    {
        $m = new UserModel();
        $newPass = 'user123'; // default reset
        $m->update($id, ['password_sha1'=>sha1($newPass)]);
        return redirect()->to(base_url('user'))->with('ok','Password direset ke: '.$newPass);
    }
}
