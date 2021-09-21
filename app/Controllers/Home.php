<?php

namespace App\Controllers;

class Home extends BaseController
{


	public function index()
	{
		$data = [
			'profile' => $this->ProfileModel->findAll(),
			'portofolio' => $this->PortModel->orderBy('tgl', 'ASC')->get()->getResultArray(),
			'news' => $this->NewsModel->orderBy('tanggal', 'ASC')->get()->getResultArray(),
			'home' => $this->HomeModel->orderBy('tgl', 'ASC')->get()->getResultArray(),
			'videos' => $this->VideosModel->orderBy('tanggal', 'ASC')->get()->getResultArray(),
			'pegawai' => $this->PegawaiModel->join('jabatan', 'jabatan.id_jabatan = pegawai.jabatan')->get()->getResultArray()



		];
		return view('index', $data);
	}

	public function dp1()
	{
		return view('dp1');
	}

	public function dp2()
	{
		return view('dp2');
	}

	//==========================	href home	=====================================//
	public function interior()
	{
		return view('/home/interior');
	}

	public function develop()
	{
		return view('/home/develop');
	}
	public function commer()
	{
		return view('/home/commer');
	}

	public function bla()
	{
		return view('/home/bla');
	}
}
