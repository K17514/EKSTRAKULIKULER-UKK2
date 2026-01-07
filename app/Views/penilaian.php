<section class="latest-podcast-section d-flex align-items-center justify-content-center pb-5" id="section_2" style="padding-top: 100px; background-color:#E0DBD8;">
    <div class="container">
        <div class="col-lg-12 col-12 mt-5 mb-4 mb-lg-4">
            <div class="custom-block d-flex flex-column" style="background-color:#FAF5F1; border-radius:16px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">

                <ul class="nav nav-tabs mb-4" id="penilaianTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="penilaian-tab" data-bs-toggle="tab" data-bs-target="#penilaian-table" type="button" role="tab">Tabel Penilaian - Bulan <?= date('F Y', strtotime($current_month . '-01')) ?></button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="penilaianTabsContent">

                    <?php if (session()->get('level') == 2) { ?>
                        <div class="mb-3 d-flex gap-2">
                            <a href="<?= base_url('/penilaian?mode=rombel&bulan=' . $current_month) ?>"
                                class="btn <?= ($mode == 'rombel') ? 'btn-primary' : 'btn-outline-primary' ?>">
                                📘 Rombel Saya
                            </a>

                            <a href="<?= base_url('/penilaian?mode=ekskul&bulan=' . $current_month) ?>"
                                class="btn <?= ($mode == 'ekskul') ? 'btn-success' : 'btn-outline-success' ?>">
                                🏅 Ekskul Saya
                            </a>
                        </div>
                    <?php } ?>


                    <a href="<?= base_url('/penilaian/export?bulan=' . $current_month) ?>"
                        class="btn btn-success mb-3">
                        Export Excel
                    </a>



                    <!-- Penilaian Table -->
                    <div class="tab-pane fade show active" id="penilaian-table" role="tabpanel">
                        <table id="penilaianTable" class="table table-hover datatable" style="background-color: #ffffff; border-radius: 10px; overflow: hidden;">
                            <thead style="background-color:#A41F13; color:#ffffff;">
                                <tr>
                                    <th>No<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search No"></th>
                                    <?php if (session()->get('level') == 1 || session()->get('level') == 2) { ?>
                                        <th>Siswa<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Siswa"></th>
                                    <?php } ?>
                                    <th>Ekskul<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Ekskul"></th>
                                    <th>Nilai</th>
                                    <th>Predikat</th>
                                    <th>Catatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ms = 1;
                                foreach ($daftar as $key => $value) {
                                ?>
                                    <tr style="background-color: white;" onmouseover="this.style.backgroundColor='darkwhite'; this.style.color='black';" onmouseout="this.style.backgroundColor='white'; this.style.color='';">
                                        <td><?= $ms++ ?></td>
                                        <?php if (session()->get('level') == 1 || session()->get('level') == 2) { ?>
                                            <td><?= $value->nama_siswa ?></td>
                                        <?php } ?>
                                        <td><?= $value->nama_ekskul ?></td>
                                        <td>
                                            <?php if (session()->get('level') == 1 || session()->get('level') == 2) { ?>
                                                <input type="number" class="form-control nilai-input" data-id="<?= $value->id_daftar ?>" min="1" max="100" value="<?= $value->nilai ?: '' ?>" <?= $is_locked ? 'readonly' : '' ?> placeholder="1-100">
                                            <?php } else { ?>
                                                <?= $value->nilai ?: 'Belum diisi' ?>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if (session()->get('level') == 1 || session()->get('level') == 2) { ?>
                                                <select class="form-select predikat-select" data-id="<?= $value->id_daftar ?>" <?= $is_locked ? 'disabled' : '' ?>>
                                                    <option value="">Pilih</option>
                                                    <option value="A" <?= $value->predikat == 'A' ? 'selected' : '' ?>>A (91-100)</option>
                                                    <option value="B" <?= $value->predikat == 'B' ? 'selected' : '' ?>>B (81-90)</option>
                                                    <option value="C" <?= $value->predikat == 'C' ? 'selected' : '' ?>>C (70-80)</option>
                                                    <option value="D" <?= $value->predikat == 'D' ? 'selected' : '' ?>>D (-70)</option>
                                                </select>
                                            <?php } else { ?>
                                                <?= $value->predikat ?: 'Belum diisi' ?>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if (session()->get('level') == 1 || session()->get('level') == 2) { ?>
                                                <textarea class="form-control catatan-input" data-id="<?= $value->id_daftar ?>" rows="2" placeholder="Catatan" <?= $is_locked ? 'readonly' : '' ?>><?= $value->catatan ?: '' ?></textarea>
                                            <?php } else { ?>
                                                <?= $value->catatan ?: 'Belum diisi' ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
</section>

</main>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url('js/bootstrap.bundle.min.js'); ?>"></script>
<script>
    $(document).ready(function() {

        $('.nilai-input, .predikat-select, .catatan-input').on('change', function() {
            let id_daftar = $(this).data('id');

            $.ajax({
                url: '<?= base_url('/penilaian/update') ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_daftar: id_daftar,
                    nilai: $('.nilai-input[data-id="' + id_daftar + '"]').val(),
                    predikat: $('.predikat-select[data-id="' + id_daftar + '"]').val(),
                    catatan: $('.catatan-input[data-id="' + id_daftar + '"]').val(),
                    bulan: '<?= $current_month ?>'
                },
                success: function(res) {
                    if (res.success) {
                        console.log('Nilai tersimpan');
                    } else {
                        alert(res.message);
                    }
                },
                error: function() {
                    alert('AJAX error');
                }
            });
        });

    });
</script>


</body>

</html>