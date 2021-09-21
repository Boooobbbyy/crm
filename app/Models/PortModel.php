<?php

namespace App\Models;

use CodeIgniter\Model;

class PortModel extends Model
{
    protected $table = 'portofolio';
    protected $primaryKey = 'id_port';
    protected $allowedFields = ['foto', 'tgl'];
}
