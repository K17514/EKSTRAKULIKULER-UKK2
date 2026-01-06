<?php
function format_rupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
?>
<section class="latest-podcast-section d-flex align-items-center justify-content-center pb-5" id="section_2" style="padding-top: 100px; background-color:#E0DBD8;">
  <div class="container">
    <div class="col-lg-12 col-12 mt-5 mb-4 mb-lg-4">
      <div class="custom-block d-flex flex-column" style="background-color:#FAF5F1; border-radius:16px; box-shadow:0 4px 10px rgba(0,0,0,0.1); padding: 20px;">

        <!-- Tab Header -->
        <ul class="nav nav-tabs mb-4" id="inputTabs" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pesanan-tab" data-bs-toggle="tab" data-bs-target="#pesanan-tab-pane" type="button" role="tab">Tabel Pesanan</button>
          </li>
          <?php if (session()->get('level')==1 || session()->get('level')== 2 || session()->get('level')== 6) { ?>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="nota-tab" data-bs-toggle="tab" data-bs-target="#nota-tab-pane" type="button" role="tab">Tabel Nota</button>
          </li>
        <?php } ?>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="inputTabsContent">
          
          <!-- Tabel Pesanan -->
          <div class="tab-pane fade show active" id="pesanan-tab-pane" role="tabpanel" aria-labelledby="pesanan-tab">
            <!-- Form pencarian -->
            <a href="<?= base_url('home/')?>" class="btn btn-success mb-3" style="background-color:#292F36; border:none;">
              <i class="fa fa-user-plus me-1"></i> + Tambah Pesanan
            </a>
<div class="container my-4">
  <div class="mb-3">
    <input type="text" id="searchPesanan" class="form-control" placeholder="Cari pesanan...">
  </div>

  <?php if (!empty($notaGrouped)): ?>
    <?php foreach ($notaGrouped as $nota): ?>
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
      <?php endforeach; ?>
    <?php else: ?>
      <div class="alert alert-info">
        Belum ada pesanan untuk hari ini.
      </div>
    <?php endif; ?>
  </div>


  




           
          </div>

          <!-- Tabel Nota -->
          <div class="tab-pane fade" id="nota-tab-pane" role="tabpanel" aria-labelledby="nota-tab" style="margin-top: 30px;">
            <form class="mt-4" action="<?= base_url('home/exportLaporanKeuangan')?>" method="POST" target="_blank">
    <div class="row">
        <div class="col">
            <label for="tanggal_awal_3">Tanggal Awal</label>
            <input type="date" id="tanggal_awal_3" class="form-control" name="tanggal_awal" required>
        </div>
        <div class="col">
            <label for="tanggal_akhir_3">Tanggal Akhir</label>
            <input type="date" id="tanggal_akhir_3" class="form-control" name="tanggal_akhir" required>
        </div>
        <div class="col d-flex align-items-end">
            <button class="btn btn-success" style="width: 100px;">
        <i class="fas fa-file-excel"></i> EXCEL
      </button>
        </div>
    </div>
</form>
            <table id="notaTable" class="table table-hover" style="background-color: #ffffff; border-radius: 10px; overflow: hidden;">
              <thead style="background-color:#A41F13; color:#ffffff;">
    <tr>
        <th>No<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search No"></th>
        <th>No.Meja<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search No.Meja"></th>
        <th>Nama<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Nama"></th>
        <th>Total<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Total"></th>
        <th>Bayar<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Bayar"></th>
        <th>Kembalian<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Kembalian"></th>
        <th>Metode<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Metode"></th>
        <th>Tanggal<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Tanggal"></th>
        <th>Status<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Status"></th>
        <?php if (session()->get('level')==1 || session()->get('level')== 2 || session()->get('level')== 6) { ?>
            <th>Aksi</th>
        <?php } ?>
    </tr>
</thead>


              <tbody>
                <?php $ms = 1; foreach ($nota2 as $value): ?>
                <tr>
                  <td><?= $ms++ ?></td>
                  <td><?= $value->no_meja ?? '-' ?></td>
                  <td><?= $value->username ?></td>
                  <td><?= format_rupiah($value->total) ?></td>
                  <td><?= format_rupiah($value->bayar) ?></td>
                  <td><?= format_rupiah($value->kembalian) ?></td>
                  <td><?= $value->nama_metode ?></td>
                  <td><?= $value->due ?></td>
                  <td>
                      <?php
        $status = strtolower($value->status);
        $btnClass = '';
        $extraClass = '';
        $isDisabled = false;

        switch ($status) {
            case 'selesai':
                $btnClass = 'btn-success';
                $extraClass = 'disabled no-click';
                $isDisabled = true;
                break;
            case 'proses':
                $btnClass = 'btn-primary';
                break;
            case 'konfirmasi':
                $btnClass = 'btn-warning text-dark';
                break;
            case 'gagal':
                $btnClass = 'btn-danger';
                $extraClass = 'disabled no-click';
                $isDisabled = true;
                break;
            default:
                $btnClass = 'btn-secondary';
        }
    ?>
                    <a href="<?= ($status === 'selesai' || $status === 'gagal') ? '#' : base_url('home/formbayar/' . $value->id_nota) ?>" class="btn btn-sm <?= $btnClass ?>">
                      <?= ucfirst($value->status) ?>
                    </a>
                  </td>
                  <?php if (session()->get('level')==1 || session()->get('level')== 2 || session()->get('level')== 6) { ?>
                  <td>
                      <a href="<?= base_url('home/printnota/' . $value->id_nota) ?>" class="btn btn-sm btn-info detail-btn">
                        <i class="fa fa-print"></i>
                      </a>
                  <?php } if (session()->get('level') == 1): ?>
                      <a href="<?= base_url('admin/detailnota/' . $value->id_nota) ?>" class="btn btn-sm btn-info detail-btn">
                        <i class="fa fa-circle-info"></i>
                      </a>
                    </td>
                  <?php endif; ?>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

        </div> <!-- end tab-content -->
      </div>
    </div>
  </div>
</section>

<!-- JS Libraries -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url('js/bootstrap.bundle.min.js'); ?>"></script>

<!-- DataTable & Tab Logic -->
<script>
 $(document).ready(function () {
        var table = $('#notaTable').DataTable({
            "pageLength": 5, // Show only 5 rows at a time
            "lengthMenu": [5, 10, 25, 50], // Allow user to change row limit
            "ordering": true, // Enable column sorting
            "searching": true // Enable global search
        });

        // Add individual column search
        $('#notaTable thead th').each(function () {
            var title = $(this).text().trim();
            if (title !== 'Aksi') {
                $(this).html(title + '<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search ' + title + '">');
            }
        });

        // Apply column search
        table.columns().every(function () {
            var that = this;
            $('input', this.header()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that.search(this.value).draw();
                }
            });
        });
    });



document.getElementById("searchPesanan").addEventListener("input", function () {
    const keyword = this.value.toLowerCase();
    const items = document.querySelectorAll(".pesanan-item");

    items.forEach(function (item) {
      const text = item.innerText.toLowerCase();
      item.style.display = text.includes(keyword) ? "" : "none";
    });
  });

  //   function formatDetail(data) {
  //     let html = '<table class="table table-sm mb-0">';
  //     data.forEach(item => {
  //       if (item.jenis === 'produk') {
  //         html += `<tr><td>- ${item.nama_produk} (${item.qty}x)</td></tr>`;
  //       } else if (item.jenis === 'paket') {
  //         html += `<tr><td><strong>${item.nama_paket}</strong> (${item.qty}x)</td></tr>`;
  //         item.isi_paket.forEach(isi => {
  //           html += `<tr><td style="padding-left: 2rem;">↳ ${isi.nama_produk} (${isi.qty}x)</td></tr>`;
  //         });
  //       }
  //     });
  //     html += '</table>';
  //     return html;
  //   }
  // });
</script>
