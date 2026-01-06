<div id="nav-bar">
    <input id="nav-toggle" type="checkbox" />
    <div id="nav-header">
        <a id="nav-title">CLUB | ACT</a>
        <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
        <hr/>
    </div>
    <div id="nav-content">

        <?php if (in_array(session()->get('level'), [1,2,3,4,5])): ?>
            <a class="nav-button" href="<?= base_url('/home'); ?>">
                <i class="fas fa-home"></i><span>Home</span>
            </a>
            <?php if (session()->get('level') == 5): ?>
            <a class="nav-button" href="<?= base_url('home/pesananSaya'); ?>">
                <i class="fas fa-history"></i><span>Histori Pesanan</span>
            </a>
             <?php endif; ?>
        <?php endif; ?>

        <?php if (in_array(session()->get('level'), [1,2,3,4,6])): ?>
            <a class="nav-button" href="<?= base_url('/tampildata'); ?>">
                <i class="fas fa-table"></i><span>List Data</span>
            </a>
            <a class="nav-button" href="<?= base_url('/formdata'); ?>">
                <i class="fas fa-plus-square"></i><span>Input Data</span>
            </a>

            <?php if (in_array(session()->get('level'), [1,2])): ?>
                <!-- <a class="nav-button" href="<?= base_url('admin/tampiluser'); ?>">
                    <i class="fas fa-users"></i><span>Users</span>
                </a> -->

                <?php if (session()->get('level') == 1): ?>
                    <!-- <a class="nav-button" href="<?= base_url('admin/deleted_data'); ?>">
                        <i class="fas fa-trash"></i><span>Deleted Data</span>
                    </a> -->
                <?php endif; ?>

                <!-- <a class="nav-button" href="<?= base_url('admin/log_activity'); ?>">
                    <i class="fas fa-clipboard-list"></i><span>Logs</span>
                </a> -->
            <?php endif; ?>

            <!-- <a class="nav-button" href="<?= base_url('home/tampiltransaksi'); ?>">
                <i class="fas fa-file-invoice-dollar"></i><span>Tabel Transaksi</span>
            </a> -->
        <?php endif; ?>

        <div id="nav-content-highlight"></div>
    </div>
    <input id="nav-footer-toggle" type="checkbox" />
    <div id="nav-footer">
        <div class="ms-4">
            <div id="google_translate_element"></div> <!-- Auto-Translate Dropdown -->
        </div>
    </div>
</div>

<script>
  window.addEventListener('DOMContentLoaded', () => {
    document.getElementById('nav-toggle').checked = true; // Collapse by default
});
</script>
