<?php

namespace App\Controllers;

class Ahome extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "SCM - Home",
            'head' => "Home"
        ];

        return view('admin/home/index', $data);
    }

    public function fetch_data()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $data = [
                'home' => $this->HomeModel->orderBy('tgl', 'ASC')->get()->getResultArray()
            ];
            $msg = [
                'data' => view('admin/home/read', $data)
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
                'jumlah' => $this->HomeModel->selectCount('id_home')->get()->getRowArray()
            ];
            $msg = [
                'data' => $data['jumlah']['id_home']
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

            $jumlah = $this->HomeModel->selectCount('id_home')->get()->getRowArray();
            $jumlah = $jumlah['id_home'] + 1;
            $data['jumlah'] = $jumlah;

            $msg = [
                'data' => view('admin/home/create', $data)
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
                'jud' => [
                    'label' => 'jud',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',

                    ]
                ],
                'des' => [
                    'label' => 'des',
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
                        'des'    => $validation->getError('des'),
                        'jud'    => $validation->getError('jud'),
                    ]
                ];
            } else {
                $simpandata = [

                    'tgl'   => $request->getVar('tgl'),
                    'des'   => $request->getVar('des'),
                    'jud'   => $request->getVar('jud'),
                    'foto'     => "default.png",
                ];

                $this->HomeModel->insert($simpandata);
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


            $id_home = $request->getVar('id');
            $row = $this->HomeModel->find($id_home);

            $data = [
                'id' => $row['id_home'],
                'tgl' => $row['tgl'],

                'des' => $row['des'],
                'jud' => $row['jud'],

            ];

            $msg = [
                'sukses' => view('admin/home/update', $data)
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
            $id_home = $request->getVar('id');



            $simpandata = [

                'tgl'       => $request->getVar('tgl'),
                'jud'       => $request->getVar('jud'),
                'des'       => $request->getVar('des'),


            ];

            $id_home = $request->getVar('id');

            $this->HomeModel->update($id_home, $simpandata);

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

            $id_home = $request->getVar('id');

            $cekdata = $this->HomeModel->find($id_home);
            $fotolama = $cekdata['foto'];
            if ($fotolama != "default.png") {
                unlink('uploads/home' . '/' . $fotolama);
                unlink('uploads/home/thumb' . '/thumb_' . $fotolama);
            }

            $this->HomeModel->delete($id_home);
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
            $row = $this->HomeModel->find($id);

            $data = [
                'id' => $row['id_home'],
                'foto' => $row['foto']
            ];

            $msg = [
                'sukses' => view('admin/home/upload', $data)
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
                $cekdata = $this->HomeModel->find($id);
                $fotolama = $cekdata['foto'];

                if ($fotolama != 'default.png') {
                    unlink('uploads/home' . '/' . $fotolama);
                    unlink('uploads/home/thumb' . '/thumb_' . $fotolama);
                }

                $filegambar = $request->getFile('foto');

                $updatedata = [
                    'foto' => $filegambar->getName()
                ];

                $this->HomeModel->update($id, $updatedata);

                \Config\Services::image()
                    ->withFile($filegambar)
                    ->fit(800, 533, 'center')
                    ->save('uploads/home/thumb/' . 'thumb_' .  $filegambar->getName());
                $filegambar->move('uploads/home');
                $msg = [
                    'sukses' => 'Gambar berhasil diupload!'
                ];
            }
            echo json_encode($msg);
        }
    }
}
