<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use CodeIgniter\HTTP\Request;

class MapsController extends BaseController
{
    protected $mahasiswaModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }

    public function index()
    {

        return view('maps');
    }
    public function detail($mhs_nrp)
    {
        $data = [
            'mahasiswa' => $this->mahasiswaModel->getMahasiswa($mhs_nrp)
        ];
        if (empty($data['mahasiswa'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
        return view('view_detailmahasiswa', $data);
    }

    public function tambah()
    {

        // session();
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('view_tambahmahasiswa', $data);
    }

    public function simpan()
    {
        // validasi input
        if (!$this->validate([
            'mhs_nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama mahasiswa harus diisi'
                ]
            ],
            'mhs_urutan' => [
                'rules' => 'required|is_unique[mahasiswa.mhs_urutan]',
                'errors' => [
                    'required' => 'Urutan mahasiswa harus diisi',
                    'is_unique' => 'Urutan tersebut sudah diisi'
                ]
            ],
            'mhs_asalsekolah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Asal sekolah mahasiswa harus diisi'
                ]
            ],
            'mhs_alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat mahasiswa harus diisi'
                ]
            ]

        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            // session()->setFlashdata('warning', 'Tidak berhasil memassukan data mahasiswa baru.');
            return redirect()->to('/mahasiswa/tambah')->withInput()->with('validation', $validation);
        }
        // $inputdata = $this->request->getVar();
        $this->mahasiswaModel->save([
            'mhs_nama' => $this->request->getVar('mhs_nama'),
            'mhs_urutan' => $this->request->getVar('mhs_urutan'),
            'mhs_asalsekolah' => $this->request->getVar('mhs_asalsekolah'),
            'mhs_alamat' => $this->request->getVar('mhs_alamat')
        ]);
        session()->setFlashdata('pesantambah', 'Mahasiswa berhasil ditambahkan.');
        return redirect()->to('/mahasiswa');
    }

    public function delete($mhs_nrp)
    {
        $this->mahasiswaModel->delete($mhs_nrp);
        session()->setFlashdata('pesanhapus', 'Mahasiswa berhasil dihapus');
        return redirect()->to('/mahasiswa');
    }

    public function editmahasiswa($mhs_nrp)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'mahasiswa' => $this->mahasiswaModel->getMahasiswa($mhs_nrp)
        ];

        return view('view_editmahasiswa', $data);
    }

    public function update($mhs_nrp)
    {
        //cek apakah urutan diganti atao tidak
        $mahasiswalama = $this->mahasiswaModel->getMahasiswa($this->request->getVar('mhs_urutan'));
        if ($mahasiswalama['mhs_urutan'] == $this->request->getVar('mhs_urutan')) {
            $rule_urutan = 'required';
        } else {
            $rule_urutan = 'required|is_unique[mahasiswa.mhs_urutan]';
        }


        // dd($this->mahasiswaModel->getMahasiswa($this->request->getVar(2)));
        // dd($this->mahasiswaModel->getMahasiswa($mhs_nrp));
        // dd($this->request->getVar('mhs_urutan'));
        // $query = $this->mahasiswaModel->query('SELECT mhs_urutan from mahasiswa where mhs_nrp = [$mhs_nrp]');
        // $row = $query->getRow();
        // echo $row;
        // dd($mahasiswalama['mhs_urutan']);


        // validasi input
        if (!$this->validate([
            'mhs_nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama mahasiswa harus diisi'
                ]
            ],
            'mhs_urutan' => [
                'rules' => $rule_urutan,
                'errors' => [
                    'required' => 'Urutan mahasiswa harus diisi',
                    'is_unique' => 'Urutan tersebut sudah diisi'
                ]
            ],
            'mhs_asalsekolah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Asal sekolah mahasiswa harus diisi'
                ]
            ],
            'mhs_alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat mahasiswa harus diisi'
                ]
            ]

        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            // session()->setFlashdata('warning', 'Tidak berhasil memassukan data mahasiswa baru.');
            return redirect()->to('/mahasiswa/editmahasiswa/' . $mhs_nrp)->withInput()->with('validation', $validation);
        }

        $this->mahasiswaModel->save([
            'mhs_nrp' => $mhs_nrp,
            'mhs_nama' => $this->request->getVar('mhs_nama'),
            'mhs_urutan' => $this->request->getVar('mhs_urutan'),
            'mhs_asalsekolah' => $this->request->getVar('mhs_asalsekolah'),
            'mhs_alamat' => $this->request->getVar('mhs_alamat')
        ]);
        session()->setFlashdata('pesanubah', 'Mahasiswa berhasil diubah');
        return redirect()->to('/mahasiswa');
    }
}
