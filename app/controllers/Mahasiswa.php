<?php

class Mahasiswa extends Controller
{

    public function index()
    {
        $datas['judul'] = "Daftar Mahasiswa";
        $datas['mahasiswa'] = $this->model("Mahasiswa_model")->getAllMahasiswa();
        $this->view("templates/header", $datas);
        $this->view("mahasiswa/index", $datas);
        $this->view("templates/footer");
    }

    public function detail($id)
    {
        $datas['judul'] = "Detail Mahasiswa";
        $datas['mahasiswa'] = $this->model("Mahasiswa_model")->getMahasiswa($id);
        $this->view("templates/header", $datas);
        $this->view("mahasiswa/detail", $datas);
        $this->view("templates/footer");
    }

    public function insert()
    {

        if ($this->model("Mahasiswa_model")->insertDataMahasiswa($_POST) > 0) {
            Flasher::showFlasher("Berhasil", "ditambahkan", "success");
        } else {
            Flasher::showFlasher("Gagal", "ditambahkan", "danger");
        }
        header("Location: " . BASEURL . "mahasiswa");
        exit;
    }

    public function delete($id)
    {
        if ($this->model("Mahasiswa_model")->hapusDataMahasiswa($id) > 0) {
            Flasher::showFlasher("Berhasil", "dihapus", "success");
        } else {
            Flasher::showFlasher("Gagal", "dihapus", "danger");
        }
        header("Location: " . BASEURL . "mahasiswa");
        exit;
    }

    public function getData()
    {
        echo json_encode($this->model("Mahasiswa_model")->getMahasiswa($_POST['id']));
    }

    public function update()
    {

        if ($this->model("Mahasiswa_model")->updateDataMahasiswa($_POST) > 0) {
            Flasher::showFlasher("Berhasil", "diupdate", "success");
        } else {
            Flasher::showFlasher("Gagal", "diupdate", "danger");
        }
        header("Location: " . BASEURL . "mahasiswa");
        exit;
    }

    // public function search()
    // {
    //     $datas['judul'] = "Daftar Mahasiswa";
    //     $datas['mahasiswa'] = $this->model("Mahasiswa_model")->searchMahasiswa($_POST);
    //     $this->view("templates/header", $datas);
    //     $this->view("mahasiswa/index", $datas);
    //     $this->view("templates/footer");
    // }

    public function liveSearch()
    {
        echo json_encode($this->model("Mahasiswa_model")->searchMahasiswa($_POST));
    }
}
