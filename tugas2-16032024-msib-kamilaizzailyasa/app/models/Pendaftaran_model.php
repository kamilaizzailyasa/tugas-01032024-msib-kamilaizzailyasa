<?php
class Pendaftaran_model{
    private $tabel='pendaftaran_nyanyi';
    private $db;
    public function __construct(){
        $this->db=new Database;
    }

    public function getAllpendaftaran(){
        $this->db->query('SELECT * FROM '. $this->tabel);
        return $this->db->resultSet();
    }
    public function getpendaftaranbyid($id){
        $keyword = $_POST['keyword'];
        $this->db->query("SELECT * FROM no WHERE nama LIKE :pendaftaran nyanyi");
        $this->db->bind('keyword',"%$keyword%");
        return $this->db->resultSet();
    }
    public function getMahasiswaById($id){
        $this->db->query('SELECT * FROM '. $this->tabel .' WHERE id=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }
    public function hapusDataMahasiswa($id){
        $this->db->query('DELETE FROM '. $this->tabel .' WHERE id=:id');
        $this->db->bind('id',$id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function tambahDataMahasiswa($data){
        $query="INSERT INTO data diri
                            VALUES 
                            ('',:id,:nama,:email,:lagu)";
        $this->db->query($query);
        $this->db->bind('id',$data['id']);
        $this->db->bind('nama',$data['nama']);
        $this->db->bind('email',$data['email']);
        $this->db->bind('lagu',$data['lagu']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function ubahDataMahasiswa($data){
        $query="UPDATE mahasiswa SET
                        id = :id,
                        nama = :nama,
                        email=:email,
                        lagu = lagu WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id',$data['id']);
        $this->db->bind('nama',$data['nama']);
        $this->db->bind('email',$data['email']);
        $this->db->bind('lagu',$data['lagu']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}