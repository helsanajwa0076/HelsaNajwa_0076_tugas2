<?php 
// Definisi Class Mahasiswa (kelas induk)
class Mahasiswa {
    protected $nama;
    protected $nim;
    protected $jurusan;
    protected $ipk;
    protected $semester;
    protected $jenjang;

    public function __construct($nama, $nim, $jurusan, $ipk, $semester, $jenjang) {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->jurusan = $jurusan;
        $this->ipk = $ipk;
        $this->semester = $semester;
        $this->jenjang = $jenjang;
    }

    public function tampilkanInfo() {
        echo "Nama: " . $this->nama . "<br>";
        echo "NIM: " . $this->nim . "<br>";
        echo "Jurusan: " . $this->jurusan . "<br>";
        echo "IPK: " . $this->ipk . "<br>";
        echo "Semester: " . $this->semester . "<br>";
        echo "Jenjang Pendidikan: " . $this->jenjang . "<br>";
    }

    public function cekKelulusan() {
        if ($this->ipk >= 2.75 && $this->cekSyaratKelulusan()) {
            echo $this->nama . " dinyatakan lulus.<br>";
        } else {
            echo $this->nama . " belum lulus.<br>";
        }
    }

    public function cekSyaratKelulusan() {
        return false;
    }

    public function hitungSks($sksPerSemester) {
        $totalSks = $sksPerSemester * $this->semester;
        echo $this->nama . " telah menempuh total " . $totalSks . " SKS.<br>";
    }
}

// Subclass MahasiswaD3
class MahasiswaD3 extends Mahasiswa {
    private $proyekAkhir; // Menyimpan status proyek akhir

    public function __construct($nama, $nim, $jurusan, $ipk, $semester, $proyekAkhir) {
        parent::__construct($nama, $nim, $jurusan, $ipk, $semester, "D3");
        $this->proyekAkhir = $proyekAkhir;
    }

    public function cekSyaratKelulusan() {
        return $this->semester >= 6;
    }

    public function menyelesaikanProyekAkhir() {
        echo $this->nama . " (Mahasiswa D3) sedang menyelesaikan Proyek Akhir.<br>";
    }

    public function statusProyekAkhir() {
        echo $this->nama . " memiliki status proyek akhir: " . ($this->proyekAkhir ? "Selesai" : "Belum Selesai") . ".<br>";
    }
}

// Subclass MahasiswaS1
class MahasiswaS1 extends Mahasiswa {
    private $skripsi; // Menyimpan status skripsi

    public function __construct($nama, $nim, $jurusan, $ipk, $semester, $skripsi) {
        parent::__construct($nama, $nim, $jurusan, $ipk, $semester, "S1");
        $this->skripsi = $skripsi;
    }

    public function cekSyaratKelulusan() {
        return $this->semester >= 8;
    }

    public function menyelesaikanSkripsi() {
        echo $this->nama . " (Mahasiswa S1) sedang menyelesaikan Skripsi.<br>";
    }

    public function statusSkripsi() {
        echo $this->nama . " memiliki status skripsi: " . ($this->skripsi ? "Selesai" : "Belum Selesai") . ".<br>";
    }
}

// Contoh Penggunaan
$mahasiswaD3 = new MahasiswaD3("Nur", "11522304", "Akuntansi", 3.5, 7, true);
$mahasiswaS1 = new MahasiswaS1("Rohman", "89487198", "Fisika", 2.6, 9, false);

// Menampilkan informasi mahasiswa D3
$mahasiswaD3->tampilkanInfo();
$mahasiswaD3->cekKelulusan();
$mahasiswaD3->hitungSks(20);
$mahasiswaD3->menyelesaikanProyekAkhir();
$mahasiswaD3->statusProyekAkhir();

echo "<br>";

// Menampilkan informasi mahasiswa S1
$mahasiswaS1->tampilkanInfo();
$mahasiswaS1->cekKelulusan();
$mahasiswaS1->hitungSks(24);
$mahasiswaS1->menyelesaikanSkripsi();
$mahasiswaS1->statusSkripsi();
 ?>