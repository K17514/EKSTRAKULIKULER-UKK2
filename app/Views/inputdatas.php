<section class="d-flex align-items-center justify-content-center pb-5" style="padding-top: 100px; background-color: #E0DBD8;">
  <div class="container">
    <div class="col-lg-12 col-12 mt-5 mb-4 mb-lg-4">
      <div class="d-flex flex-column" style="background-color: #FAF5F1; padding: 2rem; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); color: #292F36;">

        <!-- Nav Tabs -->
        <ul class="nav nav-tabs mb-4" id="inputTabs" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user-form" type="button" role="tab">Tambah User</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="level-tab" data-bs-toggle="tab" data-bs-target="#level-form" type="button" role="tab">Tambah Level</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="siswa-tab" data-bs-toggle="tab" data-bs-target="#siswa-form" type="button" role="tab">Tambah Siswa</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="kelas-tab" data-bs-toggle="tab" data-bs-target="#kelas-form" type="button" role="tab">Tambah Kelas</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="jurusan-tab" data-bs-toggle="tab" data-bs-target="#jurusan-form" type="button" role="tab">Tambah Jurusan</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="rombel-tab" data-bs-toggle="tab" data-bs-target="#rombel-form" type="button" role="tab">Tambah Rombel</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="guru-tab" data-bs-toggle="tab" data-bs-target="#guru-form" type="button" role="tab">Tambah Guru</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="ekskul-tab" data-bs-toggle="tab" data-bs-target="#ekskul-form" type="button" role="tab">Tambah Ekskul</button>
          </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="inputTabsContent">

          <!-- User Form -->
          <div class="tab-pane fade show active" id="user-form" role="tabpanel">
            <h3 style="font-weight: bold; margin-bottom: 1.5rem; color: #292F36;">Tambah User</h3>
            <form action="<?= base_url('/inputuser') ?>" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select class="form-control" name="level" required>
                  <option value="">--Pilih Level</option>
                  <?php foreach ($level as $l): ?>
                    <option value="<?= $l->id_level ?>"><?= $l->nama_level ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
              </div>
              <button type="submit" class="btn btn-success" style="background-color: #A41F13">Simpan</button>
            </form>
          </div>

          <!-- Level Form -->
          <div class="tab-pane fade" id="level-form" role="tabpanel">
            <h3 style="font-weight: bold; margin-bottom: 1.5rem;">Tambah Level</h3>
            <form action="<?= base_url('/inputlevel') ?>" method="POST">
              <div class="mb-3">
                <label for="nama_level" class="form-label">Nama Level</label>
                <input type="text" class="form-control" id="nama_level" name="nama_level" required>
              </div>
              <button type="submit" class="btn btn-primary" style="background-color: #A41F13">Simpan</button>
            </form>
          </div>

          <!-- Siswa Form -->
          <div class="tab-pane fade" id="siswa-form" role="tabpanel">
            <h3 style="font-weight: bold; margin-bottom: 1.5rem;">Tambah Siswa</h3>
            <form action="<?= base_url('/inputsiswa') ?>" method="POST">

              <div class="mb-3">
                <label class="form-label">NIS</label>
                <input type="text" class="form-control" name="nis" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" name="nama_siswa" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Rombel</label>
                <select class="form-control" name="id_rombel" required>
                  <option value="">--Pilih Rombel--</option>
                  <?php foreach ($rombel as $r): ?>
                    <option value="<?= $r->id_rombel ?>"><?= $r->nama_rombel ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin" required>
                  <option value="">-- Pilih --</option>
                  <option value="laki-laki">Laki-laki</option>
                  <option value="perempuan">Perempuan</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" class="form-control" name="no_hp" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" rows="3" required></textarea>
              </div>


              <hr>

              <h5>Data User</h5>

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

              <button type="submit" class="btn btn-success" style="background-color:#A41F13">
                Simpan
              </button>

            </form>
          </div>


          <!-- Kelas Form -->
          <div class="tab-pane fade" id="kelas-form" role="tabpanel">
            <h3 style="font-weight: bold; margin-bottom: 1.5rem;">Tambah Kelas</h3>
            <form action="<?= base_url('/inputkelas') ?>" method="POST">
              <div class="mb-3">
                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
              </div>
              <button type="submit" class="btn btn-primary" style="background-color: #A41F13">Simpan</button>
            </form>
          </div>

          <!-- Jurusan Form -->
          <div class="tab-pane fade" id="jurusan-form" role="tabpanel">
            <h3 style="font-weight: bold; margin-bottom: 1.5rem;">Tambah Jurusan</h3>
            <form action="<?= base_url('/inputjurusan') ?>" method="POST">
              <div class="mb-3">
                <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" required>
              </div>
              <button type="submit" class="btn btn-primary" style="background-color: #A41F13">Simpan</button>
            </form>
          </div>

          <!-- Rombel Form -->
          <div class="tab-pane fade" id="rombel-form" role="tabpanel">
            <h3 style="font-weight: bold; margin-bottom: 1.5rem;">Tambah Rombel</h3>
            <form action="<?= base_url('/inputrombel') ?>" method="POST">
              <div class="mb-3">
                <label for="nama_rombel" class="form-label">Nama Rombel</label>
                <input type="text" class="form-control" id="nama_rombel" name="nama_rombel" required>
              </div>
              <div class="mb-3">
                <label for="id_kelas" class="form-label">Kelas</label>
                <select class="form-control" name="id_kelas" required>
                  <option value="">--Pilih Kelas</option>
                  <?php foreach ($kelas as $k): ?>
                    <option value="<?= $k->id_kelas ?>"><?= $k->nama_kelas ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="id_jurusan" class="form-label">Jurusan</label>
                <select class="form-control" name="id_jurusan" required>
                  <option value="">--Pilih Jurusan</option>
                  <?php foreach ($jurusan as $j): ?>
                    <option value="<?= $j->id_jurusan ?>"><?= $j->nama_jurusan ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="id_guru" class="form-label">Guru</label>
                <select class="form-control" name="id_guru" required>
                  <option value="">--Pilih Guru</option>
                  <?php foreach ($guru as $g): ?>
                    <option value="<?= $g->id_guru ?>"><?= $g->nama_guru ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <button type="submit" class="btn btn-success" style="background-color: #A41F13">Simpan</button>
            </form>
          </div>

          <!-- Guru Form -->
          <div class="tab-pane fade" id="guru-form" role="tabpanel">
            <h3 style="font-weight: bold; margin-bottom: 1.5rem;">Tambah Guru</h3>

            <form action="<?= base_url('/inputguru') ?>" method="POST">

              <div class="mb-3">
                <label class="form-label">NIP</label>
                <input type="text" class="form-control" name="nip" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Nama Guru</label>
                <input type="text" class="form-control" name="nama_guru" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin" required>
                  <option value="">-- Pilih --</option>
                  <option value="laki-laki">Laki-laki</option>
                  <option value="perempuan">Perempuan</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" class="form-control" name="no_hp" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" rows="3" required></textarea>
              </div>

              <hr>

              <h5>Data User</h5>

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

              <button type="submit" class="btn btn-success" style="background-color:#A41F13">
                Simpan
              </button>

            </form>
          </div>


          <!-- Ekskul Form -->
          <div class="tab-pane fade" id="ekskul-form" role="tabpanel">
            <h3 style="font-weight: bold; margin-bottom: 1.5rem;">Tambah Ekskul</h3>
            <form action="<?= base_url('/inputekskul') ?>" method="POST">
              <div class="mb-3">
                <label for="nama_ekskul" class="form-label">Nama Ekskul</label>
                <input type="text" class="form-control" id="nama_ekskul" name="nama_ekskul" required>
              </div>
              <div class="mb-3">
                <label for="id_instruktur" class="form-label">Instruktur (Guru)</label>
                <select class="form-control" name="id_instruktur" required>
                  <option value="">--Pilih Guru</option>
                  <?php foreach ($guru as $g): ?>
                    <option value="<?= $g->id_guru ?>"><?= $g->nama_guru ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="kuota" class="form-label">Kuota</label>
                <input type="number" class="form-control" id="kuota" name="kuota" required>
              </div>
              <button type="submit" class="btn btn-success" style="background-color: #A41F13">Simpan</button>
            </form>
          </div>

        </div>

      </div>
    </div>
  </div>
</section>