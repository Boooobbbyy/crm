<?php

namespace App\Database\Seeds;

use \CodeIgniter\I18n\Time;

class UserSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            'nama'        => 'Administrator',
            'username'     => 'admin',
            'password'     => password_hash('admin', PASSWORD_DEFAULT),
            'date_created'  => Time::now()
        ];

        // Using Query Builder
        $this->db->table('user')->insert($data);
    }
}
