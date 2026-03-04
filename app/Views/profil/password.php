<div class="container-fluid">
  <h4>Ganti Password</h4>

  <?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <div class="card">
    <div class="card-body">
      <form method="post" action="<?= base_url('profil/password') ?>">
        <?= csrf_field() ?>

        <div class="row">
          <div class="col-md-6">
            <label>Password Lama</label>
            <input type="password" class="form-control" name="password_lama" required>
          </div>
          <div class="col-md-6">
            <label>Password Baru</label>
            <input type="password" class="form-control" name="password_baru" required>
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
