<?php

namespace App\Models;

use CodeIgniter\Model;

class ProyekModel extends Model
{
    protected $table = 'proyek';
    protected $primaryKey = 'id_proyek';
    protected $allowedFields = ['nama', 'lokasi', 'tgl_mulai', 'tgl_selesai', 'status', 'progress', 'Kode', 'Batch', 'dana'];
}
