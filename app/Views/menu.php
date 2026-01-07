<div id="nav-bar">
    <input id="nav-toggle" type="checkbox" />
    <div id="nav-header">
        <a id="nav-title">CLUB | ACT</a>
        <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
        <hr />
    </div>
    <div id="nav-content">

        <?php if (in_array(session()->get('level'), [1, 2, 3])): ?>
            <a class="nav-button" href="<?= base_url('/home'); ?>">
                <i class="fas fa-home"></i><span>Home</span>
            </a>
        <?php endif; ?>

        <?php if (in_array(session()->get('level'), [1, 2, 3])): ?>
            <a class="nav-button" href="<?= base_url('/jadwal'); ?>">
                <i class="fas fa-calendar"></i><span>Jadwal Ekskul</span>
            </a>
            <a class="nav-button" href="<?= base_url('/daftar'); ?>">
                <i class="fas fa-book"></i><span>Daftar Ekskul</span>
            </a>
            <a class="nav-button" href="<?= base_url('/penilaian'); ?>">
                <i class="fas fa-star"></i><span>Nilai Ekskul</span>
            </a>
            <?php if (in_array(session()->get('level'), [1, 2, 3])): ?>
                <a class="nav-button" href="<?= base_url('/absensi'); ?>">
                    <i class="fas fa-list-check"></i><span>Absensi Ekskul</span>
                </a>
                <?php if (session()->get('level') == 1): ?>
                    <a class="nav-button" href="<?= base_url('/tampildata'); ?>">
                        <i class="fas fa-table"></i><span>List Data</span>
                    </a>
                    <a class="nav-button" href="<?= base_url('/formdata'); ?>">
                        <i class="fas fa-plus-square"></i><span>Input Data</span>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
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