<?php
namespace App\Models;

use CodeIgniter\Model;

class JenisUjiModel extends Model
{
    protected $table = 'jenis_uji';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama_specimen','jenis_barang',
        'harga_mahasiswa','harga_umum',
        'satuan','status'
    ];
}
