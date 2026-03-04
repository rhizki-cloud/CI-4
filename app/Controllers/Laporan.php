<?php namespace App\Controllers;

use CodeIgniter\Database\BaseConnection;

class Laporan extends BaseController
{
    private function baseQuery()
    {
        $db = db_connect();
        $builder = $db->table('nota n')
            ->select('n.id, n.no_nota, n.nama_penerima, n.tanggal_nota, n.tipe_pelanggan, n.nim');

        // kalau ada kolom grand_total (opsional)
        $cols = $db->getFieldNames('nota');
        if(in_array('grand_total', $cols)){
            $builder->select('n.grand_total');
        }

        return [$db, $builder];
    }

    public function pengujian()
    {
        [$db,$b] = $this->baseQuery();

        $tgl1 = $this->request->getGet('tgl1');
        $tgl2 = $this->request->getGet('tgl2');
        $tipe = $this->request->getGet('tipe');

        if($tgl1) $b->where('n.tanggal_nota >=', $tgl1);
        if($tgl2) $b->where('n.tanggal_nota <=', $tgl2);
        if($tipe) $b->where('n.tipe_pelanggan', $tipe);

        $rows = $b->orderBy('n.tanggal_nota','DESC')->get()->getResultArray();

        return view('layout/header')
            . view('laporan/pengujian', [
                'rows'=>$rows,
                'tgl1'=>$tgl1,
                'tgl2'=>$tgl2,
                'tipe'=>$tipe,
            ])
            . view('layout/footer');
    }

    public function pengujianPrint()
    {
        // sama seperti pengujian() tapi tanpa layout
        [$db,$b] = $this->baseQuery();

        $tgl1 = $this->request->getGet('tgl1');
        $tgl2 = $this->request->getGet('tgl2');
        $tipe = $this->request->getGet('tipe');

        if($tgl1) $b->where('n.tanggal_nota >=', $tgl1);
        if($tgl2) $b->where('n.tanggal_nota <=', $tgl2);
        if($tipe) $b->where('n.tipe_pelanggan', $tipe);

        $rows = $b->orderBy('n.tanggal_nota','DESC')->get()->getResultArray();

        return view('laporan/pengujian_print', compact('rows','tgl1','tgl2','tipe'));
    }

    public function pengujianCsv()
    {
        [$db,$b] = $this->baseQuery();

        $tgl1 = $this->request->getGet('tgl1');
        $tgl2 = $this->request->getGet('tgl2');
        $tipe = $this->request->getGet('tipe');

        if($tgl1) $b->where('n.tanggal_nota >=', $tgl1);
        if($tgl2) $b->where('n.tanggal_nota <=', $tgl2);
        if($tipe) $b->where('n.tipe_pelanggan', $tipe);

        $rows = $b->orderBy('n.tanggal_nota','DESC')->get()->getResultArray();

        $filename = 'laporan_pengujian.csv';
        header("Content-Type: text/csv");
        header("Content-Disposition: attachment; filename={$filename}");

        $out = fopen("php://output", "w");
        fputcsv($out, ['No Nota','Penerima','Tanggal','Tipe','NIM','Total']);
        foreach($rows as $r){
            fputcsv($out, [
                $r['no_nota'],
                $r['nama_penerima'],
                $r['tanggal_nota'],
                $r['tipe_pelanggan'],
                $r['nim'] ?? '',
                $r['grand_total'] ?? ''
            ]);
        }
        fclose($out);
        exit;
    }
}
