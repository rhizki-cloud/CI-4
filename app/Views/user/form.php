<?php $isEdit = ($mode==='edit'); ?>
<div class="container-fluid">
  <h4><?= $isEdit ? 'Edit' : 'Tambah' ?> User</h4>

  <div class="card">
    <div class="card-body">
      <form method="post" action="<?= $isEdit ? base_url('user/update/'.$row['id']) : base_url('user/store') ?>">
        <?= csrf_field() ?>

        <div class="row">
          <div class="col-md-6">
            <label>Username</label>
            <input class="form-control" name="username" value="<?= $isEdit ? esc($row['username']) : '' ?>" <?= $isEdit ? 'readonly':'' ?> required>
          </div>
          <div class="col-md-6">
            <label>Nama Lengkap</label>
            <input class="form-control" name="nama" value="<?= $isEdit ? esc($row['nama']) : '' ?>" required>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-md-6">
            <label>Password <?= $isEdit ? '(Kosongkan jika tidak diganti)' : '' ?></label>
            <input type="password" class="form-control" name="password" <?= $isEdit ? '' : 'required' ?>>
          </div>
          <div class="col-md-6">
            <label>Role</label>
            <select class="form-control" name="role">
              <?php $role = $isEdit ? $row['role'] : ''; ?>
              <option <?= $role=='Admin'?'selected':'' ?>>Admin</option>
              <option <?= $role=='KepalaLab'?'selected':'' ?>>KepalaLab</option>
              <option <?= $role=='Petugas'?'selected':'' ?>>Petugas</option>
            </select>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-md-4">
            <label>Status</label>
            <select class="form-control" name="status">
              <?php $st = $isEdit ? $row['status'] : 'Aktif'; ?>
              <option <?= $st=='Aktif'?'selected':'' ?>>Aktif</option>
              <option <?= $st=='Nonaktif'?'selected':'' ?>>Nonaktif</option>
            </select>
          </div>
          <div class="col-md-4">
            <label>Email</label>
            <input class="form-control" name="email" value="<?= $isEdit ? esc($row['email']) : '' ?>">
          </div>
          <div class="col-md-4">
            <label>Telepon</label>
            <input class="form-control" name="telepon" value="<?= $isEdit ? esc($row['telepon']) : '' ?>">
          </div>
        </div>

        <div class="mt-4">
          <button class="btn btn-success">Simpan</button>
          <a class="btn btn-secondary" href="<?= base_url('user') ?>">Batal</a>
        </div>
      </form>
    </div>
  </div>
</div>
