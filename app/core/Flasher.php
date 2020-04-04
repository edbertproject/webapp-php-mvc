<?php

class Flasher
{

    public static function showFlasher($pesan, $aksi, $tipe)
    {

        $_SESSION['flasher'] = [
            "pesan" => $pesan,
            "aksi"  => $aksi,
            "tipe"  => $tipe,
        ];
    }

    public static function getFlasher()
    {

        if (isset($_SESSION['flasher'])) {


            echo '
                <div class="alert alert-' . $_SESSION['flasher']['tipe'] . ' alert-dismissible fade show" role="alert">
                    Data mahasiswa <strong>' . $_SESSION['flasher']['pesan'] . '</strong> ' . $_SESSION['flasher']['aksi'] . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
            unset($_SESSION['flasher']);
        }
    }
}
