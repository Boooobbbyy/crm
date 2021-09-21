<?php

namespace App\Controllers;

class Proyek extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "SCM - Produk",
            'head' => "Produk"
        ];

        return view('admin/proyek/index', $data);
    }
    public function fetch_data()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $data = [
                'proyek' => $this->ProyekModel->findAll(),
            ];
            $msg = [
                'data' => view('admin/proyek/read', $data),
                'total' => $this->ProyekModel->countAllResults(),
                'proses' => $this->ProyekModel->where('status', 'dalam proses')->countAllResults(),
                'selesai' => $this->ProyekModel->where('status', 'selesai')->countAllResults(),
                'batal' => $this->ProyekModel->where('status', 'dibatalkan')->countAllResults(),
            ];

            echo json_encode($msg);
        } else {
            exit(view('error'));
        }
    }


    public function form_tambah()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {

            $msg = [
                'data' => view('admin/proyek/create')
            ];

            echo json_encode($msg);
        } else {
            exit(view('error'));
        }
    }

    public function simpan()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'lokasi' => [
                    'label' => 'Lokasi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'Batch' => [
                    'label' => 'Batch',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'Kode' => [
                    'label' => 'Kode',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tgl_mulai' => [
                    'label' => 'Tanggal Mulai',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'tgl_selesai' => [
                    'label' => 'Tanggal Selesai',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'status' => [
                    'label' => 'Status',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'progress' => [
                    'label' => 'Progress',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'dana' => [
                    'label' => 'Dana',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama'        => $validation->getError('nama'),
                        'lokasi'      => $validation->getError('lokasi'),
                        'Batch'      => $validation->getError('Batch'),
                        'Kode'      => $validation->getError('Kode'),
                        'tgl_mulai'   => $validation->getError('tgl_mulai'),
                        'tgl_selesai' => $validation->getError('tgl_selesai'),
                        'status'     => $validation->getError('status'),
                        'progress'    => $validation->getError('progress'),
                        'dana'        => $validation->getError('dana')
                    ]
                ];
            } else {
                $simpandata = [
                    'nama'          => $request->getVar('nama'),
                    'lokasi'          => $request->getVar('lokasi'),
                    'Batch'          => $request->getVar('Batch'),
                    'Kode'          => $request->getVar('Kode'),
                    'tgl_mulai'       => date('Y,m,d,H,i,s'),
                    'tgl_selesai'         => $request->getVar('tgl_selesai'),
                    'status'    => $request->getVar('status'),
                    'progress' => $request->getVar('progress'),
                    'dana' => $request->getVar('dana'),
                ];
                $this->ProyekModel->insert($simpandata);

                $msg = [
                    'sukses' => 'Data berhasil disimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit(view('error'));
        }
    }
    public function form_edit()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $id = $request->getVar('id');

            $data = [
                'proyek' => $this->ProyekModel->find($id)
            ];

            $msg = [
                'sukses' => view('admin/proyek/update', $data)
            ];

            echo json_encode($msg);
        } else {
            exit(view('error'));
        }
    }

    public function edit()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {
            $simpandata = [
                'nama'          => $request->getVar('nama'),
                'lokasi'        => $request->getVar('lokasi'),
                'Batch'        => $request->getVar('Batch'),
                'Kode'        => $request->getVar('Kode'),
                'tgl_mulai'     => $request->getVar('tgl_mulai'),
                'tgl_selesai'   => date('Y,m,d,H,i,s'),
                'status'        => $request->getVar('status'),
                'progress'      => $request->getVar('progress'),
                'dana'          => $request->getVar('dana'),
            ];

            $id = $request->getVar('id');

            $this->ProyekModel->update($id, $simpandata);

            $msg = [
                'sukses' => 'Data berhasil diupdate',
            ];

            echo json_encode($msg);
        } else {
            exit(view('error'));
        }
    }

    public function show_detail()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {

            $id = $request->getVar('id');

            $data = [
                'proyek' => $this->ProyekModel->find($id)
            ];

            $msg = [
                'sukses' => view('admin/proyek/detail', $data)
            ];

            echo json_encode($msg);
        } else {
            exit(view('error'));
        }
    }

    public function hapus()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {

            $id = $request->getVar('id');

            $this->ProyekModel->delete($id);

            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];

            echo json_encode($msg);
        }
    }
}
