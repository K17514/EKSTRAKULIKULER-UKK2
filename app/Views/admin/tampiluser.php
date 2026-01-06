
<section class="latest-podcast-section d-flex align-items-center justify-content-center pb-5" id="section_2" style="padding-top: 100px; background-color:#E0DBD8;">
    <div class="container">
        <div class="col-lg-12 col-12 mt-5 mb-4 mb-lg-4">
            <div class="custom-block d-flex flex-column" style="background-color:#FAF5F1; border-radius:16px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">
                <a href="<?= base_url('admin/formuser')?>" class="btn btn-success mb-3" style="align-self: flex-start; background-color:#292F36; border:none;">
                    <i class="fa fa-user-plus me-1"></i> + Tambah User
                </a>            
                <table id="userTable" class="table table-hover datatable" style="background-color: #ffffff; border-radius: 10px; overflow: hidden;">
                    <thead style="background-color:#A41F13; color:#ffffff;">
                        <tr>
                            <th>No<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Username"></th>
                            <th>Username<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Email"></th>
                            <th>Email<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Time"></th>
                            <th>Level<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Activity"></th>
                            <?php if (session()->get('level')==1 || session()->get('level')== 2) { ?>
                                <th>Aksi</th>
                            <?php } ?>
                        </tr>
                    </thead>
                   <tbody>
                        <?php
                        $ms = 1;
                        foreach ($child as $key => $value) {
                            $role = ($value->level == 1) ? 'HACKER' : 
                            (($value->level == 2) ? 'admin' : 
                                (($value->level == 3) ? 'Barista' : 
                                    (($value->level == 4) ? 'Head Kitchen' : 
                                        (($value->level == 6) ? 'Kasir' : 
                                            (($value->level == 5) ? 'user' : $value->username)))));

                        ?>
                        <tr style="background-color: white;" onmouseover="this.style.backgroundColor='darkwhite'; this.style.color='black';" onmouseout="this.style.backgroundColor='white'; this.style.color='';">
                            <td><?= $ms++ ?></td>
                            <td><?= $value->username ?></td>
                            <td><?= $value->email ?></td>
                            <td><?= $role ?></td>
                            <?php if (session()->get('level') == 1 || session()->get('level') == 2) { ?>
                                <td>
                                    <a href="<?= base_url('admin/edit_user/'.$value->id_user)?>" class="btn btn-warning btn-sm" style="background-color:#edb047; border:none;">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm delete-btn" href="<?= base_url('admin/hapus_user/' . $value->id_user) ?>" style="background-color:#8F7A6E; border:none;">
                                        <i class="fa fa-trash"></i> Hapus
                                    </a>
                                    <?php if (session()->get('level') == 1) { ?>
                                        <a href="<?= base_url('admin/detailuser/' . $value->id_user) ?>" class="btn btn-sm btn-info detail-btn">
                                            <i class="fa fa-circle-info"></i>
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
</section>

    </main>

<!-- DataTables CSS -->
<!-- jQuery (Load First) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<!-- DataTables JS (Must be after jQuery) -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        var table = $('#userTable').DataTable({
            "pageLength": 5, // Show only 5 rows at a time
            "lengthMenu": [5, 10, 25, 50], // Allow user to change row limit
            "ordering": true, // Enable column sorting
            "searching": true // Enable global search
        });

        // Add individual column search
        $('#userTable thead th').each(function () {
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
</script>

</body>

</html>