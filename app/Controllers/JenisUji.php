<?php
namespace App\Controllers;

use App\Models\JenisUjiModel;

class JenisUji extends BaseController
{
    public function index()
    {
        $m = new \App\Models\JenisUjiModel();
        $rows = $m->orderBy('id','DESC')->findAll();
    
        $total = count($rows);
        $aktif = 0; $non = 0;
        $sumU = 0; $sumM = 0;
    
        foreach($rows as $r){
            if(($r['status'] ?? 'Aktif') === 'Aktif') $aktif++; else $non++;
            $sumU += (float)($r['harga_umum'] ?? 0);
            $sumM += (float)($r['harga_mahasiswa'] ?? 0);
        }
    
        $avgU = $total ? ($sumU/$total) : 0;
        $avgM = $total ? ($sumM/$total) : 0;
    
        return view('layout/header')
          . view('jenis_uji/index', [
              'rows' => $rows,
              'total' => $total,
              'aktif' => $aktif,
              'non' => $non,
              'avgU' => $avgU,
              'avgM' => $avgM,
          ])
          . view('layout/footer');
    }
    


    public function create()
    {
        return view('layout/header')
            . view('jenis_uji/create')
            . view('layout/footer');
    }

    public function store()
    {
        (new JenisUjiModel())->insert([
            'nama_specimen'   => $this->request->getPost('nama_specimen'),
            'jenis_barang'    => $this->request->getPost('jenis_barang'),
            'harga_mahasiswa' => $this->request->getPost('harga_mahasiswa'),
            'harga_umum'      => $this->request->getPost('harga_umum'),
            'satuan'          => $this->request->getPost('satuan'),
        ]);
        return redirect()->to(base_url('jenis-uji'))->with('success','Data tersimpan');
    }

    public function edit($id)
    {
        $row = (new JenisUjiModel())->find($id);
        return view('layout/header')
            . view('jenis_uji/edit', compact('row'))
            . view('layout/footer');
    }

    public function update($id)
    {
        (new JenisUjiModel())->update($id, [
            'nama_specimen'   => $this->request->getPost('nama_specimen'),
            'jenis_barang'    => $this->request->getPost('jenis_barang'),
            'harga_mahasiswa' => $this->request->getPost('harga_mahasiswa'),
            'harga_umum'      => $this->request->getPost('harga_umum'),
            'satuan'          => $this->request->getPost('satuan'),
        ]);
        return redirect()->to(base_url('jenis-uji'))->with('success','Data diupdate');
    }

    public function delete($id)
    {
        (new JenisUjiModel())->delete($id);
        return redirect()->to(base_url('jenis-uji'))->with('success','Data dihapus');
    }
}
