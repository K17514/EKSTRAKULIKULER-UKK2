
<section class="latest-podcast-section d-flex align-items-center justify-content-center pb-5" id="section_2" style="padding-top: 100px; background-color:#E0DBD8;">
    <div class="container">
        <div class="col-lg-12 col-12 mt-5 mb-4 mb-lg-4">
            <div class="custom-block d-flex flex-column" style="background-color:#FAF5F1; border-radius:16px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">

                <ul class="nav nav-tabs mb-4" id="inputTabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user-table" type="button" role="tab" >Tabel User</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="level-tab" data-bs-toggle="tab" data-bs-target="#level-table" type="button" role="tab" >Tabel Level</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="siswa-tab" data-bs-toggle="tab" data-bs-target="#siswa-table" type="button" role="tab" >Tabel Siswa</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="kelas-tab" data-bs-toggle="tab" data-bs-target="#kelas-table" type="button" role="tab" >Tabel Kelas</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="jurusan-tab" data-bs-toggle="tab" data-bs-target="#jurusan-table" type="button" role="tab" >Tabel Jurusan</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="rombel-tab" data-bs-toggle="tab" data-bs-target="#rombel-table" type="button" role="tab" >Tabel Rombel</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="guru-tab" data-bs-toggle="tab" data-bs-target="#guru-table" type="button" role="tab" >Tabel Guru</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="ekskul-tab" data-bs-toggle="tab" data-bs-target="#ekskul-table" type="button" role="tab" >Tabel Ekskul</button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="inputTabsContent">


                <!-- user Table -->
                <div class="tab-pane fade show active" id="user-table" role="tabpanel">
                    <a href="<?= base_url('/formdata')?>" class="btn btn-success mb-3" style="align-self: flex-start; background-color:#292F36; border:none;">
                        <i class="fa fa-user-plus me-1"></i> + Tambah User
                    </a>            
                    <table id="productTable" class="table table-hover datatable" style="background-color: #ffffff; border-radius: 10px; overflow: hidden;">
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

                    <!-- siswa Table -->
                    <div class="tab-pane fade " id="siswa-table" role="tabpanel">
                        <a href="<?= base_url('/formdata') ?>" class="btn btn-success mb-3" style="align-self: flex-start; background-color:#292F36; border:none;">
                            <i class="fa fa-level-plus me-1"></i> + Tambah Siswa
                        </a>
                        <table id="siswaTable" class="table table-hover datatable" style="background-color: #ffffff; border-radius: 10px; overflow: hidden;">
                            <thead style="background-color:#A41F13; color:#ffffff;">
                                <tr>
                                    <th>No<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search No"></th>
                                    <th>Nama Siswa<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Nama"></th>
                                    <th>Nis<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Nis"></th>
                                    <th>Jenis Kelamin<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Jenis Kelamin"></th>
                                    <th>Tanggal Lahir<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Tanggal Lahir"></th>
                                    <th>Rombel<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Rombel"></th>
                                    <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) { ?>
                                        <th>Aksi</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ms = 1;
                                foreach ($siswa as $key => $value) {
                                ?>
                                    <tr style="background-color: white;" onmouseover="this.style.backgroundColor='darkwhite'; this.style.color='black';" onmouseout="this.style.backgroundColor='white'; this.style.color='';">
                                        <td><?= $ms++ ?></td>
                                        <td><?= $value->nama_siswa ?></td>
                                        <td><?= $value->nis ?></td>
                                        <td><?= $value->jenis_kelamin ?></td>
                                        <td><?= $value->tanggal_lahir ?></td>
                                        <td><?= $value->nama_rombel ?></td>
                                        <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) { ?>
                                            <td>
                                                <a href="<?= base_url('/editsiswa/' . $value->id_siswa) ?>" class="btn btn-warning btn-sm" style="background-color:#edb047; border:none;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm delete-btn" href="<?= base_url('deletesiswa/' . $value->id_siswa) ?>" style="background-color:#8F7A6E; border:none;" onclick="return confirm('Are you sure?');">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- kelas Table -->
                    <div class="tab-pane fade " id="kelas-table" role="tabpanel">
                        <a href="<?= base_url('/formdata') ?>" class="btn btn-success mb-3" style="align-self: flex-start; background-color:#292F36; border:none;">
                            <i class="fa fa-level-plus me-1"></i> + Tambah Kelas
                        </a>
                        <table id="kelasTable" class="table table-hover datatable" style="background-color: #ffffff; border-radius: 10px; overflow: hidden;">
                            <thead style="background-color:#A41F13; color:#ffffff;">
                                <tr>
                                    <th>No<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search No"></th>
                                    <th>Nama Kelas<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Nama"></th>
                                    <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) { ?>
                                        <th>Aksi</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ms = 1;
                                foreach ($kelas as $key => $value) {
                                ?>
                                    <tr style="background-color: white;" onmouseover="this.style.backgroundColor='darkwhite'; this.style.color='black';" onmouseout="this.style.backgroundColor='white'; this.style.color='';">
                                        <td><?= $ms++ ?></td>
                                        <td><?= $value->nama_kelas ?></td>
                                        <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) { ?>
                                            <td>
                                                <a href="<?= base_url('/editkelas/' . $value->id_kelas) ?>" class="btn btn-warning btn-sm" style="background-color:#edb047; border:none;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm delete-btn" href="<?= base_url('deletekelas/' . $value->id_kelas) ?>" style="background-color:#8F7A6E; border:none;" onclick="return confirm('Are you sure?');">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- jurusan Table -->
                    <div class="tab-pane fade " id="jurusan-table" role="tabpanel">
                        <a href="<?= base_url('/formdata') ?>" class="btn btn-success mb-3" style="align-self: flex-start; background-color:#292F36; border:none;">
                            <i class="fa fa-level-plus me-1"></i> + Tambah Jurusan
                        </a>
                        <table id="jurusanTable" class="table table-hover datatable" style="background-color: #ffffff; border-radius: 10px; overflow: hidden;">
                            <thead style="background-color:#A41F13; color:#ffffff;">
                                <tr>
                                    <th>No<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search No"></th>
                                    <th>Nama Jurusan<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Nama"></th>
                                    <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) { ?>
                                        <th>Aksi</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ms = 1;
                                foreach ($jurusan as $key => $value) {
                                ?>
                                    <tr style="background-color: white;" onmouseover="this.style.backgroundColor='darkwhite'; this.style.color='black';" onmouseout="this.style.backgroundColor='white'; this.style.color='';">
                                        <td><?= $ms++ ?></td>
                                        <td><?= $value->nama_jurusan ?></td>
                                        <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) { ?>
                                            <td>
                                                <a href="<?= base_url('/editjurusan/' . $value->id_jurusan) ?>" class="btn btn-warning btn-sm" style="background-color:#edb047; border:none;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm delete-btn" href="<?= base_url('deletejurusan/' . $value->id_jurusan) ?>" style="background-color:#8F7A6E; border:none;" onclick="return confirm('Are you sure?');">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>



                    <!-- rombel Table -->
                    <div class="tab-pane fade " id="rombel-table" role="tabpanel">
                        <a href="<?= base_url('/formdata') ?>" class="btn btn-success mb-3" style="align-self: flex-start; background-color:#292F36; border:none;">
                            <i class="fa fa-level-plus me-1"></i> + Tambah Rombel
                        </a>
                        <table id="rombelTable" class="table table-hover datatable" style="background-color: #ffffff; border-radius: 10px; overflow: hidden;">
                            <thead style="background-color:#A41F13; color:#ffffff;">
                                <tr>
                                    <th>No<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search No"></th>
                                    <th>Nama Rombel<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Nama"></th>
                                    <th>Kelas<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Kelas"></th>
                                    <th>Jurusan<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Jurusan"></th>
                                    <th>Guru<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Guru"></th>
                                    <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) { ?>
                                        <th>Aksi</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ms = 1;
                                foreach ($rombel as $key => $value) {
                                ?>
                                    <tr style="background-color: white;" onmouseover="this.style.backgroundColor='darkwhite'; this.style.color='black';" onmouseout="this.style.backgroundColor='white'; this.style.color='';">
                                        <td><?= $ms++ ?></td>
                                        <td><?= $value->nama_rombel ?></td>
                                        <td><?= $value->nama_kelas ?></td>
                                        <td><?= $value->nama_jurusan ?></td>
                                        <td><?= $value->nama_guru ?></td>
                                        <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) { ?>
                                            <td>
                                                <a href="<?= base_url('/editrombel/' . $value->id_rombel) ?>" class="btn btn-warning btn-sm" style="background-color:#edb047; border:none;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm delete-btn" href="<?= base_url('deleterombel/' . $value->id_rombel) ?>" style="background-color:#8F7A6E; border:none;" onclick="return confirm('Are you sure?');">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Guru Table -->
                    <div class="tab-pane fade " id="guru-table" role="tabpanel">
                        <a href="<?= base_url('/formdata') ?>" class="btn btn-success mb-3" style="align-self: flex-start; background-color:#292F36; border:none;">
                            <i class="fa fa-level-plus me-1"></i> + Tambah Guru
                        </a>
                        <table id="guruTable" class="table table-hover datatable" style="background-color: #ffffff; border-radius: 10px; overflow: hidden;">
                            <thead style="background-color:#A41F13; color:#ffffff;">
                                <tr>
                                    <th>No<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search No"></th>
                                    <th>Nama Guru<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Nama"></th>
                                    <th>Nip<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Nip"></th>
                                    <th>Jenis Kelamin<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Jenis Kelamin"></th>
                                    <th>Tanggal Lahir<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Tanggal Lahir"></th>      
                                    <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) { ?>
                                        <th>Aksi</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php
                                $ms = 1;
                                foreach ($guru as $key => $value) {
                                ?>
                                    <tr style="background-color: white;" onmouseover="this.style.backgroundColor='darkwhite'; this.style.color='black';" onmouseout="this.style.backgroundColor='white'; this.style.color='';">
                                        <td><?= $ms++ ?></td>
                                        <td><?= $value->nama_guru ?></td>
                                        <td><?= $value->nip ?></td>
                                        <td><?= $value->jenis_kelamin ?></td>
                                        <td><?= $value->tanggal_lahir ?></td>
                                        <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) { ?>
                                            <td>
                                                <a href="<?= base_url('/editguru/' . $value->id_guru) ?>" class="btn btn-warning btn-sm" style="background-color:#edb047; border:none;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm delete-btn" href="<?= base_url('deleteguru/' . $value->id_guru) ?>" style="background-color:#8F7A6E; border:none;" onclick="return confirm('Are you sure?');">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>



                    <!-- ekskul Table -->
                    <div class="tab-pane fade " id="ekskul-table" role="tabpanel">
                        <a href="<?= base_url('/formdata') ?>" class="btn btn-success mb-3" style="align-self: flex-start; background-color:#292F36; border:none;">
                            <i class="fa fa-level-plus me-1"></i> + Tambah Ekskul
                        </a>    
                        <table id="ekskulTable" class="table table-hover datatable" style="background-color: #ffffff; border-radius: 10px; overflow: hidden;">
                            <thead style="background-color:#A41F13; color:#ffffff;">
                                <tr>
                                    <th>No<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search No"></th>
                                    <th>Nama Ekskul<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Nama"></th>
                                    <th>Guru<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Guru"></th>
                                    <th>Kuota<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Kuota"></th>
                                    <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) { ?>
                                        <th>Aksi</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ms = 1;
                                foreach ($ekskul as $key => $value) {
                                ?>
                                    <tr style="background-color: white;" onmouseover="this.style.backgroundColor='darkwhite'; this.style.color='black';" onmouseout="this.style.backgroundColor='white'; this.style.color='';">
                                        <td><?= $ms++ ?></td>
                                        <td><?= $value->nama_ekskul ?></td>
                                        <td><?= $value->nama_guru ?></td>
                                        <td><?= $value->kuota ?></td>
                                        <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) { ?>
                                            <td>
                                                <a href="<?= base_url('/editekskul/' . $value->id_ekskul) ?>" class="btn btn-warning btn-sm" style="background-color:#edb047; border:none;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm delete-btn" href="<?= base_url('deleteekskul/' . $value->id_ekskul) ?>" style="background-color:#8F7A6E; border:none;" onclick="return confirm('Are you sure?');">
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
$(document).ready(function () {

    function initDataTable(tableId) {
        var table = $(tableId).DataTable({
            pageLength: 5,
            lengthMenu: [5, 10, 25, 50],
            ordering: true,
            searching: true
        });

        // Column search
        $(tableId + ' thead th').each(function (index) {
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

        table.columns().every(function () {
            var that = this;
            $('input', this.header()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that.search(this.value).draw();
                }
            });
        });
    }

    // INIT ALL TABLES
    initDataTable('#userTable');
    initDataTable('#levelTable');
    initDataTable('#siswaTable');
    initDataTable('#kelasTable');
    initDataTable('#jurusanTable');
    initDataTable('#rombelTable');
    initDataTable('#guruTable');
    initDataTable('#ekskulTable');

});
</script>


</body>

</html>