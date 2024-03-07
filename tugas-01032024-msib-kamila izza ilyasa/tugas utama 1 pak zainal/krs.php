<?php

class MataKuliah {
    protected $kode;
    protected $nama;
    protected $sks;

    public function __construct($kode, $nama, $sks) {
        $this->kode = $kode;
        $this->nama = $nama;
        $this->sks = $sks;
    }

    public function getSks() {
        return $this->sks;
    }

    public function getInfo() {
        return "<tr><td>{$this->kode}</td><td>{$this->nama}</td><td>{$this->sks}</td></tr>";
    }
}

class MataKuliahWajib extends MataKuliah {
    private $jenis;

    public function __construct($kode, $nama, $sks, $jenis) {
        parent::__construct($kode, $nama, $sks);
        $this->jenis = $jenis;
    }

    public function getInfo() {
        return "<tr><td>{$this->kode}</td><td>{$this->nama}</td><td>{$this->sks}</td><td>{$this->jenis}</td></tr>";
    }
}

class MataKuliahPilihan extends MataKuliah {
    private $jenis;

    public function __construct($kode, $nama, $sks, $jenis) {
        parent::__construct($kode, $nama, $sks);
        $this->jenis = $jenis;
    }

    public function getInfo() {
        return "<tr><td>{$this->kode}</td><td>{$this->nama}</td><td>{$this->sks}</td><td>{$this->jenis}</td></tr>";
    }
}

class Mahasiswa {
    private $nama;
    private $nim;
    private $mataKuliahWajib = [];
    private $mataKuliahPilihan = [];
    private $dosenWali;

    public function __construct($nama, $nim) {
        $this->nama = $nama;
        $this->nim = $nim;
    }

    public function setDosenWali($dosenWali) {
        $this->dosenWali = $dosenWali;
    }

    public function daftarMataKuliahWajib(MataKuliahWajib $mataKuliah) {
        $this->mataKuliahWajib[] = $mataKuliah;
    }

    public function daftarMataKuliahPilihan(MataKuliahPilihan $mataKuliah) {
        $this->mataKuliahPilihan[] = $mataKuliah;
    }

    public function getInfo() {
        $infoDosenWali = "<tr><td colspan='4'><strong>Dosen Wali: {$this->dosenWali}</strong></td></tr>";
        $infoMahasiswa = "<tr><td colspan='4'><strong>Nama: {$this->nama}, NIM: {$this->nim}</strong></td></tr>";
        $infoMataKuliahWajib = "<tr><th>No</th><th>Nama</th><th>SKS</th><th>Jenis</th></tr>";


        foreach ($this->mataKuliahWajib as $mataKuliah) {
            $infoMataKuliahWajib .= $mataKuliah->getInfo();
        }

        foreach ($this->mataKuliahPilihan as $mataKuliah) {
            $infoMataKuliahPilihan .= $mataKuliah->getInfo();
        }

        return "
        <h1 style='text-align: center;'>Kartu Rencana Studi</h1>
        <h2 style='text-align: center;'>Universitas Merdeka Pasuruan</h2>
        <h3 style='text-align: center;'>Tahun Akademik 2023/2024 - Genap</h3>
        <table border='1' style='margin: 0 auto;'>$infoDosenWali $infoMahasiswa $infoMataKuliahWajib $infoMataKuliahPilihan</table>
        <div style='text-align: center; margin-top: 50px;'><button>Serahkan</button></div>
        ";
    }
}

// Instansiasi dan pendaftaran mata kuliah seperti sebelumnya
$mataKuliahWajib1 = new MataKuliahWajib('1', 'Magang', 3, 'Pilihan');
$mataKuliahWajib2 = new MataKuliahWajib('2', 'KKN-T', 3, 'Pilihan');
$mataKuliahWajib3 = new MataKuliahWajib('3', 'Sistem terdistribusi', 2, 'Wajib');
$mataKuliahWajib4 = new MataKuliahWajib('4', 'Keamanan Informasi', 3, 'Wajib');
$mataKuliahPilihan1 = new MataKuliahPilihan('5', 'Manajemen Perangkat Lunak', 2, 'Wajib');
$mataKuliahPilihan2 = new MataKuliahPilihan('6', 'Sistem Rekomendasi', 2, 'Wajib');

// Instansiasi mahasiswa
$mahasiswa = new Mahasiswa('Kamila Izza Ilyasa', '2155201001048');
$mahasiswa->setDosenWali('Mohammad Zoqi Sarwani,S.Pd.,M.Kom');

// Pendaftaran mata kuliah untuk mahasiswa
$mahasiswa->daftarMataKuliahWajib($mataKuliahWajib1);
$mahasiswa->daftarMataKuliahWajib($mataKuliahWajib2);
$mahasiswa->daftarMataKuliahWajib($mataKuliahWajib3);
$mahasiswa->daftarMataKuliahWajib($mataKuliahWajib4);
$mahasiswa->daftarMataKuliahPilihan($mataKuliahPilihan1);
$mahasiswa->daftarMataKuliahPilihan($mataKuliahPilihan2);

// Menampilkan informasi mahasiswa
echo $mahasiswa->getInfo();

?>