<?php

namespace App\Controllers;

class SuratKeluar extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "SCM - Supplier",
            'head' => "Supplier"
        ];

        return view('admin/skeluar/index', $data);
    }


    public function fetch_data()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $data = [
                'srtk' => $this->SrtkModel->orderBy('nomor', 'ASC')->get()->getResultArray()
            ];
            $msg = [
                'data' => view('admin/skeluar/read', $data)
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
                'jumlah' => $this->SrtkModel->selectCount('id_srt')->get()->getRowArray()
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

            $jumlah = $this->SrtkModel->selectCount('id_srt')->get()->getRowArray();
            $jumlah = $jumlah['id_srt'] + 1;
            $data['jumlah'] = $jumlah;

            $msg = [
                'data' => view('admin/skeluar/create', $data)
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
                    'rules' => 'required|is_unique[srtk.nomor]',
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

                $this->SrtkModel->insert($simpandata);
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
            $row = $this->SrtkModel->find($id_srt);

            $data = [
                'id' => $row['id_srt'],
                'nama' => $row['nama'],
                'nomor' => $row['nomor'],
                'dari' => $row['dari'],
                'tanggal' => $row['tanggal'],
                'surat' => $row['surat'],

            ];

            $msg = [
                'sukses' => view('admin/skeluar/update', $data)
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

            $this->SrtkModel->update($id_srt, $simpandata);
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

            $this->SrtkModel->delete($id_srt);
            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];

            echo json_encode($msg);
        }
    }
    public function print()
    {
        $data = [
            'srtk' => $this->SrtkModel->orderBy('nomor', 'ASC')->get()->getResultArray()
        ];
        return view('admin/skeluar/print', $data);
    }
}
