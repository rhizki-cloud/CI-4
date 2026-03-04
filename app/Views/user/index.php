<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">User</h4>
    <a class="btn btn-success" href="<?= base_url('user/create') ?>"><i class="fas fa-plus"></i> Tambah</a>
  </div>

  <?php if(session()->getFlashdata('ok')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('ok') ?></div>
  <?php endif; ?>

  <div class="card">
    <div class="card-body table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>No</th><th>Username</th><th>Nama</th><th>Role</th><th>Status</th><th>Email</th><th>Telepon</th><th>Tindakan</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach($rows as $r): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= esc($r['username']) ?></td>
            <td><?= esc($r['nama']) ?></td>
            <td><?= esc($r['role']) ?></td>
            <td><?= esc($r['status']) ?></td>
            <td><?= esc($r['email']) ?></td>
            <td><?= esc($r['telepon']) ?></td>
            <td>
              <a class="btn btn-primary btn-sm" href="<?= base_url('user/edit/'.$r['id']) ?>"><i class="fas fa-pen"></i></a>

              <form action="<?= base_url('user/reset-password/'.$r['id']) ?>" method="post" style="display:inline-block">
                <?= csrf_field() ?>
                <button class="btn btn-warning btn-sm" onclick="return confirm('Reset password ke user123?')">
                  <i class="fas fa-key"></i>
                </button>
              </form>

              <a class="btn btn-danger btn-sm" onclick="return confirm('Hapus user?')" href="<?= base_url('user/delete/'.$r['id']) ?>"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
