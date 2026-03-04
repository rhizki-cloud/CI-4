<?php $isEdit = ($mode==='edit'); ?>
<div class="container-fluid">
  <h4><?= $isEdit ? 'Edit' : 'Tambah' ?> Kepala Lab</h4>

  <div class="card">
    <div class="card-body">
      <form method="post" action="<?= $isEdit ? base_url('kepala-lab/update/'.$row['id']) : base_url('kepala-lab/store') ?>">
        <?= csrf_field() ?>

        <div class="row">
          <div class="col-md-6">
            <label>Nama</label>
            <input class="form-control" name="nama" value="<?= $isEdit ? esc($row['nama']) : '' ?>" required>
          </div>
          <div class="col-md-6">
            <label>NIP</label>
            <input class="form-control" name="nip" value="<?= $isEdit ? esc($row['nip']) : '' ?>" required>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-md-6">
            <label>Jabatan</label>
            <input class="form-control" name="jabatan" value="<?= $isEdit ? esc($row['jabatan']) : '' ?>" required>
          </div>
          <div class="col-md-6">
            <label>Status</label>
            <select class="form-control" name="status">
              <option <?= $isEdit && $row['status']=='Aktif' ? 'selected':'' ?>>Aktif</option>
              <option <?= $isEdit && $row['status']=='Nonaktif' ? 'selected':'' ?>>Nonaktif</option>
            </select>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-md-6">
            <label>Email</label>
            <input class="form-control" name="email" value="<?= $isEdit ? esc($row['email']) : '' ?>">
          </div>
          <div class="col-md-6">
            <label>Telepon</label>
            <input class="form-control" name="telepon" value="<?= $isEdit ? esc($row['telepon']) : '' ?>">
          </div>
        </div>

        <div class="mt-4">
          <button class="btn btn-success">Simpan</button>
          <a class="btn btn-secondary" href="<?= base_url('kepala-lab') ?>">Batal</a>
        </div>
      </form>
    </div>
  </div>
</div>
