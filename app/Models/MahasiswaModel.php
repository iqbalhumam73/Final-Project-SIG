<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'mhs_nrp';
    protected $useTimestamps = true;
    protected $allowedFields = ['mhs_nama', 'mhs_urutan', 'mhs_asalsekolah', 'mhs_alamat'];

    public function getMahasiswa($mhs_nrp = false)
    {
        if ($mhs_nrp == false) {
            return $this->findAll();
        }
        return $this->where(['mhs_nrp' => $mhs_nrp])->first();
        // return $mahasiswa;
    }
}
