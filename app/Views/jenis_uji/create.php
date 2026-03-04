<div class="card">
  <div class="card-header"><h3 class="card-title">Tambah Jenis Uji</h3></div>
  <div class="card-body">
    <form method="post" action="<?= base_url('jenis-uji/store') ?>">
      <?= csrf_field() ?>

      <div class="form-group">
        <label>Nama Specimen</label>
        <input class="form-control" name="nama_specimen" required>
      </div>

      <div class="form-group">
        <label>Jenis Barang</label>
        <input class="form-control" name="jenis_barang" required>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Harga Mahasiswa</label>
          <input type="number" class="form-control" name="harga_mahasiswa" required>
        </div>
        <div class="form-group col-md-6">
          <label>Harga Umum</label>
          <input type="number" class="form-control" name="harga_umum" required>
        </div>
      </div>

      <div class="form-group">
        <label>Satuan</label>
        <input class="form-control" name="satuan" value="pcs">
      </div>

      <button class="btn btn-success">Simpan</button>
      <a class="btn btn-secondary" href="<?= base_url('jenis-uji') ?>">Kembali</a>
    </form>
  </div>
</div>
