<div class="container-fluid">
  <h4>Edit Profil</h4>

  <div class="card">
    <div class="card-body">
      <form method="post" action="<?= base_url('profil/update') ?>">
        <?= csrf_field() ?>

        <div class="row">
          <div class="col-md-6">
            <label>Nama</label>
            <input class="form-control" name="nama" value="<?= esc($row['nama']) ?>" required>
          </div>
          <div class="col-md-6">
            <label>Email</label>
            <input class="form-control" name="email" value="<?= esc($row['email']) ?>">
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-md-6">
            <label>Telepon</label>
            <input class="form-control" name="telepon" value="<?= esc($row['telepon']) ?>">
          </div>
        </div>

        <div class="mt-4">
          <button class="btn btn-success">Simpan</button>
          <a class="btn btn-secondary" href="<?= base_url('profil') ?>">Batal</a>
        </div>
      </form>
    </div>
  </div>
</div>
