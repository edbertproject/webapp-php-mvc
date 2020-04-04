$(function () {

    $('.btnTambah').on("click", function () {

        $('.modal-body form')[0].reset();

        $('#formHeader').html("Tambah data mahasiswa");
        $('.modal-footer button[type=submit]').html("Tambah");
        $('.modal-body').attr('action', 'http://localhost/phpmvc/public/mahasiswa/insert');

    });

    $('.btnUbah').on("click", function () {

        $('#formHeader').html("Ubah data mahasiswa");
        $('.modal-footer button[type=submit]').html("Ubah");
        $('.modal-body').attr('action', 'http://localhost/phpmvc/public/mahasiswa/update');

        const id = $(this).data("id");

        $.ajax({
            url: "http://localhost/phpmvc/public/mahasiswa/getData",
            method: "post",
            data: { id: id },
            dataType: "json",
            success: function (data) {
                $('#nama').val(data.nama);
                $('#nrp').val(data.nrp);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
            },
        })
    });

});