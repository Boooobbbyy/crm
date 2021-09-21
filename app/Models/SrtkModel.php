<?php

namespace App\Models;

use CodeIgniter\Model;

class SrtkModel extends Model
{
    protected $table = 'srtk';
    protected $primaryKey = 'id_srt';
    protected $allowedFields = ['nama', 'nomor', 'tanggal', 'dari', 'surat'];
}
