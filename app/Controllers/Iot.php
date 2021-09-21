<?php

namespace App\Controllers;

class Iot extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "SCM - IOT",
            'head' => "IOT"
        ];

        return view('admin/Iot/index', $data);
    }

    public function fetch_data()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $data = [
                'iot' => $this->IotModel->join('proyek', 'proyek.id_proyek = iot.nama_prod')->get()->getResultArray()
            ];
            $msg = [
                'data' => view('admin/Iot/read', $data)
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

            $iot = $this->IotModel->findAll();
            $data['nama_prod'] = $iot;

            $msg = [
                'data' => view('admin/Iot/create', $data)
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
                'berat' => [
                    'label' => 'berat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tanggal' => [
                    'label' => 'tanggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_prod'       => $validation->getError('nama_prod'),
                        'berat'      => $validation->getError('berat'),
                        'tanggal'   => $validation->getError('tanggal'),

                    ]
                ];
            } else {
                $simpandata = [
                    'nama_prod'           => $request->getVar('nama_prod'),
                    'berat'          => $request->getVar('berat'),
                    'tanggal'       => date('Y,m,d,H,i,s'),

                ];
                $this->IotModel->insert($simpandata);
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

            $id = $request->getVar('id_iot');
            $row = $this->IotModel->find($id);

            $produk = $this->ProyekModel->findAll();

            $data = [
                'berat' => $row['berat'],
                'tanggal' => $row['tanggal'],
                'nama_prod' => $produk
            ];

            $msg = [
                'sukses' => view('admin/Iot/update', $data)
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
                'nama_prod'           => $request->getVar('nama_prod'),
                'berat'          => $request->getVar('berat'),
                'tanggal'       => $request->getVar('tanggal'),
            ];

            $id = $request->getVar('id_iot');

            $this->IotModel->update($id, $simpandata);
            $msg = [
                'sukses' => 'Data berhasil diupdate'
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

            $id = $request->getVar('id_iot');
            $row = $this->IotModel->join('proyek', 'proyek.id_proyek = iot.nama_prod')->where('id_iot', $id)->get()->getRowArray();

            $data = [
                'id_iot'        => $row['id_iot'],
                'nama_prod'       => $row['nama'],
                'berat'      => $row['berat'],
                'tanggal'   => $row['tanggal'],


            ];

            $msg = [
                'sukses' => view('admin/Iot/detail', $data)
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

            $id = $request->getVar('id_iot');
            $this->IotModel->delete($id);

            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];

            echo json_encode($msg);
        }
    }
}
