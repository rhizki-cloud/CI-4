<?php namespace App\Controllers;

use App\Models\KepalaLabModel;

class KepalaLab extends BaseController
{
    public function index()
    {
        $m = new KepalaLabModel();
        $data['rows'] = $m->orderBy('id','DESC')->findAll();

        return view('layout/header')
            . view('kepala_lab/index', $data)
            . view('layout/footer');
    }

    public function create()
    {
        return view('layout/header')
            . view('kepala_lab/form', ['mode'=>'create'])
            . view('layout/footer');
    }

    public function store()
    {
        $m = new KepalaLabModel();
        $m->insert($this->request->getPost());
        return redirect()->to(base_url('kepala-lab'))->with('ok','Data Kepala Lab ditambahkan');
    }

    public function edit($id)
    {
        $m = new KepalaLabModel();
        $row = $m->find($id);

        return view('layout/header')
            . view('kepala_lab/form', ['mode'=>'edit','row'=>$row])
            . view('layout/footer');
    }

    public function update($id)
    {
        $m = new KepalaLabModel();
        $m->update($id, $this->request->getPost());
        return redirect()->to(base_url('kepala-lab'))->with('ok','Data Kepala Lab diperbarui');
    }

    public function delete($id)
    {
        $m = new KepalaLabModel();
        $m->delete($id);
        return redirect()->to(base_url('kepala-lab'))->with('ok','Data dihapus');
    }
}
