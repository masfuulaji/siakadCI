<div class="card">
    <form id="form-edit" data-toggle="validator" method="post" style="display: none;">
        <input type="hidden" name="edit-id-user" id="id-student">
        <div class="modal-body">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Name" readonly>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="L">Laki-laki</option>
                    <option value="P">perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="telp">no telp</label>
                <input type="text" name="telp" class="form-control" id="telp" placeholder="telp">
            </div>
            <div class="form-group">
                <label for="alamat">alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="alamat">
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" onclick="close()">Close</button>
            <button class="btn btn-primary" type="button" onclick="update()">Simpan</button>
        </div>
    </form>
</div>