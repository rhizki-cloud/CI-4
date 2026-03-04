<div class="container-fluid">

  <!-- Header + breadcrumb -->
  <div class="d-flex align-items-center justify-content-between mb-3">
    <div>
      <div class="page-title h4 mb-1">Pengujian</div>
      <div class="text-muted" style="font-size:13px;">
        Kelola Nota Pengujian (Umum & Mahasiswa)
      </div>
    </div>
    <ol class="breadcrumb mb-0 bg-transparent p-0">
      <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
      <li class="breadcrumb-item active">Nota Pengujian</li>
    </ol>
  </div>

  <!-- Statistik ringkas -->
  <div class="row mb-3">
    <div class="col-md-4">
      <div class="card stat-mini p-3">
        <div class="label">Total Nota</div>
        <div class="value"><?= $total ?? 0 ?></div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card stat-mini p-3">
        <div class="label">Nota Mahasiswa</div>
        <div class="value"><?= $totalMhs ?? 0 ?></div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card stat-mini p-3">
        <div class="label">Nota Umum</div>
        <div class="value"><?= $totalUmum ?? 0 ?></div>
      </div>
    </div>
  </div>

  <!-- Card utama -->
  <div class="card card-soft">
    <div class="card-body">

      <div class="d-flex flex-wrap align-items-center justify-content-between mb-3">
        <div class="h5 mb-0 font-weight-bold">PENGUJIAN</div>

        <div class="d-flex flex-wrap" style="gap:10px;">
          <a href="<?= base_url('nota/create/umum') ?>" class="btn btn-success btn-pill">
            <i class="fas fa-plus mr-1"></i> Transaksi Umum
          </a>
          <a href="<?= base_url('nota/create/mahasiswa') ?>" class="btn btn-warning btn-pill text-white">
            <i class="fas fa-plus mr-1"></i> Transaksi Mahasiswa
          </a>
          <a href="<?= base_url('nota') ?>" class="btn btn-info btn-pill">
            <i class="fas fa-sync-alt mr-1"></i> Refresh
          </a>
        </div>
      </div>

      <!-- Filter cepat (UI doang, tabel tetap bisa search) -->
      <div class="row filters mb-3">
        <div class="col-md-3">
          <label class="text-muted" style="font-size:12px;">Filter Tipe</label>
          <select id="filterTipe" class="form-control">
            <option value="">Semua</option>
            <option value="MAHASISWA">Mahasiswa</option>
            <option value="UMUM">Umum</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="text-muted" style="font-size:12px;">Filter Tanggal</label>
          <input id="filterTanggal" type="date" class="form-control">
        </div>
        <div class="col-md-6 d-flex align-items-end justify-content-end">
          <small class="text-muted">
            Tips: gunakan Search kanan atas tabel untuk cari No Nota / Penerima.
          </small>
        </div>
      </div>

      <div class="table-responsive">
        <table id="tblNota" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th style="width:70px;">No</th>
              <th>No Nota</th>
              <th>Penerima</th>
              <th style="width:160px;">Tanggal Nota</th>
              <th style="width:110px;">Tipe</th>
              <th style="width:120px;">Tindakan</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($rows as $r): ?>
            <?php
              $tipe = strtoupper($r['tipe_pelanggan'] ?? 'umum');
              $label = ($tipe==='MAHASISWA') ? 'MAHASISWA' : 'UMUM';
              $badge = ($label==='MAHASISWA') ? 'badge-success' : 'badge-primary';
            ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><span class="badge-nota"><?= esc($r['no_nota']) ?></span></td>
              <td><?= esc($r['nama_penerima'] ?? '-') ?></td>
              <td><?= esc($r['tanggal_nota']) ?></td>
              <td><span class="badge <?= $badge ?>"><?= $label ?></span></td>
              <td class="td-actions">
                <a href="<?= base_url('nota/edit/'.$r['id']) ?>"
                   class="btn btn-primary"
                   title="Edit Nota">
                  <i class="fas fa-pen"></i>
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
$(function () {
  const table = $('#tblNota').DataTable({
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: false,
    info: true,
    responsive: true,
    pageLength: 10,
    language: {
      lengthMenu: "Show _MENU_ entries",
      search: "Search:",
      info: "Showing _START_ to _END_ of _TOTAL_ entries",
      paginate: { previous: "Previous", next: "Next" },
      emptyTable: "No data available in table"
    }
  });

  // Filter tipe (kolom ke-4 index 4)
  $('#filterTipe').on('change', function(){
    const v = this.value;
    table.column(4).search(v).draw();
  });

  // Filter tanggal (kolom ke-3 index 3)
  $('#filterTanggal').on('change', function(){
    const v = this.value;
    table.column(3).search(v).draw();
  });
});
</script>
