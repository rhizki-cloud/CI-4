<?php
namespace App\Controllers;

use App\Models\NotaModel;
use App\Models\NotaDetailModel;
use App\Models\JenisUjiModel;

class Nota extends BaseController
{
    public function index()
    {
        $notaM = new \App\Models\NotaModel();
    
        $rows = $notaM->orderBy('id','DESC')->findAll();
    
        $total = count($rows);
        $totalMhs = 0; $totalUmum = 0;
        foreach($rows as $r){
            if(($r['tipe_pelanggan'] ?? '') === 'mahasiswa') $totalMhs++;
            else $totalUmum++;
        }
    
        return view('layout/header')
            . view('nota/index', [
                'rows' => $rows,
                'total' => $total,
                'totalMhs' => $totalMhs,
                'totalUmum' => $totalUmum,
            ])
            . view('layout/footer');
    }
    

    public function createMahasiswa(){ return $this->create('mahasiswa'); }
    public function createUmum(){ return $this->create('umum'); }

    private function create(string $tipe)
    {
        $id = (new NotaModel())->insert([
            'no_nota'        => 'NT'.date('YmdHis'),
            'tanggal_nota'   => date('Y-m-d'),
            'tipe_pelanggan' => $tipe,
            'nama_penerima'  => '',
            'nim'            => ($tipe==='mahasiswa') ? '' : null,
            'created_by'     => session('user_id')
        ], true);

        return redirect()->to(base_url('nota/edit/'.$id));
    }

    public function edit($id)
    {
        $notaM   = new NotaModel();
        $detailM = new NotaDetailModel();
        $jenisM  = new JenisUjiModel();

        $nota = $notaM->find($id);
        if (!$nota) return redirect()->to(base_url('nota'));

        $details = $detailM->select('nota_detail.*, jenis_uji.nama_specimen, jenis_uji.satuan')
  ->join('jenis_uji', 'jenis_uji.id = nota_detail.jenis_uji_id')
  ->where('nota_id', $id)->findAll();



        $grand = 0;
        foreach($details as $d) $grand += (float)$d['total'];

        $jenis = $jenisM->orderBy('nama_specimen','ASC')->findAll();

        return view('layout/header')
            . view('nota/edit', compact('nota','details','grand','jenis'))
            . view('layout/footer');
    }

    public function update($id)
    {
        $notaM = new NotaModel();
        $nota  = $notaM->find($id);
        if (!$nota) return redirect()->to(base_url('nota'));

        $notaM->update($id, [
            'tanggal_nota'  => $this->request->getPost('tanggal_nota'),
            'nama_penerima' => $this->request->getPost('nama_penerima'),
            'nim'           => ($nota['tipe_pelanggan']==='mahasiswa') ? $this->request->getPost('nim') : null
        ]);

        return redirect()->to(base_url('nota/edit/'.$id))->with('success','Data customer diupdate');
    }

    public function addItem($notaId)
    {
        $nota = (new NotaModel())->find($notaId);
        if (!$nota) return redirect()->to(base_url('nota'));

        $jenisId = (int)$this->request->getPost('jenis_uji_id');
        $jumlah  = max(1, (int)$this->request->getPost('jumlah'));

        $jenis = (new JenisUjiModel())->find($jenisId);
        if (!$jenis) return redirect()->to(base_url('nota/edit/'.$notaId))->with('error','Jenis uji tidak ditemukan');

        $harga = ($nota['tipe_pelanggan']==='mahasiswa') ? (float)$jenis['harga_mahasiswa'] : (float)$jenis['harga_umum'];
        $total = $harga * $jumlah;

        (new NotaDetailModel())->insert([
            'nota_id' => $notaId,
            'jenis_uji_id' => $jenisId,
            'jumlah' => $jumlah,
            'harga' => $harga,
            'total' => $total
        ]);

        return redirect()->to(base_url('nota/edit/'.$notaId))->with('success','Item ditambahkan');
    }

    public function deleteItem($notaId, $detailId)
    {
        (new NotaDetailModel())->delete($detailId);
        return redirect()->to(base_url('nota/edit/'.$notaId))->with('success','Item dihapus');
    }

    public function apiJenisUji($id, $tipe)
    {
        $jenis = (new JenisUjiModel())->find($id);
        if (!$jenis) return $this->response->setJSON(['ok'=>false]);

        $harga = ($tipe==='mahasiswa') ? $jenis['harga_mahasiswa'] : $jenis['harga_umum'];
        return $this->response->setJSON(['ok'=>true,'harga'=>$harga]);
    }
}
