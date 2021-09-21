<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdModel extends Model
{
    protected $table = 'bahan';
    protected $primaryKey = 'id_bahan';
    protected $allowedFields = ['nama', 'lokasi', 'tgl_mulai', 'Kode', 'Batch'];
}
