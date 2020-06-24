$(function () {

    $('.btnTambah').on("click", function () {

        $('.modal-body form')[0].reset();

        $('#formHeader').html("Tambah data mahasiswa");
        $('.modal-footer button[type=submit]').html("Tambah");
        $('.modal-body').attr('action', 'http://localhost/phpmvc/public/mahasiswa/insert');

    });

    function change() {

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
    }

    $('.btnUbah').on("click", change);

    $('.searchKeyword').on("input", function () {
        var keyword = $(this).val();
        // console.log(keyword);
        $.ajax({
            url: "http://localhost/phpmvc/public/mahasiswa/liveSearch",
            method: "post",
            data: { keyword: keyword },
            dataType: "json",
            success: function (datas) {
                var table = $('#mahasiswaWrap'), tmp = "";

                datas.forEach(data => {
                    tmp += `<li class="list-group-item">
                        `+ data.nama + `

                        <a href="http://localhost/phpmvc/public/mahasiswa/delete/`+ data.id + `" class="badge badge-danger float-right ml-1" onclick="return confirm('Yakin?')">Delete</a>
                        <a href="" class="badge badge-success float-right btnUbah ml-1" data-id=`+ data.id + ` data-toggle="modal" data-target="#formModal">Ubah</a>
                        <a href="http://localhost/phpmvc/public/mahasiswa/detail/`+ data.id + `" class="badge badge-primary float-right">Detail</a>
                    </li>
                    `
                });
                table.html(tmp);
            },
        })
        setTimeout(function () {
            $('.btnUbah').on("click", change);
        }, 100);
    });

});