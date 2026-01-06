<?php
function format_rupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
?>

<div class="container my-4" style="padding-top:150px">
  <div class="mb-3">
    <input type="text" id="searchPesanan" class="form-control" placeholder="Cari pesanan...">
  </div>

  <?php if (!empty($notaGrouped)): ?>
    <?php foreach ($notaGrouped as $nota): ?>
      <a href="<?= base_url('home/terimakasih/' . $nota['id_nota']) ?>" class="text-decoration-none text-dark">
        <div class="card mb-4 shadow-sm pesanan-item">
          <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <h5 class="mb-2 mb-md-0">Nota #<?= esc($nota['id_nota']) ?></h5>
            <?php
  $statusClass = 'bg-secondary'; // default

  if ($nota['status'] === 'selesai') {
    $statusClass = 'bg-success';
  } elseif ($nota['status'] === 'menunggu pembayaran') {
    $statusClass = 'bg-info text-dark';
  } elseif ($nota['status'] === 'proses' || $nota['status'] === 'konfirmasi') {
    $statusClass = 'bg-warning text-dark';
  } elseif ($nota['status'] === 'gagal') {
    $statusClass = 'bg-danger';
  }
?>
<span class="badge <?= $statusClass ?>">
  <?= esc(ucfirst($nota['status'])) ?>
</span>

          </div>

          <div class="card-body">
            <div class="row g-2 mb-2">
              <div class="col-sm-6 col-12"><strong>Meja:</strong> <?= esc($nota['no_meja'] ?? '-') ?></div>
              <div class="col-sm-6 col-12"><strong>Nama:</strong> <?= esc($nota['username'] ?? '-') ?></div>
              <div class="col-sm-6 col-12"><strong>Total:</strong> <?= format_rupiah($nota['total']) ?></div>
              <div class="col-sm-6 col-12"><strong>Bayar:</strong> <?= format_rupiah($nota['bayar']) ?></div>
              <div class="col-sm-6 col-12"><strong>Kembalian:</strong> <?= format_rupiah($nota['kembalian']) ?></div>
              <div class="col-sm-6 col-12"><strong>Jatuh Tempo:</strong> <?= esc($nota['due']) ?></div>
            </div>

            <?php if ($nota['id_metode'] == 2): ?>
              <div class="alert alert-success p-2">
                <strong>Metode: Tunai</strong> — Silahkan tunggu pesanan dibuat.
              </div>
            <?php else: ?>
              <div class="alert alert-warning p-2">
                <strong>Metode:</strong> <?= esc($nota['nama_metode']) ?><br>
                <strong>Kode Pembayaran:</strong> <span class="text-monospace"><?= esc($nota['kode']) ?></span>
              </div>
            <?php endif; ?>

            <h6 class="mt-4 mb-2">Rincian Pesanan:</h6>
            <ul class="list-group small">
              <?php foreach ($nota['detail'] as $pesanan): ?>
                <li class="list-group-item">
                  <?php if ($pesanan['type'] === 'produk'): ?>
                    <strong><?= esc($pesanan['nama']) ?></strong> — Jumlah: <?= esc($pesanan['jumlah']) ?>
                    <?php if (!empty($pesanan['pesan'])): ?>
                      <p class="mb-0 text-danger">Catatan: <?= esc($pesanan['pesan']) ?></p>
                    <?php endif; ?>
                  <?php elseif ($pesanan['type'] === 'paket'): ?>
                    <strong>Paket: <?= esc($pesanan['nama_paket']) ?> (x<?= esc($pesanan['jumlah_paket']) ?>)</strong>
                    <ul class="ms-3 mt-2">
                      <?php foreach ($pesanan['isi'] as $isi): ?>
                        <li><?= esc($isi['nama']) ?> — Jumlah: <?= esc($isi['jumlah']) ?></li>
                      <?php endforeach; ?>
                    </ul>
                    <?php if (!empty($pesanan['pesan'])): ?>
                      <p class="mb-0 text-danger">Catatan: <?= esc($pesanan['pesan']) ?></p>
                    <?php endif; ?>
                  <?php endif; ?>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </a>
    <?php endforeach; ?>
  <?php else: ?>
    <div class="alert alert-info">
      Belum ada pesanan untuk hari ini.
    </div>
  <?php endif; ?>
</div>

<script>
  document.getElementById("searchPesanan").addEventListener("input", function () {
    const keyword = this.value.toLowerCase();
    const items = document.querySelectorAll(".pesanan-item");

    items.forEach(function (item) {
      const text = item.innerText.toLowerCase();
      item.style.display = text.includes(keyword) ? "" : "none";
    });
  });
</script>
