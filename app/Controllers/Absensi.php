<?php

namespace App\Controllers;

class Absensi extends BaseController
{
    public function index()
    {
        $id = session()->get('user_id');
        $data = [
            'title' => "SCM - Absensi",
            'head' => "Absensi",
            'profile' => $this->UserModel->join('pegawai', 'pegawai.id_pegawai = user.id_pegawai')->where('id_user', $id)->get()->getRowArray()
        ];

        return view('user/absensi/index', $data);
    }

    public function submit()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            date_default_timezone_set('Asia/Jakarta');
            if ($request->getVar('keterangan') == "Masuk" or $request->getVar('keterangan') == "Datang Terlambat") {
                $query = "SELECT * FROM absensi WHERE (keterangan = 'Masuk' OR keterangan = 'Datang Terlambat') AND created_at LIKE '%" . date('Y-m-d') . "%' AND nip = '" . $request->getVar('nip') . "'";
                $cek = $this->db->query($query)->getNumRows();
            } else {
                $query = "SELECT * FROM absensi WHERE (keterangan = 'Pulang' OR keterangan = 'Lembur') AND created_at LIKE '%" . date('Y-m-d') . "%' AND nip = '" . $request->getVar('nip') . "'";
                $cek = $this->db->query($query)->getNumRows();
            }
            if ($cek < 1) {
                $validation = \Config\Services::validation();
                $valid = $this->validate([
                    'longitude' => [
                        'label' => 'GPS',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} Tidak Aktif !',
                        ]
                    ],
                    'imagecam' => [
                        'label' => 'Foto',
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Belum mengambil {field} kamera',
                        ]
                    ],
                    'deskripsi' => [
                        'label' => 'Catatan Harian',
                        'rules' => 'min_length[10]',
                        'errors' => [
                            'min_length' => '{field} minimal 50 karakter'
                        ]
                    ],
                    'cust' => [
                        'label' => 'cust',
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Belum Mengisi nama Customer'
                        ]
                    ],
                    'prod' => [
                        'label' => 'prod',
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Belum Mengisi nama Produk'
                        ]
                    ],
                ]);
                if (!$valid) {
                    $msg = [
                        'error' => [
                            'gps'  => $validation->getError('longitude'),
                            'foto'     => $validation->getError('imagecam'),
                            'deskripsi' => $validation->getError('deskripsi'),
                        ]
                    ];
                } else {
                    $simpandata = [
                        'nama'          => $request->getVar('nama'),
                        'nip'           => $request->getVar('nip'),
                        'prod'           => $request->getVar('prod'),
                        'latitude'      => $request->getVar('latitude'),
                        'longitude'     => $request->getVar('longitude'),
                        'cust'          => $request->getVar('cust'),
                        'catatan'       => $request->getVar('deskripsi'),
                        'foto'          => date('Y-m-d') . '_' . date('H-i-s') . '_' . $request->getVar('nip') . '.jpg',
                        'device'        => $request->getVar('device') . ', ' . $request->getVar('browser'),
                        'created_at'    => date('Y-m-d H:i:s'),
                        'keterangan'    => $request->getVar('keterangan'),
                    ];

                    $this->AbsensiModel->insert($simpandata);

                    $foto = $request->getPost('imagecam');
                    $foto = str_replace('data:image/jpeg;base64,', '', $foto);

                    $foto = base64_decode($foto, true);
                    // echo $image;
                    $filename = date('Y-m-d') . '_' . date('H-i-s') . '_' . $request->getVar('nip') . '.jpg';
                    file_put_contents(FCPATH . '/uploads/absensi/' . $filename, $foto);

                    $msg = [
                        'sukses'    => 'Absensi Berhasil',
                        'link'      => base_url('Laporan')
                    ];
                }
            } else {
                if ($request->getVar('keterangan') == "Masuk" or $request->getVar('keterangan') == "Datang Terlambat") {
                    $msg = [
                        'error' => [
                            'absen' => 'Anda telah absen masuk hari ini'
                        ]
                    ];
                } else {
                    $msg = [
                        'error' => [
                            'absen' => 'Anda telah absen pulang hari ini'
                        ]
                    ];
                }
            }

            echo json_encode($msg);
        } else {
            exit(view('error'));
        }
    }

    public function laporan()
    {
        $data = [
            'title' => "SCM - Laporan Harian",
            'head' => "Absensi",
        ];
        return view('user/absensi/laporan/index', $data);
    }

    public function fetch_data()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {

            $tanggal = $request->getVar('tanggal');
            $data = [
                'absensi' => $this->AbsensiModel->like('created_at', $tanggal)->get()->getResultArray(),
            ];

            $query = "SELECT * FROM absensi WHERE (keterangan = 'Masuk' OR keterangan = 'Datang Terlambat') AND created_at LIKE '%" . $tanggal . "%'";
            $jumlahmasuk = $this->db->query($query)->getNumRows();
            $query = "SELECT * FROM absensi WHERE (keterangan = 'Pulang' OR keterangan = 'Lembur') AND created_at LIKE '%" . $tanggal . "%'";
            $jumlahpulang = $this->db->query($query)->getNumRows();

            $msg = [
                'data'          => view('user/absensi/laporan/read', $data),
                'jumlahpegawai' => $this->PegawaiModel->where('created_at <=', $tanggal)->countAllResults(),
                'jumlahmasuk'   => $jumlahmasuk,
                'jumlahpulang'  => $jumlahpulang
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

            $cekdata = $this->AbsensiModel->find($id);
            $fotolama = $cekdata['foto'];
            unlink('uploads/absensi' . '/' . $fotolama);

            $this->AbsensiModel->delete($id);
            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];

            echo json_encode($msg);
        }
    }
}
