<div class="container-fluid">
  <h4>Laporan Pengujian</h4>

  <div class="card mb-3">
    <div class="card-body">
      <form class="row" method="get" action="<?= base_url('laporan/pengujian') ?>">
        <div class="col-md-3">
          <label>Tanggal Awal</label>
          <input type="date" class="form-control" name="tgl1" value="<?= esc($tgl1 ?? '') ?>">
        </div>
        <div class="col-md-3">
          <label>Tanggal Akhir</label>
          <input type="date" class="form-control" name="tgl2" value="<?= esc($tgl2 ?? '') ?>">
        </div>
        <div class="col-md-3">
          <label>Tipe</label>
          <select class="form-control" name="tipe">
            <option value="">Semua</option>
            <option value="umum" <?= ($tipe??'')=='umum'?'selected':'' ?>>Umum</option>
            <option value="mahasiswa" <?= ($tipe??'')=='mahasiswa'?'selected':'' ?>>Mahasiswa</option>
          </select>
        </div>
        <div class="col-md-3 d-flex align-items-end" style="gap:10px;">
          <button class="btn btn-primary">Tampilkan</button>

          <a class="btn btn-secondary"
             target="_blank"
             href="<?= base_url('laporan/pengujian/print?tgl1=').urlencode($tgl1??'').'&tgl2='.urlencode($tgl2??'').'&tipe='.urlencode($tipe??'') ?>">
            Print
          </a>

          <a class="btn btn-success"
             href="<?= base_url('laporan/pengujian/csv?tgl1=').urlencode($tgl1??'').'&tgl2='.urlencode($tgl2??'').'&tipe='.urlencode($tipe??'') ?>">
            CSV
          </a>
        </div>
      </form>
    </div>
  </div>

  <div class="card">
    <div class="card-body table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>No</th><th>No Nota</th><th>Penerima</th><th>Tanggal</th><th>Tipe</th><th>NIM</th><th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach($rows as $r): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= esc($r['no_nota']) ?></td>
            <td><?= esc($r['nama_penerima']) ?></td>
            <td><?= esc($r['tanggal_nota']) ?></td>
            <td><?= esc($r['tipe_pelanggan']) ?></td>
            <td><?= esc($r['nim'] ?? '-') ?></td>
            <td><?= isset($r['grand_total']) ? 'Rp '.number_format((float)$r['grand_total'],0,',','.') : '-' ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
