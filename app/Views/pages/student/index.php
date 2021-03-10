<?= $this->extend('layout\layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="mt-4">Tables</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <button type="button" class="btn btn-primary mb-3" id="btn-tambah">
        Add User
    </button>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Data Student
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>nama</th>
                            <th>gender</th>
                            <th>no telp</th>
                            <th>alamat</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <?php $no = 1; ?>
                    <?php foreach ($student as $students) : ?>
                        <tbody>
                            <td><?= $no++ ?></td>
                            <td><?= $students['nama'] ?></td>
                            <td><?php if ($students['gender'] == 0) {
                                    echo "laki-laki";
                                } else {
                                    echo "perempuan";
                                } ?></td>
                            <td><?= $students['telp'] ?></td>
                            <td><?= $students['alamat'] ?></td>
                            <td>
                                <a class="btn btn-success btn-sm" name="edit">edit</a>
                                <a class="btn btn-danger btn-sm" name="del">delete</a>
                            </td>
                        </tbody>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalData" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Tambah Data</h4>
                </div>
                <form action="/insert" id="form" data-toggle="validator" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="nama" class="form-control" id="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="0">laki- laki</option>
                                <option value="1">perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="telp">no telp</label>
                            <input type="number" name="telp" class="form-control" id="telp" placeholder="telp">
                        </div>
                        <div class="form-group">
                            <label for="alamat">alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="alamat">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="save">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    $("#btn-tambah").on('click', function() {
        $("#modal-title").html('Tambah siswa')
        method = 'insert'
        $("#method").val('POST')
        $('#modalData form')[0].reset()
        $("#btn-submit").html('Simpan')
        $("#modalData").modal('show')
    })
</script>
<?= $this->endSection() ?>