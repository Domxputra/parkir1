<?php

namespace App\Models;

use CodeIgniter\Model;

class transaksiModel extends Model
{
protected $DBGroup          = 'default';
protected $table            = 'transaksi';
protected $primaryKey       = 'transaksi_id';
protected $useAutoIncrement = true;
protected $returnType       = 'object';
protected $useSoftDeletes   = false;
protected $protectFields    = true;
protected $allowedFields    = ['waktu_masuk','waktu_keluar','biaya'];
}