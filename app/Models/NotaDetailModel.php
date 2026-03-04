<?php
namespace App\Models;

use CodeIgniter\Model;

class NotaDetailModel extends Model
{
    protected $table = 'nota_detail';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nota_id','jenis_uji_id','jumlah','harga','total'];
}
