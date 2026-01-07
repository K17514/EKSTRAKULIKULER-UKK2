<section class="latest-podcast-section d-flex align-items-center justify-content-center pb-5" id="section_2" style="padding-top: 100px; background-color:#E0DBD8;">
    <div class="container">
        <div class="col-lg-12 col-12 mt-5 mb-4 mb-lg-4">
            <div class="custom-block d-flex flex-column" style="background-color:#FAF5F1; border-radius:16px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">

                <ul class="nav nav-tabs mb-4" id="inputTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="daftar-tab" data-bs-toggle="tab" data-bs-target="#daftar-table" type="button" role="tab">Tabel Pendaftaran</button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="inputTabsContent">


                    <!-- daftar Table -->
                    <div class="tab-pane fade show active" id="daftar-table" role="tabpanel">
                        <?php if (session()->get('level') == 2) { ?>
                            <div class="mb-3 d-flex gap-2">
                                <a href="<?= base_url('/daftar?mode=rombel') ?>"
                                    class="btn <?= ($mode == 'rombel') ? 'btn-primary' : 'btn-outline-primary' ?>">
                                    📘 Rombel Saya
                                </a>

                                <a href="<?= base_url('/daftar?mode=ekskul') ?>"
                                    class="btn <?= ($mode == 'ekskul') ? 'btn-success' : 'btn-outline-success' ?>">
                                    🏅 Ekskul Saya
                                </a>
                            </div>
                        <?php } ?>

                        <a href="<?= base_url('/inputdaftar') ?>" class="btn btn-success mb-3" style="align-self: flex-start; background-color:#292F36; border:none;">
                            <i class="fa fa-daftar-plus me-1"></i> + Daftar Ekskul
                        </a>
                        <table id="productTable" class="table table-hover datatable" style="background-color: #ffffff; border-radius: 10px; overflow: hidden;">
                            <thead style="background-color:#A41F13; color:#ffffff;">
                                <tr>
                                    <th>No<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search No"></th>
                                    <?php if (session()->get('level') == 1 || session()->get('level') == 2) { ?>
                                        <th>Siswa<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Siswa"></th>
                                    <?php } ?>
                                    <th>Ekskul<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Ekskul"></th>
                                    <th>Tanggal<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Tanggal"></th>
                                    <th>Status<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Status"></th>
                                    <?php if (session()->get('level') == 1 || session()->get('level') == 2) { ?>
                                        <th>Aksi</th>
                                    <?php } ?>

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
                                        <td><?= $value->tanggal_daftar ?></td>
                                        <td><?= $value->status ?></td>
                                        <?php if (session()->get('level') == 1 || session()->get('level') == 2) { ?>
                                            <td>
                                                <!-- TERIMA -->
                                                <a href="<?= base_url('/terimadaftar/' . $value->id_daftar) ?>"
                                                    class="btn btn-success btn-sm"
                                                    onclick="return confirm('Terima pendaftaran ini?')">
                                                    <i class="fa fa-check"></i>
                                                </a>

                                                <!-- TOLAK -->
                                                <a href="<?= base_url('/tolakdaftar/' . $value->id_daftar) ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Tolak pendaftaran ini?')">
                                                    <i class="fa fa-times"></i>
                                                </a>

                                                <!-- HAPUS (KHUSUS LEVEL 1) -->
                                                <?php if (session()->get('level') == 1) { ?>
                                                    <a href="<?= base_url('/deletedaftar/' . $value->id_daftar) ?>"
                                                        class="btn btn-secondary btn-sm"
                                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        <?php } ?>

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

        function initDataTable(tableId) {
            var table = $(tableId).DataTable({
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50],
                ordering: true,
                searching: true
            });

            // Column search
            $(tableId + ' thead th').each(function(index) {
                var title = $(this).text().trim();
                if (title !== 'Aksi') {
                    $(this).html(
                        title +
                        '<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search ' +
                        title +
                        '" />'
                    );
                }
            });

            table.columns().every(function() {
                var that = this;
                $('input', this.header()).on('keyup change', function() {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                    }
                });
            });
        }

        // INIT ALL TABLES
        initDataTable('#daftarTable');

    });
</script>


</body>

</html>