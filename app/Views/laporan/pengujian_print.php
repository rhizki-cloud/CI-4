<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Print Laporan Pengujian</title>
  <style>
    body{font-family:Arial; font-size:12px;}
    table{width:100%; border-collapse:collapse;}
    th,td{border:1px solid #333; padding:6px;}
    th{background:#eee;}
  </style>
</head>
<body onload="window.print()">
  <h3>Laporan Pengujian</h3>
  <div>Periode: <?= esc($tgl1??'-') ?> s/d <?= esc($tgl2??'-') ?> | Tipe: <?= esc($tipe??'Semua') ?></div>
  <br>

  <table>
    <tr><th>No</th><th>No Nota</th><th>Penerima</th><th>Tanggal</th><th>Tipe</th><th>NIM</th><th>Total</th></tr>
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
  </table>
</body>
</html>
