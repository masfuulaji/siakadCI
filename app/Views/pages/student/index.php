<?= $this->extend('layout\layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="mt-4">Tables</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
            <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
            .
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>nama</th>

                        </tr>
                    </thead>
                    <?php foreach ($student as $students) : ?>
                        <tbody>

                            <td><?= $students['nama'] ?></td>
                        </tbody>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    let method
    let url
    let type
    $(document).ready(function() {
        let table = $('#table').DataTable({
            initComplete: function() {
                var api = this.api()
                $("#table_filter input")
                    .off(".DT")
                    .on("keyup.DT", function(e) {
                        api.search(this.value).draw()
                    })
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {
                cache: false,
                url: 'dataStudent',
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
            ],
            // order: [[1, "asc"]],
            rowId: function(a) {
                return a
            },
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo()
                var page = info.iPage
                var length = info.iLength
                var index = page * length + (iDisplayIndex + 1)
                $("td:eq(0)", row).html(index)
            }
        })
    })
</script>
<?= $this->endSection() ?>