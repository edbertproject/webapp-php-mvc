<?php

class About extends Controller
{

    public function index($nama = "default", $job = "default", $umur = 0)
    {
        $datas['judul'] = "About me";
        $datas['nama'] = $nama;
        $datas['job'] = $job;
        $datas['umur'] = $umur;

        $this->view("templates/header", $datas);
        $this->view("about/index", $datas);
        $this->view("templates/footer");
    }

    public function page()
    {
        $datas['judul'] = "My pages";
        $this->view("templates/header", $datas);
        $this->view("about/page");
        $this->view("templates/footer");
    }
}
