<div class="container-fluid">
  <h4>Profil</h4>

  <?php if(session()->getFlashdata('ok')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('ok') ?></div>
  <?php endif; ?>
  <?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <div class="card">
    <div class="card-body">
      <p><b>Nama:</b> <?= esc($row['nama']) ?></p>
      <p><b>Username:</b> <?= esc($row['username']) ?></p>
      <p><b>Role:</b> <?= esc($row['role']) ?></p>
      <p><b>Email:</b> <?= esc($row['email']) ?></p>
      <p><b>Telepon:</b> <?= esc($row['telepon']) ?></p>

      <a class="btn btn-primary" href="<?= base_url('profil/edit') ?>">Edit Profil</a>
      <a class="btn btn-warning text-white" href="<?= base_url('profil/password') ?>">Ganti Password</a>
    </div>
  </div>
</div>
