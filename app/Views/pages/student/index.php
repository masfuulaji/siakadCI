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
    <div class="card mb-4" id="table_data">
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
                <form action="<?= base_url('student/insert') ?>" id="form" data-toggle="validator" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="nama" class="form-control" id="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gnder" class="form-control">
                                <option value="0">laki- laki</option>
                                <option value="1">perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="telp">no telp</label>
                            <input type="number" name="telp" class="form-control" id="tep" placeholder="telp">
                        </div>
                        <div class="form-group">
                            <label for="alamat">alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alaat" placeholder="alamat">
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
<?= $this->include('pages/student/edit'); ?>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    $(document).ready(function() {
        let table = $('#dataTable').DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: `<?= base_url('student/data') ?>`,
                type: "POST",
                error: function(error) {
                    console.log(error)
                },
            },
            columns: [{
                    data: "id",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "nama"
                },
                {
                    data: "gender",
                    render: (data) => {
                        if (data == 1) {
                            return '<span class="label label-success">Laki-laki</span>'
                        }
                        return '<span class="label label-danger">Perempuan</span>'
                    }
                },
                {
                    data: "telp"
                },
                {
                    data: "alamat"
                }
            ]
        });
    })
    $("#btn-tambah").on('click', function() {
        $("#modal-title").html('Tambah siswa')
        method = 'insert'
        $("#method").val('POST')
        $('#modalData form')[0].reset()
        $("#btn-submit").html('Simpan')
        $("#modalData").modal('show')
    })

    function onEdit(el) {
        $.ajax({
            url: `<?= base_url('student/edit') ?>/${1}`,
            type: 'get',
            dataType: 'json',
            success: function(ret) {
                var data = ret.data;
                console.log(data);
                $('#id-student').val(id);
                $('#nama').val(data.nama);
                $('#telp').val(data.telp);
                $('#alamat').val(data.alamat);
                $("#table_data").hide();
                $("#form-edit").show();

            }
        })
    }

    function update() {
        $.ajax({
            url: '<?= base_url('updateUser'); ?>',
            type: 'post',
            data: new FormData($('#form-edit')[0]),
            processData: false,
            contentType: false,
            success: function(ret) {
                // console.log(ret);
                $("#table-pegawai").show();
                $("#form-edit").hide();
            }
        })
    }
</script>
<?= $this->endSection() ?>