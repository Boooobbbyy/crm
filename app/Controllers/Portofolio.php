<?php

namespace App\Controllers;

class Portofolio extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "SCM - Portofolio",
            'head' => "Portofolio"
        ];

        return view('admin/portofolio/index', $data);
    }


    public function fetch_data()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $data = [
                'portofolio' => $this->PortModel->orderBy('tgl', 'ASC')->get()->getResultArray()
            ];
            $msg = [
                'data' => view('admin/portofolio/read', $data)
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
                'jumlah' => $this->PortModel->selectCount('id_port')->get()->getRowArray()
            ];
            $msg = [
                'data' => $data['jumlah']['id_port']
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

            $jumlah = $this->PortModel->selectCount('id_port')->get()->getRowArray();
            $jumlah = $jumlah['id_port'] + 1;
            $data['jumlah'] = $jumlah;

            $msg = [
                'data' => view('admin/portofolio/create', $data)
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

                'tgl' => [
                    'label' => 'tgl',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',

                    ]
                ],

                'foto' => [
                    'label' => 'foto',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',

                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [

                        'tgl'  => $validation->getError('tgl'),
                        'foto'    => $validation->getError('foto'),
                    ]
                ];
            } else {
                $simpandata = [

                    'tgl'   => $request->getVar('tgl'),
                    'foto'     => "default.png",
                ];

                $this->PortModel->insert($simpandata);
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


            $id_port = $request->getVar('id');
            $row = $this->PortModel->find($id_port);

            $data = [
                'id' => $row['id_port'],
                'tgl' => $row['tgl'],


            ];

            $msg = [
                'sukses' => view('admin/portofolio/update', $data)
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
            $id_port = $request->getVar('id');



            $simpandata = [

                'tgl'       => $request->getVar('tgl'),


            ];

            $id_port = $request->getVar('id');

            $this->PortModel->update($id_port, $simpandata);

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

            $id_port = $request->getVar('id');


            $cekdata = $this->PortModel->find($id_port);
            $fotolama = $cekdata['foto'];
            if ($fotolama != "default.png") {
                unlink('uploads/port' . '/' . $fotolama);
                unlink('uploads/port/thumb' . '/thumb_' . $fotolama);
            }


            $this->PortModel->delete($id_port);
            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];

            echo json_encode($msg);
        }
    }

    public function form_upload()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {

            $id = $request->getVar('id');
            $row = $this->PortModel->find($id);

            $data = [
                'id' => $row['id_port'],
                'foto' => $row['foto']
            ];

            $msg = [
                'sukses' => view('admin/portofolio/upload', $data)
            ];

            echo json_encode($msg);
        } else {
            exit(view('error'));
        }
    }


    public function doupload()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'foto' => [
                    'label' => 'Foto ',
                    'rules' => 'uploaded[foto]|max_size[foto, 1024]|mime_in[foto,image/png,image/jpg,image/jpeg]|is_image[foto]',
                    'errors' => [
                        'uploaded'  => '{field} belum diupload',
                        'max_size'  => 'Ukuran {field} Melebihi 1 MB',
                        'mime_in'   => 'File yang diupload harus gambar!',
                        'is_image'  => 'File yang diupload harus gambar!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'foto' => $validation->getError('foto')
                    ]
                ];
            } else {

                $id = $request->getVar('id');
                $cekdata = $this->PortModel->find($id);
                $fotolama = $cekdata['foto'];

                if ($fotolama != 'default.png') {
                    unlink('uploads/port' . '/' . $fotolama);
                    unlink('uploads/port/thumb' . '/thumb_' . $fotolama);
                }

                $filegambar = $request->getFile('foto');

                $updatedata = [
                    'foto' => $filegambar->getName()
                ];

                $this->PortModel->update($id, $updatedata);

                \Config\Services::image()
                    ->withFile($filegambar)
                    ->fit(800, 533, 'center')
                    ->save('uploads/port/thumb/' . 'thumb_' .  $filegambar->getName());
                $filegambar->move('uploads/port');
                $msg = [
                    'sukses' => 'Gambar berhasil diupload!'
                ];
            }
            echo json_encode($msg);
        }
    }
}
