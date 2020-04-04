<?php

class Home extends Controller
{

    public function index()
    {
        $datas['judul'] = "Welcome";
        $datas['user'] = $this->model("User_model")->getUser();
        $this->view("templates/header", $datas);
        $this->view("home/index", $datas);
        $this->view("templates/footer");
    }
}
