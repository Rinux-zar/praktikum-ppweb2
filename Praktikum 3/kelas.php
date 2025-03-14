<?php
class Mahasiswa {
    private $nama;
    private $nim;
    private $semester;

    public function setNama ($nama) {
        $this->nama = $nama;
    }
    public function setNim ($nim) {
        $this->nim = $nim;
    }
    public function setSemester ($semester) {
        $this->semester = $semester;
    }
    public function getNama(){
        return $this->nama;
    }
    public function getNim () {
        return $this->nim;
    }

    public function getSemester () {
        return $this->semester;
    }

}

$Budi = new Mahasiswa();
$Budi->setNama('budi santoso');
$Budi->setNim('0110217043');
$Budi->setSemester(3);

echo $Budi->getNama().'<br>';
echo $Budi->getNim().'<br>';
echo $Budi->getSemester().'<br>';
?>