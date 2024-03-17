<?php

class Pendaftaran extends Controller{
    public function index(){
        $data['title']='pendaftaran_nyanyi';
        $data['mhs']=$this->model('id_peserta')->getid();

        $this->view('template/header',$data);
        $this->view('pendaftaran/index',$data);
        $this->view('template/footer');
    }
    public function cari(){
        $data['title']='pendaftaran_nyanyi';
        $data['peserta']=$this->model('pendaftaran_Models')->cariDatapeserta();

        $this->view('template/header',$data);
        $this->view('pendaftaran_nyanyi/index',$data);
        $this->view('template/footer');
    }
    public function detail($id){
        $data['title']='pendaftaran_nyanyi';
        $data['pendaftaran']=$this->model('Pendaftaran_model')->getpesertaById($id);
        $this->view('template/header',$data);
        $this->view('pendaftaran/detail',$data);
        $this->view('template/footer');
    }
    public function tambah(){
       // var_dump($_POST);
        if($this->model('Pendaftaran_model')->tambahDataPendaftaran($_POST)>0){
            Flasher::setFlash('berhasil','ditambahkan','success');
            header('Location:'. BASEURL .'/pendaftaran_nyanyi');
            exit;
        }else{
            Flasher::setFlash('gagal','ditambahkan','danger');
            header('Location:'. BASEURL .'/pendaftaran_nyanyi');
            exit;
        }
    }
    public function ubah(){
       // var_dump($_POST);
        if($this->model('pendaftaran_model')->ubahDatapeserta($_POST)>0){
            Flasher::setFlash('berhasil','diubah','success');
            header('Location:'. BASEURL .'/pendaftaran_nyanyi');
            exit;
        }else{
            Flasher::setFlash('gagal','diubah','danger');
            header('Location:'. BASEURL .'/pendaftaran_nyanyi');
            exit;
        }
    }
    public function hapus($id){
        // var_dump($_POST);
         if($this->model('pendaftaran_model')->hapusDatapeserta($id)>0){
             Flasher::setFlash('berhasil','dihapus','success');
             header('Location:'. BASEURL .'/pendaftaran_nyanyi');
             exit;
         }else{
             Flasher::setFlash('gagal','dihapus','danger');
             header('Location:'. BASEURL .'/pendaftaran_nyanyi');
             exit;
         }
    }
    public function getUbah(){
         
         echo json_encode($this->model('pendaftaran_model')->getPendaftaranById($_POST['id']));

    }
}