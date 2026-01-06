
<section class="latest-podcast-section d-flex align-items-center justify-content-center pb-5" id="section_2" style="padding-top: 100px; background-color:#E0DBD8;">
    <div class="container">
        <div class="col-lg-12 col-12 mt-5 mb-4 mb-lg-4">
            <div class="custom-block d-flex flex-column" style="background-color:#FAF5F1; border-radius:16px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">
                <table id="logTable" class="table table-hover datatable" style="background-color: #ffffff; border-radius: 10px; overflow: hidden;">
                    <thead style="background-color:#A41F13; color:#ffffff;">
                        <tr>
                            <th>Username<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Username"></th>
                            <th>Email<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Email"></th>
                            <th>Time<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Time"></th>
                            <th>Activity<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search Activity"></th>
                            <th>IP Address<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search IP Address"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($child as $log) : ?>
                            <tr style="background-color: white;" onmouseover="this.style.backgroundColor='darkwhite'; this.style.color='black';" onmouseout="this.style.backgroundColor='white'; this.style.color='';">
                                <td><?= $log->username ?></td>
                                <td><?= $log->email ?></td>
                                <td><?= $log->happens_at ?></td>
                                <td><?= $log->what_happens ?></td>
                                <td><?= $log->ip_address ?></td>
                            </tr>
                        <?php endforeach; ?>
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
        var table = $('#logTable').DataTable({
            "pageLength": 5, // Show only 5 rows at a time
            "lengthMenu": [5, 10, 25, 50], // Allow user to change row limit
            "ordering": true, // Enable column sorting
            "searching": true // Enable global search
        });

        // Add individual column search
        $('#logTable thead th').each(function () {
            var title = $(this).text();
            $(this).html(title + '<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search ' + title + '">');
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