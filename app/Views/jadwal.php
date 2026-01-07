<section class="latest-podcast-section d-flex align-items-center justify-content-center pb-5" id="section_2" style="padding-top: 100px; background-color:#E0DBD8;">
    <div class="container">
        <div class="col-lg-12 col-12 mt-5 mb-4 mb-lg-4">
            <div class="custom-block d-flex flex-column" style="background-color:#FAF5F1; border-radius:16px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">

                <ul class="nav nav-tabs mb-4" id="inputTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="jadwal-tab" data-bs-toggle="tab" data-bs-target="#jadwal-table" type="button" role="tab">Tabel Jadwal</button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="inputTabsContent">


                    <!-- jadwal Table -->
                    <div class="tab-pane fade show active" id="jadwal-table" role="tabpanel">
                        <?php if (session()->get('level') == 1) { ?>
                            <a href="<?= base_url('/inputjadwal') ?>" class="btn btn-success mb-3"
                                style="align-self: flex-start; background-color:#292F36; border:none;">
                                <i class="fa fa-jadwal-plus me-1"></i> + Tambah Jadwal
                            </a>
                        <?php } ?>

                        <table id="productTable" class="table table-hover datatable" style="background-color: #ffffff; border-radius: 10px; overflow: hidden;">
                            <thead style="background-color:#A41F13; color:#ffffff;">
                                <tr>
                                    <th>No<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search No"></th>
                                    <th>Hari<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Hari"></th>
                                    <th>Ekskul<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Ekskul"></th>
                                    <th>Jam Mulai<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Jam Mulai"></th>
                                    <th>Jam Selesai<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Jam Selesai"></th>
                                    <?php if (session()->get('level') == 1) { ?>
                                        <th>Aksi</th>
                                    <?php } ?>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ms = 1;
                                foreach ($jadwal as $key => $value) {
                                ?>
                                    <tr style="background-color: white;" onmouseover="this.style.backgroundColor='darkwhite'; this.style.color='black';" onmouseout="this.style.backgroundColor='white'; this.style.color='';">
                                        <td><?= $ms++ ?></td>
                                        <td><?= $value->hari ?></td>
                                        <td><?= $value->nama_ekskul ?></td>
                                        <td><?= $value->jam_mulai ?></td>
                                        <td><?= $value->jam_selesai ?></td>
                                        <?php if (session()->get('level') == 1) { ?>
                                            <td>
                                                <a href="<?= base_url('/editjadwal/' . $value->id_jadwal) ?>"
                                                    class="btn btn-warning btn-sm" style="background-color:#edb047; border:none;">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <a href="<?= base_url('/deletejadwal/' . $value->id_jadwal) ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?');"
                                                    style="background-color:#8F7A6E; border:none;">
                                                    <i class="fa fa-trash"></i>
                                                </a>
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
        initDataTable('#jadwalTable');

    });
</script>


</body>

</html>