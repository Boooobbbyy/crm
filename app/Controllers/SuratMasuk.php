<?php

namespace App\Controllers;

class SuratMasuk extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "SCM - Customer Services",
            'head' => " Customer Services"

        ];

        return view('admin/smasuk/index', $data);
    }

    public function fetch_data()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $data = [
                'srtm' => $this->SrtmModel->orderBy('nomor', 'ASC')->get()->getResultArray()
            ];
            $msg = [
                'data' => view('admin/smasuk/read', $data)
            ];

            echo json_encode($msg);
        } else {
            exit(view('error'));
        }
    }

    public function getJumlah()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $data = [
                'jumlah' => $this->SrtmModel->selectCount('id_srt')->get()->getRowArray()
            ];
            $msg = [
                'data' => $data['jumlah']['id_srt']
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

            $jumlah = $this->SrtmModel->selectCount('id_srt')->get()->getRowArray();
            $jumlah = $jumlah['id_srt'] + 1;
            $data['jumlah'] = $jumlah;

            $msg = [
                'data' => view('admin/smasuk/create', $data)
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
                    'label' => 'nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',

                    ]
                ],
                'nomor' => [
                    'label' => 'nomor',
                    'rules' => 'required|is_unique[srtm.nomor]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tersebut sudah ada'
                    ]
                ],
                'tanggal' => [
                    'label' => 'tanggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',

                    ]
                ],
                'dari' => [
                    'label' => 'dari',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',

                    ]
                ],
                'surat' => [
                    'label' => 'surat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',

                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama'     => $validation->getError('nama'),
                        'nomor'    => $validation->getError('nomor'),
                        'tanggal'  => $validation->getError('tanggal'),
                        'dari'     => $validation->getError('dari'),
                        'surat'    => $validation->getError('surat'),
                    ]
                ];
            } else {
                $simpandata = [
                    'nama'      => $request->getVar('nama'),
                    'nomor'     => $request->getVar('nomor'),
                    'tanggal'   => $request->getVar('tanggal'),
                    'dari'      => $request->getVar('dari'),
                    'surat'     => $request->getVar('surat'),
                ];

                $this->SrtmModel->insert($simpandata);
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


            $id_srt = $request->getVar('id');
            $row = $this->SrtmModel->find($id_srt);

            $data = [
                'id' => $row['id_srt'],
                'nama' => $row['nama'],
                'nomor' => $row['nomor'],
                'dari' => $row['dari'],
                'tanggal' => $row['tanggal'],
                'surat' => $row['surat'],

            ];

            $msg = [
                'sukses' => view('admin/smasuk/update', $data)
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
                'nomor'         => $request->getVar('nomor'),
                'dari'          => $request->getVar('dari'),
                'tanggal'       => $request->getVar('tanggal'),
                'surat'         => $request->getVar('surat'),
            ];

            $id_srt = $request->getVar('id');

            $this->SrtmModel->update($id_srt, $simpandata);
            $msg = [
                'sukses' => 'Data berhasil diupdate'
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

            $id_srt = $request->getVar('id');

            $this->SrtmModel->delete($id_srt);
            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];

            echo json_encode($msg);
        }
    }
    public function print()
    {
        $data = [
            'srtm' => $this->SrtmModel->orderBy('nomor', 'ASC')->get()->getResultArray()
        ];
        return view('admin/smasuk/print', $data);
    }
}
