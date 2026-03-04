<div class="card">
  <div class="card-header"><h3 class="card-title">Edit Jenis Uji</h3></div>
  <div class="card-body">
    <form method="post" action="<?= base_url('jenis-uji/update/'.$row['id']) ?>">
      <?= csrf_field() ?>

      <div class="form-group">
        <label>Nama Specimen</label>
        <input class="form-control" name="nama_specimen" value="<?= esc($row['nama_specimen']) ?>" required>
      </div>

      <div class="form-group">
        <label>Jenis Barang</label>
        <input class="form-control" name="jenis_barang" value="<?= esc($row['jenis_barang']) ?>" required>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Harga Mahasiswa</label>
          <input type="number" class="form-control" name="harga_mahasiswa" value="<?= esc($row['harga_mahasiswa']) ?>" required>
        </div>
        <div class="form-group col-md-6">
          <label>Harga Umum</label>
          <input type="number" class="form-control" name="harga_umum" value="<?= esc($row['harga_umum']) ?>" required>
        </div>
      </div>

      <div class="form-group">
        <label>Satuan</label>
        <input class="form-control" name="satuan" value="<?= esc($row['satuan']) ?>">
      </div>

      <button class="btn btn-primary">Update</button>
      <a class="btn btn-secondary" href="<?= base_url('jenis-uji') ?>">Kembali</a>
    </form>
  </div>
</div>
