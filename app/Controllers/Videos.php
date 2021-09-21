<?php

namespace App\Controllers;

class Videos extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "SCM",
            'head' => "Video"
        ];

        return view('admin/videos/index', $data);
    }

    public function fetch_data()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $data = [
                'videos' => $this->VideosModel->orderBy('tanggal', 'ASC')->get()->getResultArray()
            ];
            $msg = [
                'data' => view('admin/videos/read', $data)
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
                'jumlah' => $this->VideosModel->selectCount('id_vid')->get()->getRowArray()
            ];
            $msg = [
                'data' => $data['jumlah']['id_vid']
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

            $jumlah = $this->VideosModel->selectCount('id_vid')->get()->getRowArray();
            $jumlah = $jumlah['id_vid'] + 1;
            $data['jumlah'] = $jumlah;

            $msg = [
                'data' => view('admin/videos/create', $data)
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
                        'required' => '{field} tidak boleh kosong'

                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'judul'  => $validation->getError('judul')
                    ]
                ];
            } else {

                $url = $request->getVar('link');
                $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
                $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';

                if (preg_match($longUrlRegex, $url, $matches)) {
                    $youtube_id = $matches[count($matches) - 1];
                }

                if (preg_match($shortUrlRegex, $url, $matches)) {
                    $youtube_id = $matches[count($matches) - 1];
                }
                $fullEmbedUrl = 'https://www.youtube.com/embed/' . $youtube_id;

                $simpandata = [

                    'judul'  => $request->getVar('judul'),
                    'link'         => $fullEmbedUrl,
                    'tanggal'         => $request->getVar('tanggal')
                ];

                $this->VideosModel->insert($simpandata);
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

            $jumlah = $this->VideosModel->selectCount('id_vid')->get()->getRowArray();
            $jumlah = $jumlah['id_vid'];

            $id_vid = $request->getVar('id');
            $row = $this->VideosModel->find($id_vid);

            $data = [
                'id' => $row['id_vid'],
                'judul' => $row['judul'],
                'link' => $row['link'],
                'tanggal' => $row['tanggal'],
                'jumlah' => $jumlah
            ];

            $msg = [
                'sukses' => view('admin/videos/update', $data)
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

            $url = $request->getVar('link');
            $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
            $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';

            if (preg_match($longUrlRegex, $url, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }

            if (preg_match($shortUrlRegex, $url, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }
            $fullEmbedUrl = 'https://www.youtube.com/embed/' . $youtube_id;
            $simpandata = [
                'judul'  => $request->getVar('judul'),
                'link'         => $fullEmbedUrl,
                'tanggal'         => $request->getVar('tanggal')
            ];

            $id_vid = $request->getVar('id');

            $this->VideosModel->update($id_vid, $simpandata);
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

            $id_vid = $request->getVar('id');

            $this->VideosModel->delete($id_vid);
            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];

            echo json_encode($msg);
        }
    }
}
