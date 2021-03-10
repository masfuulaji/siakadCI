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
    <div class="card mb-4" id="table-pegawai">
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
                            <th>jabatan</th>
                            <th>jenis kelamin</th>
                            <th>No Handpohone</th>
                            <th>Alamat</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <?php $no = 1; ?>
                    <?php foreach ($pegawai as $data) : ?>
                        <tbody>
                            <td><?= $no++ ?></td>
                            <td><?= $data['pegawai_nama'] ?></td>
                            <td><?= $data['pegawai_jabatan'] ?></td>
                            <td><?= $data['pegawai_jk'] ?></td>
                            <td><?= $data['pegawai_hp'] ?></td>
                            <td><?= $data['pegawai_alamat'] ?></td>
                            <td>
                                <button data-id="<?= $data['pegawai_id']; ?>" class="btn btn-success btn-sm" name="edit" onclick="onEdit('<?= $data['pegawai_id']; ?>')">Edit</button>
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
<?= $this->include('test/profile'); ?>
<?= $this->endSection() ?>



<?= $this->section('js') ?>
<script>
    var form_edit = document.getElementById("form-edit");
    var table_pegawai = document.getElementById("table-pegawai");


    function onEdit(el) {
        $.ajax({
            url: 'profile/' + el,
            type: 'get',
            dataType: 'json',
            success: function(ret) {
                var data = ret.data.profile;

                $('#edit-id').val(data.pegawai_id);
                $('#edit-nama').val(data.pegawai_nama);
                $('#edit-jabatan').val(data.pegawai_jabatan);
                $('#edit-telp').val(data.pegawai_hp);
                $('#edit-alamat').val(data.pegawai_alamat);
                table_pegawai.style.display = "none";
                form_edit.style.display = "block";
            }
        })
    }

    function update(){
        $.ajax({
            url: '<?= base_url('updateProfile'); ?>',
            type: 'post',
            data  : new FormData($('#form-edit')[0]),
            processData: false,
            contentType: false,
            success: function(ret) {
                table_pegawai.style.display = "block";
            }
        })
    }
</script>
<?= $this->endSection() ?>