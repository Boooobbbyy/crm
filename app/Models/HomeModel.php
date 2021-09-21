<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $table = 'home';
    protected $primaryKey = 'id_home';
    protected $allowedFields = ['foto', 'des', 'tgl', 'jud'];
}
