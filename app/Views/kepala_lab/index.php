<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Kepala Lab</h4>
    <a class="btn btn-success" href="<?= base_url('kepala-lab/create') ?>"><i class="fas fa-plus"></i> Tambah</a>
  </div>

  <?php if(session()->getFlashdata('ok')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('ok') ?></div>
  <?php endif; ?>

  <div class="card">
    <div class="card-body table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>No</th><th>Nama</th><th>NIP</th><th>Jabatan</th><th>Email</th><th>Telepon</th><th>Status</th><th>Tindakan</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach($rows as $r): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= esc($r['nama']) ?></td>
            <td><?= esc($r['nip']) ?></td>
            <td><?= esc($r['jabatan']) ?></td>
            <td><?= esc($r['email']) ?></td>
            <td><?= esc($r['telepon']) ?></td>
            <td><?= esc($r['status']) ?></td>
            <td>
              <a class="btn btn-primary btn-sm" href="<?= base_url('kepala-lab/edit/'.$r['id']) ?>"><i class="fas fa-pen"></i></a>
              <a class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')" href="<?= base_url('kepala-lab/delete/'.$r['id']) ?>"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
