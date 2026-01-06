<section class="latest-podcast-section d-flex align-items-center justify-content-center pb-5" id="section_2" style="padding-top: 100px; background-color:#E0DBD8;">
    <div class="container">
        <div class="col-lg-12 col-12 mt-5 mb-4 mb-lg-4">
            <div class="custom-block d-flex flex-column" style="background-color:#FAF5F1; border-radius:16px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">

                <ul class="nav nav-tabs mb-4" id="inputTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user-table" type="button" role="tab">Tabel User</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="level-tab" data-bs-toggle="tab" data-bs-target="#level-table" type="button" role="tab">Tabel Level</button>
                    </li>
                    <!-- <li class="nav-item" role="presentation">
                    <button class="nav-link" id="paket-tab" data-bs-toggle="tab" data-bs-target="#paket-table" type="button" role="tab" >Tabel Paket</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="metode-tab" data-bs-toggle="tab" data-bs-target="#metode-table" type="button" role="tab" >Tabel Metode</button>
                </li> -->
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="inputTabsContent">


                    <!-- user Table -->
                    <div class="tab-pane fade show active" id="user-table" role="tabpanel">
                        <a href="<?= base_url('/formdata') ?>" class="btn btn-success mb-3" style="align-self: flex-start; background-color:#292F36; border:none;">
                            <i class="fa fa-user-plus me-1"></i> + Tambah User
                        </a>
                        <table id="userTable" class="table table-hover datatable" style="background-color: #ffffff; border-radius: 10px; overflow: hidden;">
                            <thead style="background-color:#A41F13; color:#ffffff;">
                                <tr>
                                    <th>No<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search No"></th>
                                    <th>Username<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Username"></th>
                                    <th>Email<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Email"></th>
                                    <th>Level<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Level"></th>
                                    <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) { ?>
                                        <th>Aksi</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ms = 1;
                                foreach ($user as $key => $value) {
                                ?>
                                    <tr style="background-color: white;" onmouseover="this.style.backgroundColor='darkwhite'; this.style.color='black';" onmouseout="this.style.backgroundColor='white'; this.style.color='';">
                                        <td><?= $ms++ ?></td>
                                        <td><?= $value->username ?></td>
                                        <td><?= $value->email ?></td>
                                        <td>
                                            <?php
                                            if ($value->level == 1) {
                                                echo 'Admin';
                                            } elseif ($value->level == 2) {
                                                echo 'Guru';
                                            } elseif ($value->level == 3) {
                                                echo 'Siswa';
                                            } else {
                                                echo 'Unknown';
                                            }
                                            ?>
                                        </td>
                                        <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) { ?>
                                            <td>
                                                <a href="<?= base_url('/edituser/' . $value->id_user) ?>" class="btn btn-warning btn-sm" style="background-color:#edb047; border:none;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm delete-btn" href="<?= base_url('deleteuser/' . $value->id_user) ?>" style="background-color:#8F7A6E; border:none;" onclick="return confirm('Are you sure?');">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>


                     <!-- level Table -->
                    <div class="tab-pane fade " id="level-table" role="tabpanel">
                        <a href="<?= base_url('/formdata') ?>" class="btn btn-success mb-3" style="align-self: flex-start; background-color:#292F36; border:none;">
                            <i class="fa fa-level-plus me-1"></i> + Tambah level
                        </a>
                        <table id="levelTable" class="table table-hover datatable" style="background-color: #ffffff; border-radius: 10px; overflow: hidden;">
                            <thead style="background-color:#A41F13; color:#ffffff;">
                                <tr>
                                    <th>No<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search No"></th>
                                    <th>Nama Level<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Nama"></th>
                                    <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) { ?>
                                        <th>Aksi</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ms = 1;
                                foreach ($level as $key => $value) {
                                ?>
                                    <tr style="background-color: white;" onmouseover="this.style.backgroundColor='darkwhite'; this.style.color='black';" onmouseout="this.style.backgroundColor='white'; this.style.color='';">
                                        <td><?= $ms++ ?></td>
                                        <td><?= $value->nama_level ?></td>
                                        <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) { ?>
                                            <td>
                                                <a href="<?= base_url('/editlevel/' . $value->id_level) ?>" class="btn btn-warning btn-sm" style="background-color:#edb047; border:none;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm delete-btn" href="<?= base_url('deletelevel/' . $value->id_level) ?>" style="background-color:#8F7A6E; border:none;" onclick="return confirm('Are you sure?');">
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
        var table = $('#userTable').DataTable({
            "pageLength": 5, // Show only 5 rows at a time
            "lengthMenu": [5, 10, 25, 50], // Allow user to change row limit
            "ordering": true, // Enable column sorting
            "searching": true // Enable global search
        });

        // Add individual column search
        $('#userTable thead th').each(function() {
            var title = $(this).text().trim();
            if (title !== 'Aksi') {
                $(this).html(title + '<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search ' + title + '">');
            }
        });

        // Apply column search
        table.columns().every(function() {
            var that = this;
            $('input', this.header()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that.search(this.value).draw();
                }
            });
        });
    });
    $(document).ready(function () {
        var table = $('#levelTable').DataTable({
            "pageLength": 5, // Show only 5 rows at a time
            "lengthMenu": [5, 10, 25, 50], // Allow user to change row limit
            "ordering": true, // Enable column sorting
            "searching": true // Enable global search
        });

        // Add individual column search
        $('#levelTable thead th').each(function () {
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


    // $(document).ready(function () {
    //     var table = $('#paketTable').DataTable({
    //         "pageLength": 5, // Show only 5 rows at a time
    //         "lengthMenu": [5, 10, 25, 50], // Allow user to change row limit
    //         "ordering": true, // Enable column sorting
    //         "searching": true // Enable global search
    //     });

    //     // Add individual column search
    //     $('#paketTable thead th').each(function () {
    //         var title = $(this).text().trim();
    //         if (title !== 'Aksi') {
    //             $(this).html(title + '<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search ' + title + '">');
    //         }
    //     });

    //     // Apply column search
    //     table.columns().every(function () {
    //         var that = this;
    //         $('input', this.header()).on('keyup change', function () {
    //             if (that.search() !== this.value) {
    //                 that.search(this.value).draw();
    //             }
    //         });
    //     });
    // });

    //  $(document).ready(function () {
    //     var table = $('#metodeTable').DataTable({
    //         "pageLength": 5, // Show only 5 rows at a time
    //         "lengthMenu": [5, 10, 25, 50], // Allow user to change row limit
    //         "ordering": true, // Enable column sorting
    //         "searching": true // Enable global search
    //     });

    //     // Add individual column search
    //     $('#metodeTable thead th').each(function () {
    //         var title = $(this).text().trim();
    //         if (title !== 'Aksi') {
    //             $(this).html(title + '<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search ' + title + '">');
    //         }
    //     });

    //     // Apply column search
    //     table.columns().every(function () {
    //         var that = this;
    //         $('input', this.header()).on('keyup change', function () {
    //             if (that.search() !== this.value) {
    //                 that.search(this.value).draw();
    //             }
    //         });
    //     });
    // });
</script>

</body>

</html>