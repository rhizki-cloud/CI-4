<?php
namespace App\Models;

use CodeIgniter\Model;

class NotaModel extends Model
{
    protected $table = 'nota';
    protected $primaryKey = 'id';
    protected $allowedFields = ['no_nota','tanggal_nota','tipe_pelanggan','nama_penerima','nim','created_by'];
}
