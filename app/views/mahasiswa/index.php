<div class="container mt-4">

    <h3>Daftar Mahasiswa</h3>
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::getFlasher(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary btnTambah mb-3" data-toggle="modal" data-target="#formModal">
                Tambah data mahasiswa
            </button>
            <form action="<?= BASEURL ?>mahasiswa/search" method="POST">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" placeholder="Search...." name="keyword" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <ul class="list-group">
                <?php foreach ($data["mahasiswa"] as $mhs) : ?>
                    <li class="list-group-item">
                        <?= $mhs['nama']; ?>

                        <a href="<?= BASEURL ?>mahasiswa/delete/<?= $mhs['id'] ?> " class="badge badge-danger float-right ml-1" onclick="return confirm('Yakin?')">Delete</a>
                        <a href="" class="badge badge-success float-right btnUbah ml-1" data-id="<?= $mhs['id'] ?>" data-toggle="modal" data-target="#formModal">Ubah</a>
                        <a href="<?= BASEURL ?>mahasiswa/detail/<?= $mhs['id'] ?> " class="badge badge-primary float-right">Detail</a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>


<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="fromInsert" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formHeader"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>mahasiswa/insert" method="POST">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="nrp">Nrp</label>
                        <input type="number" class="form-control" id="nrp" name="nrp">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Example multiple select</label>
                        <select class="custom-select" id="jurusan" name="jurusan">
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Ekonomi">Ekonomi</option>
                            <option value="Manajemen">Manajemen</option>
                            <option value="Akutansi">Akutansi</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"></button>
                </form>
            </div>
        </div>
    </div>
</div>