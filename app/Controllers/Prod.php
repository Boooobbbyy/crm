<?php

namespace App\Controllers;

class Prod extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "SCM - Bahan",
            'head' => "Bahan"
        ];

        return view('admin/produk/index', $data);
    }
    public function fetch_data()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $data = [
                'bahan' => $this->ProdModel->findAll(),
            ];
            $msg = [
                'data' => view('admin/produk/read', $data)
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
                'data' => view('admin/produk/create')
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

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama'        => $validation->getError('nama'),
                        'lokasi'      => $validation->getError('lokasi'),
                        'Batch'      => $validation->getError('Batch'),
                        'Kode'      => $validation->getError('Kode'),
                        'tgl_mulai'   => $validation->getError('tgl_mulai'),

                    ]
                ];
            } else {
                $simpandata = [
                    'nama'          => $request->getVar('nama'),
                    'lokasi'          => $request->getVar('lokasi'),
                    'Batch'          => $request->getVar('Batch'),
                    'Kode'          => $request->getVar('Kode'),
                    'tgl_mulai'       => date('Y,m,d,H,i,s'),

                ];
                $this->ProdModel->insert($simpandata);

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
                'bahan' => $this->ProdModel->find($id)
            ];

            $msg = [
                'sukses' => view('admin/produk/update', $data)
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

            ];

            $id = $request->getVar('id');

            $this->ProdModel->update($id, $simpandata);

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
                'bahan' => $this->ProdModel->find($id)
            ];

            $msg = [
                'sukses' => view('admin/produk/detail', $data)
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

            $this->ProdModel->delete($id);

            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];

            echo json_encode($msg);
        }
    }
}
