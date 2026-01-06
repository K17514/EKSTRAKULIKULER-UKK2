<?php
function format_rupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
?>
<section class="section" style="padding-top: 120px">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">

          <div class="jumbotron text-center py-5">
            <?php
  // Ambil status dari nota pertama (jika ada)
  $statusUtama = $notaGrouped[0]['status'] ?? '';
  $icon = '';
  $statusLabel = '';

  switch ($statusUtama) {
    case 'selesai':
      $icon = '<i class="bi bi-check-circle-fill text-success"></i>';
      $statusLabel = 'Selesai';
      break;
    case 'menunggu pembayaran':
      $icon = '<i class="bi bi-info-circle-fill text-info"></i>';
      $statusLabel = 'Menunggu Pembayaran';
      break;
    case 'proses':
    case 'konfirmasi':
      $icon = '<i class="bi bi-exclamation-triangle-fill text-warning"></i>';
      $statusLabel = ucfirst($statusUtama);
      break;
    case 'gagal':
      $icon = '<i class="bi bi-x-circle-fill text-danger"></i>';
      $statusLabel = 'Gagal';
      break;
    default:
      $icon = '<i class="bi bi-clock-fill text-secondary"></i>';
      $statusLabel = 'Pending';
      break;
  }
?>
<h1 class="display-3"><?= $icon ?> <?= esc($statusLabel) ?></h1>


            <?php if (!empty($notaGrouped)): ?>
              <?php foreach ($notaGrouped as $nota): ?>
                <div class="pesanan-item mb-4 p-3 border rounded shadow-sm">
                  <h4>
                    Nota #<?= esc($nota['id_nota']) ?>
                  </h4>
                  <p style="color: black;">
                    <strong>Meja:</strong> <?= esc($nota['no_meja'] ?? '-') ?> |
                    <strong>Nama:</strong> <?= esc($nota['username'] ?? '-') ?> |
                    <strong>Total:</strong> <?= format_rupiah($nota['total']) ?>
                  </p>
                  <p style="color: black;"><strong>Jatuh Tempo:</strong> <?= esc($nota['due']) ?></p>



                  <h5>Rincian Pesanan:</h5>
                  <ul class="list-group mb-3">
                    <?php foreach ($nota['detail'] as $pesanan): ?>
                      <li class="list-group-item">
                        <?php if ($pesanan['type'] === 'produk'): ?>
                          <strong><?= esc($pesanan['nama']) ?></strong> — Jumlah: <?= esc($pesanan['jumlah']) ?>
                          <?php if (!empty($pesanan['pesan'])): ?>
                            <p class="mb-0 text-danger">Catatan: <?= esc($pesanan['pesan']) ?></p>
                          <?php endif; ?>
                        <?php elseif ($pesanan['type'] === 'paket'): ?>
                          <strong>Paket: <?= esc($pesanan['nama_paket']) ?> (x<?= esc($pesanan['jumlah_paket']) ?>)</strong>
                          <ul class="ms-3">
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

                  <?php if ($nota['id_metode'] == 2): ?>
                    <div class="alert alert-success">
                      <strong>Metode: Tunai</strong> — <span>Silahkan tunggu pesanan dibuat.</span>
                    </div>
                  <?php else: ?>
                    <div class="alert alert-warning">
                      <strong>Metode: <?= esc($nota['nama_metode']) ?></strong><br>
                      <strong>Kode Pembayaran:</strong> <?= esc($nota['kode']) ?>
                    </div>

                    <?php if ($nota['status'] === 'menunggu pembayaran'): ?>
                      <form action="<?= base_url('home/simpan_bukti') ?>" method="post" enctype="multipart/form-data" class="mt-3">
                        <input type="hidden" name="id_nota" value="<?= esc($nota['id_nota']) ?>">

                        <div class="mb-3">
                          <label for="bukti_<?= esc($nota['id_nota']) ?>" class="form-label"><strong>Upload Bukti Pembayaran:</strong></label>
                          <input class="form-control" type="file" name="bukti" id="bukti_<?= esc($nota['id_nota']) ?>" accept="image/*" required>
                        </div>

                        <button type="submit" class="btn btn-success">Kirim Bukti</button>
                      </form>

                    <?php elseif ($nota['status'] === 'konfirmasi'): ?>
                      <div class="alert alert-info mt-3">
                        <strong>Bukti pembayaran telah dikirim.</strong><br>
                        Silakan tunggu, bukti pembayaran sedang dicek oleh admin.
                      </div>
                    <?php endif; ?>
                  <?php endif; ?>



                </div>
              <?php endforeach; ?>

            <?php else: ?>
              <div class="alert alert-info">
                Belum ada pesanan untuk hari ini.
              </div>
            <?php endif; ?>


            <hr>
            <p class="lead">
              <a class="btn btn-primary btn-lg" href="<?= base_url('/home') ?>" role="button">Kembali</a>
            </p>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
