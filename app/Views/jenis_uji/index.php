<div class="container-fluid">

  <!-- Header + breadcrumb -->
  <div class="d-flex align-items-center justify-content-between mb-3">
    <div>
      <div class="page-title h4 mb-1">Jenis Uji</div>
      <div class="text-muted" style="font-size:13px;">Kelola master jenis specimen dan tarif pengujian</div>
    </div>
    <ol class="breadcrumb mb-0 bg-transparent p-0">
      <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
      <li class="breadcrumb-item active">Jenis Uji</li>
    </ol>
  </div>

  <!-- Statistik ringkas -->
  <div class="row mb-3">
    <div class="col-md-3">
      <div class="card stat-mini p-3">
        <div class="label">Total Jenis Uji</div>
        <div class="value"><?= $total ?? 0 ?></div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card stat-mini p-3">
        <div class="label">Aktif</div>
        <div class="value"><?= $aktif ?? 0 ?></div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card stat-mini p-3">
        <div class="label">Nonaktif</div>
        <div class="value"><?= $non ?? 0 ?></div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card stat-mini p-3">
        <div class="label">Rata-rata Harga (Umum/Mhs)</div>
        <div class="value" style="font-size:16px;">
          Rp <?= number_format($avgU ?? 0,0,',','.') ?> /
          Rp <?= number_format($avgM ?? 0,0,',','.') ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Card utama -->
  <div class="card card-soft">
    <div class="card-body">

      <div class="d-flex flex-wrap align-items-center justify-content-between mb-3">
        <div class="h5 mb-0 font-weight-bold">MASTER JENIS UJI</div>

        <div class="d-flex flex-wrap" style="gap:10px;">
          <a href="<?= base_url('jenis-uji/create') ?>" class="btn btn-success btn-pill">
            <i class="fas fa-plus mr-1"></i> Tambah
          </a>
          <a href="<?= base_url('jenis-uji') ?>" class="btn btn-warning btn-pill text-white">
            <i class="fas fa-sync-alt mr-1"></i> Refresh
          </a>
        </div>
      </div>

      <!-- Filter cepat -->
      <div class="row filters mb-3">
        <div class="col-md-3">
          <label class="text-muted" style="font-size:12px;">Filter Status</label>
          <select id="filterStatus" class="form-control">
            <option value="">Semua</option>
            <option value="Aktif">Aktif</option>
            <option value="Nonaktif">Nonaktif</option>
          </select>
        </div>
        <div class="col-md-9 d-flex align-items-end justify-content-end">
          <small class="text-muted">Gunakan Search tabel untuk cari nama specimen.</small>
        </div>
      </div>

      <div class="table-responsive">
        <table id="tblJenis" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th style="width:70px;">No</th>
              <th>Nama Specimen</th>
              <th style="width:170px;">Harga Umum</th>
              <th style="width:180px;">Harga Mahasiswa</th>
              <th style="width:120px;">Satuan</th>
              <th style="width:120px;">Status</th>
              <th style="width:130px;">Tindakan</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($rows as $r): ?>
            <?php $st = $r['status'] ?? 'Aktif'; ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><strong><?= esc($r['nama_specimen']) ?></strong></td>

              <td><span class="price">Rp <?= number_format((float)$r['harga_umum'],0,',','.') ?></span></td>
              <td><span class="price">Rp <?= number_format((float)$r['harga_mahasiswa'],0,',','.') ?></span></td>

              <td><?= esc($r['satuan']) ?></td>

              <td>
                <?php if($st === 'Aktif'): ?>
                  <span class="badge-status badge-aktif">Aktif</span>
                <?php else: ?>
                  <span class="badge-status badge-non">Nonaktif</span>
                <?php endif; ?>
              </td>

              <td class="td-actions">
                <a class="btn btn-primary" href="<?= base_url('jenis-uji/edit/'.$r['id']) ?>" title="Edit">
                  <i class="fas fa-pen"></i>
                </a>
                <a class="btn btn-danger"
                   href="<?= base_url('jenis-uji/delete/'.$r['id']) ?>"
                   onclick="return confirm('Hapus data ini?')"
                   title="Hapus">
                  <i class="fas fa-trash-alt"></i>
                </a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>

</div>

<script>
$(function(){
  const table = $('#tblJenis').DataTable({
    paging:true,
    lengthChange:true,
    searching:true,
    ordering:false,
    info:true,
    responsive:true,
    pageLength:10,
    language:{
      lengthMenu:"Show _MENU_ entries",
      search:"Search:",
      info:"Showing _START_ to _END_ of _TOTAL_ entries",
      paginate:{ previous:"Previous", next:"Next" },
      emptyTable:"No data available in table"
    }
  });

  $('#filterStatus').on('change', function(){
    table.column(5).search(this.value).draw();
  });
});
</script>
