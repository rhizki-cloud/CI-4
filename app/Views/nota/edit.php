<div class="section-head">DATA CUSTOMER</div>
<div class="hr-line"></div>

<div class="panel-soft">

  <form method="post" action="<?= base_url('nota/update/'.$nota['id']) ?>">
    <?= csrf_field() ?>

    <div class="row">
      <div class="col-md-8">
        <label class="form-label">No Nota</label>
        <input class="form-control input-readonly"
               value="<?= esc($nota['no_nota']) ?>"
               readonly>
      </div>

      <div class="col-md-4">
        <label class="form-label">Tanggal Nota</label>
        <input type="date"
               class="form-control"
               name="tanggal_nota"
               value="<?= esc($nota['tanggal_nota']) ?>"
               required>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-12">
        <label class="form-label">Nama Penerima</label>
        <input class="form-control"
               name="nama_penerima"
               value="<?= esc($nota['nama_penerima']) ?>"
               required>
      </div>
    </div>

    <?php if(($nota['tipe_pelanggan'] ?? '') === 'mahasiswa'): ?>
    <div class="row mt-3">
      <div class="col-md-12">
        <label class="form-label">NIM</label>
        <input class="form-control"
               name="nim"
               value="<?= esc($nota['nim']) ?>"
               required>
      </div>
    </div>
    <?php endif; ?>

    <div class="mt-4">
      <button class="btn btn-update">Update Data Customer</button>
    </div>
  </form>

</div>

<div class="spacer-30"></div>

<div class="section-head">DATA TRANSAKSI</div>
<div class="hr-line"></div>

<div class="table-responsive">
  <table class="table table-transaksi">
    <thead>
      <tr>
        <th style="width:60px;">No</th>
        <th>Nama Spesimen</th>
        <th style="width:120px;">Jumlah</th>
        <th style="width:220px;">Harga</th>
        <th style="width:160px;">Total Harga</th>
        <th style="width:120px;">Tindakan</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach($details as $d): ?>
      <tr>
        <td><b><?= $no++ ?></b></td>
        <td><?= esc($d['nama_specimen']) ?></td>
        <td><?= (int)$d['jumlah'] ?></td>
        <td>
          Rp <?= number_format((float)$d['harga'],2,',','.') ?>
          / <?= esc($d['satuan'] ?? '-') ?>
        </td>
        <td>Rp <?= number_format((float)$d['total'],2,',','.') ?></td>
        <td>
          <a class="btn btn-danger btn-trash"
             onclick="return confirm('Hapus item?')"
             href="<?= base_url('nota/delete-item/'.$nota['id'].'/'.$d['id']) ?>">
            <i class="fas fa-trash-alt"></i>
          </a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- FORM TAMBAH ITEM (bagian bawah seperti contoh: kiri jenis, kanan jumlah) -->
<div class="row mt-4">
  <div class="col-md-9">
    <label class="form-label">Jenis Spesimen</label>
    <form method="post" action="<?= base_url('nota/add-item/'.$nota['id']) ?>">
      <?= csrf_field() ?>
      <select class="form-control" name="jenis_uji_id" required>
        <option value="">Pilih Jenis Spesimen</option>
        <?php foreach($jenis as $j): ?>
          <option value="<?= $j['id'] ?>"><?= esc($j['nama_specimen']) ?></option>
        <?php endforeach; ?>
      </select>
  </div>

  <div class="col-md-3">
    <label class="form-label">Jumlah Spesimen</label>
    <input type="number" class="form-control" name="jumlah" value="1" min="1" required>
  </div>
</div>

<div class="mt-3">
  <button class="btn btn-update">Tambah Spesimen</button>
</div>
</form>
