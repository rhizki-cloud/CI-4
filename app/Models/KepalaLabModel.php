<?php namespace App\Models;

use CodeIgniter\Model;

class KepalaLabModel extends Model
{
    protected $table = 'kepala_lab';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama','nip','jabatan','email','telepon','status','created_at','updated_at'];
    protected $useTimestamps = true;
}
