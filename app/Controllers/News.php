<?php

namespace App\Controllers;

class News extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "SCM - News",
            'head' => "News"
        ];

        return view('admin/news/index', $data);
    }


    public function fetch_data()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $data = [
                'news' => $this->NewsModel->orderBy('tanggal', 'ASC')->get()->getResultArray()
            ];
            $msg = [
                'data' => view('admin/news/read', $data)
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
                'jumlah' => $this->NewsModel->selectCount('id_news')->get()->getRowArray()
            ];
            $msg = [
                'data' => $data['jumlah']['id_news']
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

            $jumlah = $this->NewsModel->selectCount('id_news')->get()->getRowArray();
            $jumlah = $jumlah['id_news'] + 1;
            $data['jumlah'] = $jumlah;

            $msg = [
                'data' => view('admin/news/create', $data)
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
                'judul' => [
                    'label' => 'judul',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',

                    ]
                ],
                'desk' => [
                    'label' => 'desk',
                    'rules' => 'required',
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
                'link' => [
                    'label' => 'link',
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
                        'judul'     => $validation->getError('judul'),
                        'desk'    => $validation->getError('desk'),
                        'tanggal'  => $validation->getError('tanggal'),
                        'link'     => $validation->getError('link'),
                        'foto'    => $validation->getError('foto'),
                    ]
                ];
            } else {
                $simpandata = [
                    'judul'      => $request->getVar('judul'),
                    'desk'     => $request->getVar('desk'),
                    'tanggal'   => $request->getVar('tanggal'),
                    'link'      => $request->getVar('link'),
                    'foto'     => "default.png",
                ];

                $this->NewsModel->insert($simpandata);
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


            $id_news = $request->getVar('id');
            $row = $this->NewsModel->find($id_news);

            $data = [
                'id' => $row['id_news'],
                'judul' => $row['judul'],
                'desk' => $row['desk'],
                'link' => $row['link'],
                'tanggal' => $row['tanggal'],


            ];

            $msg = [
                'sukses' => view('admin/news/update', $data)
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
            $id_news = $request->getVar('id');



            $simpandata = [
                'judul'          => $request->getVar('judul'),
                'desk'         => $request->getVar('desk'),
                'link'          => $request->getVar('link'),
                'tanggal'       => $request->getVar('tanggal'),


            ];

            $id_news = $request->getVar('id');

            $this->NewsModel->update($id_news, $simpandata);

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

            $id_news = $request->getVar('id');

            $cekdata = $this->NewsModel->find($id_news);
            $fotolama = $cekdata['foto'];
            if ($fotolama != "default.png") {
                unlink('uploads/news' . '/' . $fotolama);
                unlink('uploads/news/thumb' . '/thumb_' . $fotolama);
            }


            $this->NewsModel->delete($id_news);
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
            $row = $this->NewsModel->find($id);

            $data = [
                'id' => $row['id_news'],
                'foto' => $row['foto']
            ];

            $msg = [
                'sukses' => view('admin/news/upload', $data)
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
                $cekdata = $this->NewsModel->find($id);
                $fotolama = $cekdata['foto'];

                if ($fotolama != 'default.png') {
                    unlink('uploads/news' . '/' . $fotolama);
                    unlink('uploads/news/thumb' . '/thumb_' . $fotolama);
                }

                $filegambar = $request->getFile('foto');

                $updatedata = [
                    'foto' => $filegambar->getName()
                ];

                $this->NewsModel->update($id, $updatedata);

                \Config\Services::image()
                    ->withFile($filegambar)
                    ->fit(800, 533, 'center')
                    ->save('uploads/news/thumb/' . 'thumb_' .  $filegambar->getName());
                $filegambar->move('uploads/news');
                $msg = [
                    'sukses' => 'Gambar berhasil diupload!'
                ];
            }
            echo json_encode($msg);
        }
    }
}
