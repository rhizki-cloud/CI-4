<div class="container-fluid">

  <!-- Judul -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h3 class="mb-0">Dashboard</h3>
      <small class="text-muted">
        Ringkasan aktivitas sistem Laboratorium
      </small>
    </div>
  </div>

  <!-- Statistik -->
  <div class="row mb-4">
    <div class="col-md-3">
      <div class="card stat-card p-3">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <div class="card-title-small">Total Pengujian</div>
            <div class="card-value"><?= $totalPengujian ?? 0 ?></div>
          </div>
          <div class="stat-icon bg-soft-primary">
            <i class="fas fa-file-alt"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card stat-card p-3">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <div class="card-title-small">Jenis Uji</div>
            <div class="card-value"><?= $totalJenis ?? 0 ?></div>
          </div>
          <div class="stat-icon bg-soft-success">
            <i class="fas fa-vials"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card stat-card p-3">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <div class="card-title-small">Pengguna</div>
            <div class="card-value"><?= $totalUser ?? 0 ?></div>
          </div>
          <div class="stat-icon bg-soft-warning">
            <i class="fas fa-users"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card stat-card p-3">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <div class="card-title-small">Hari Ini</div>
            <div class="card-value"><?= $hariIni ?? 0 ?></div>
          </div>
          <div class="stat-icon bg-soft-info">
            <i class="fas fa-calendar-day"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Row bawah -->
  <div class="row">

    <!-- Quick Action -->
    <div class="col-md-6">
      <div class="card mb-4">
        <div class="card-header bg-white">
          <strong>Aksi Cepat</strong>
        </div>
        <div class="card-body quick-action">
          <a href="<?= base_url('admin/pengujian/tambah') ?>">
            <i class="fas fa-plus-circle text-primary"></i>
            Tambah Catatan Pengujian
          </a>
          <a href="<?= base_url('admin/jenis-uji') ?>">
            <i class="fas fa-vials text-success"></i>
            Kelola Jenis Uji
          </a>
          <a href="<?= base_url('admin/user') ?>">
            <i class="fas fa-user-cog text-warning"></i>
            Kelola Pengguna
          </a>
        </div>
      </div>
    </div>

    <!-- Aktivitas -->
    <div class="col-md-6">
      <div class="card mb-4">
        <div class="card-header bg-white">
          <strong>Aktivitas Terakhir</strong>
        </div>
        <div class="card-body">
          <div class="activity-item">
            <div class="activity-icon">
              <i class="fas fa-file-alt"></i>
            </div>
            <div>
              <div class="activity-text">
                Pengujian baru ditambahkan
              </div>
              <div class="activity-time">
                10 menit yang lalu
              </div>
            </div>
          </div>

          <div class="activity-item">
            <div class="activity-icon">
              <i class="fas fa-user"></i>
            </div>
            <div>
              <div class="activity-text">
                User baru ditambahkan
              </div>
              <div class="activity-time">
                1 jam yang lalu
              </div>
            </div>
          </div>

          <div class="activity-item">
            <div class="activity-icon">
              <i class="fas fa-vials"></i>
            </div>
            <div>
              <div class="activity-text">
                Jenis uji diperbarui
              </div>
              <div class="activity-time">
                Hari ini
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>
