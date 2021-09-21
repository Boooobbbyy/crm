<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "SCM - Dashboard",
            'head' => "Dashboard"
        ];

        return view('admin/dashboard/index', $data);
    }
}
