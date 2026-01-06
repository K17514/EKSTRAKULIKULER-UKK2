<section class="d-flex align-items-center justify-content-center pb-5"
  style="padding-top: 100px; background-color: #E0DBD8;">
  <div class="container">
    <div class="col-lg-12 col-12 mt-5 mb-4 mb-lg-4">
      <div class="d-flex flex-column"
        style="background-color: #FAF5F1; padding: 2rem; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); color: #292F36;">

        <!-- Nav Tabs -->
        <ul class="nav nav-tabs mb-4" id="inputTabs" role="tablist">
          <li class="nav-item">
            <button class="nav-link active"
              data-bs-toggle="tab"
              data-bs-target="#user-form"
              type="button">
              Tambah User
            </button>
          </li>
          <li class="nav-item">
            <button class="nav-link"
              data-bs-toggle="tab"
              data-bs-target="#level-form"
              type="button">
              Tambah Level
            </button>
          </li>
        </ul>

        <!-- TAB CONTENT -->
        <div class="tab-content" id="inputTabsContent">

          <!-- TAB USER -->
          <div class="tab-pane fade show active" id="user-form">
            <h3 class="fw-bold mb-4">Tambah User</h3>

            <form action="<?= base_url('/inputuser') ?>" method="POST">
              <?= csrf_field() ?>

              <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Level</label>
                <select class="form-control" name="level" required>
                  <option value="">-- Pilih Level --</option>
                  <option value="1">Admin</option>
                  <option value="2">Guru</option>
                  <option value="3">Siswa</option>
                </select>
              </div>

              <button type="submit" class="btn text-white" style="background-color:#A41F13">
                Simpan
              </button>
            </form>
          </div>

          <!-- TAB LEVEL -->
          <div class="tab-pane fade" id="level-form">
            <h3 class="fw-bold mb-4">Tambah Level</h3>

            <form action="<?= base_url('/inputlevel') ?>" method="POST">
              <?= csrf_field() ?>

              <div class="mb-3">
                <label class="form-label">Nama Level</label>
                <input type="text" class="form-control" name="nama_level" required>
              </div>

              <button type="submit" class="btn text-white" style="background-color:#A41F13">
                Simpan
              </button>
            </form>
          </div>

        </div><!-- tab-content -->
      </div><!-- card wrapper -->
    </div>
  </div>
</section>
