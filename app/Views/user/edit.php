<div class="card">
  <form id="form-edit" data-toggle="validator" method="post" style="display: none;">
    <input type="hidden" name="edit-id-user" id="edit-id-user">
    <input type="hidden" name="edit-id-pegawai" id="edit-id-pegawai">
    <div class="modal-body">
      <div class="form-group">
        <label for="edit-nama">Nama</label>
        <input type="text" name="edit-nama" class="form-control" id="edit-nama" placeholder="Name" readonly>
      </div>
      <div class="form-group">
        <label for="edit-jabatan">Jabatan</label>
        <input type="text" name="edit-jabatan" class="form-control" id="edit-jabatan" placeholder="jabatan" readonly>
      </div>

      <div class="form-group">
        <label for="edit-telp">no telp</label>
        <input type="text" name="edit-telp" class="form-control" id="edit-telp" placeholder="telp">
      </div>
      <div class="form-group">
        <label for="edit-jk">Status</label>
        <select name="edit-jk" id="edit-jk" class="form-control">
          <option value="L">Laki-laki</option>
          <option value="P">perempuan</option>
        </select>
      </div>
      <div class="form-group">
        <label for="edit-alamat">alamat</label>
        <input type="text" name="edit-alamat" class="form-control" id="edit-alamat" placeholder="alamat">
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" onclick="close()">Close</button>
      <button class="btn btn-primary" type="button" onclick="update()">Simpan</button>
    </div>
  </form>
</div>