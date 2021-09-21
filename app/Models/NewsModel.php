<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id_news';
    protected $allowedFields = ['judul', 'tanggal', 'desk', 'link', 'foto'];
}
