<section class="d-flex align-items-center justify-content-center pb-5" style="padding-top: 100px; background-color: #E0DBD8;">
  <div class="container">
    <div class="col-lg-12 col-12 mt-5 mb-4 mb-lg-4">
      <div class="d-flex flex-column" style="background-color: #FAF5F1; padding: 2rem; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); color: #292F36;">
        
        <h3 style="color: #292F36; font-weight: bold; margin-bottom: 1.5rem;">Edit Paket</h3>

       <form action="<?= base_url('home/simpan_paket') ?>" method="POST">
        <input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">

        <div class="mb-3">
            <label for="nama_paket" class="form-label">Nama Paket</label>
            <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="<?= $paket['nama_paket'] ?>" required>
        </div>

        <label for="editorPaket" class="form-label">Deskripsi Paket</label>
        <div id="editorPaket" class="h-40 border rounded mb-2"><?= $paket['deskripsi'] ?></div>
        <input type="hidden" name="deskripsi" id="hiddenDeskripsiPaket" value="<?= $paket['deskripsi'] ?>" required>

        <div class="mb-3">
            <label for="harga_paket" class="form-label">Harga Paket</label>
            <input type="number" class="form-control" id="harga_paket" name="harga_paket" value="<?= $paket['harga_paket'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Isi Produk dalam Paket</label>
            <div id="produk-container">
                <?php foreach ($paket['produk'] as $produk): ?>
    <div class="row mb-2">
        <div class="col-md-8">
            <select class="form-control" name="produk_ids[]">
                <option value="">-- Pilih Produk --</option>
                <?php foreach ($produkList as $item): ?>
                  <option value="<?= $item->id_produk ?>" <?= $item->id_produk == $produk['id_produk'] ? 'selected' : '' ?>>
                    <?= $item->nama_produk ?> - Rp <?= number_format($item->harga, 0, ',', '.') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
        <div class="col-md-3">
            <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" value="<?= $produk['qty'] ?>" required>
        </div>
        <div class="col-md-1">
            <button type="button" class="btn btn-danger btn-remove">-</button>
        </div>
    </div>
<?php endforeach; ?>

            </div>
            <button type="button" class="btn btn-secondary mt-2" id="add-produk">+ Tambah Produk</button>
        </div>

        <button type="submit" class="btn btn-success mt-3" style="background-color: #A41F13;">Update Paket</button>
    </form>

      </div>
    </div>
  </div>
</section>

<script>

document.addEventListener("DOMContentLoaded", function () {
    var quill = new Quill('#editorPaket', {
        theme: 'snow',
        placeholder: 'Tulis deskripsi paket...',
        modules: {
            toolbar: [
                [{ header: [1, 2, false] }],
                ['bold', 'italic', 'underline'],
                [{ list: 'ordered' }, { list: 'bullet' }],
                ['link'], ['clean'],
            ]
        }
    });

    document.querySelector('form').addEventListener('submit', function () {
  const deskripsiHTML = quill.root.innerHTML; // Misal `quill` adalah instance editornya
  document.getElementById('hiddenDeskripsiPaket').value = deskripsiHTML;
});


    // Dynamic produk row
    const container = document.getElementById("produk-container");
    const addBtn = document.getElementById("add-produk");

    addBtn.addEventListener("click", function () {
        const row = document.createElement("div");
        row.className = "row mb-2";
        row.innerHTML = `
          <div class="col-md-8">
            <select class="form-control" name="produk_ids[]">
              <option value="">-- Pilih Produk --</option>
              <?php foreach ($produkList as $prod): ?>
              <option value="<?= $prod->id_produk ?>"><?= $prod->nama_produk ?> - Rp <?= number_format($prod->harga, 0, ',', '.') ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-3">
            <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" required>
          </div>
          <div class="col-md-1">
            <button type="button" class="btn btn-danger btn-remove">-</button>
          </div>
        `;
        container.appendChild(row);
    });

    container.addEventListener("click", function (e) {
        if (e.target.classList.contains("btn-remove")) {
            e.target.closest(".row").remove();
        }
    });
});
</script>
