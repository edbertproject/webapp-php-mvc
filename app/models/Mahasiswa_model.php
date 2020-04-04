<?php

class Mahasiswa_model
{
    private $table = "mahasiswa",
        $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswa($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind("id", $id);
        return $this->db->single();
    }

    public function insertDataMahasiswa($data)
    {
        $this->db->query("INSERT INTO " . $this->table . " VALUES ('', :nama, :nrp, :email, :jurusan)");
        $this->db->bind("nama", $data['nama']);
        $this->db->bind("nrp", $data['nrp']);
        $this->db->bind("email", $data['email']);
        $this->db->bind("jurusan", $data['jurusan']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {
        $this->db->query("DELETE FROM " . $this->table . " WHERE id=:id");
        $this->db->bind("id", $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataMahasiswa($data)
    {
        $this->db->query(
            "UPDATE " . $this->table .
                " SET nama=:nama nrp=:nrp email=:email jurusan=:jurusan WHERE id=:id"
        );
        $this->db->bind("nama", $data['nama']);
        $this->db->bind("nrp", $data['nrp']);
        $this->db->bind("email", $data['email']);
        $this->db->bind("jurusan", $data['jurusan']);
        $this->db->bind("id", $data['id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function searchMahasiswa($data)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nama LIKE :nama');
        $this->db->bind("nama", "%" . $data['keyword'] . "%");
        return $this->db->resultSet();
    }
}
