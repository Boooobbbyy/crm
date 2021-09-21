<?php

namespace App\Models;

use CodeIgniter\Model;

class IotModel extends Model
{
    protected $table = 'iot';
    protected $primaryKey = 'id_iot';
    protected $allowedFields = ['nama_prod', 'berat', 'tanggal'];
}
