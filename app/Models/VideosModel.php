<?php

namespace App\Models;

use CodeIgniter\Model;

class VideosModel extends Model
{
    protected $table = 'videos';
    protected $primaryKey = 'id_vid';
    protected $allowedFields = ['judul', 'link', 'tanggal'];
}
