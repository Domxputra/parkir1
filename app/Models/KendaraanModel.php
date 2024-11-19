<?php

namespace App\Models;

use CodeIgniter\Model;

class KendaraanModel extends Model
{
protected $DBGroup          = 'default';
protected $table            = 'kendaraan';
protected $primaryKey       = 'kendaraan_id';
protected $useAutoIncrement = true;
protected $returnType       = 'object';
protected $useSoftDeletes   = false;
protected $protectFields    = true;
protected $allowedFields    = ['nomor_plat','jenis_kendaraan','status'];
}