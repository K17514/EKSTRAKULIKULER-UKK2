<section class="d-flex align-items-center justify-content-center pb-5" style="padding-top: 100px; background-color: #E0DBD8;">
  <div class="container">
    <div class="col-lg-12 col-12 mt-5 mb-4 mb-lg-4">
      <div class="row d-flex flex-column flex-lg-row align-items-center" style="background-color: #FAF5F1; padding: 2rem; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); color: #292F36;">
        
        <!-- FOTO PRODUK -->
        <div class="col-lg-5 mb-4 mb-lg-0 text-center">
          <img src="<?=base_url('images/' . $child->foto)?>" alt="Foto Produk" style="max-width: 100%; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
        </div>

        <!-- FORM -->
        <div class="col-lg-7">
          <h3 style="color: #292F36; font-weight: bold; margin-bottom: 1.5rem;"><?=$child->nama_produk?></h3>
          
          <form action="<?= base_url('home/pesan') ?>" method="POST" enctype="multipart/form-data">
            <table style="width: 100%;">
              <tr>
                <td style="padding-bottom: 10px;"><label for="harga" style="font-weight: 500; color: #292F36;">Harga</label></td>
                <td style="padding-bottom: 10px;">
                  <input type="text" class="form-control" id="harga" name="harga" 
                  value="Rp <?= number_format($child->harga, 0, ',', '.') ?>" 
                  style="border: 1px solid #8F7A6E; border-radius: 8px; padding: 0.6rem; width: 100%;" disabled>

                </td>
              </tr>

              <tr>
                <td style="padding-bottom: 10px;"><label for="jumlah" style="font-weight: 500; color: #292F36;">Jumlah</label></td>
                <td style="padding-bottom: 10px;">
                  <div class="input-group" style="width: 150px;">
                    <button type="button" class="btn btn-outline-secondary" onclick="updateJumlah(-1)">−</button>
                    <input type="number" class="form-control text-center" id="jumlah" name="jumlah" value="1" min="1">
                    <button type="button" class="btn btn-outline-secondary" onclick="updateJumlah(1)">+</button>
                  </div>
                </td>
              </tr>

              <tr>
                <td style="padding-bottom: 10px;"><label for="catatan" style="font-weight: 500; color: #292F36;">Catatan</label></td>
                <td style="padding-bottom: 10px;">
                  <textarea class="form-control" id="catatan" name="catatan" placeholder="Ada yang perlu kami tau?" style="border: 1px solid #8F7A6E; border-radius: 8px; padding: 0.6rem; width: 100%;"></textarea>
                </td>
              </tr>

              <tr>
                <td></td>
                <td style="padding-top: 10px;">
                  <input type="hidden" value="<?= $child->id_produk ?>" name="id">
                  <button type="submit" class="btn" style="background-color: #A41F13; color: white; border: none; padding: 0.5rem 1rem; border-radius: 6px; font-weight: 600;">Tambahkan Pesanan</button>
                  <button type="button" class="btn" style="background-color: #8F7A6E; color: white; border: none; padding: 0.5rem 1rem; border-radius: 6px;" onclick="window.history.back()">Kembali</button>
                  <strong id="totalHarga" style="margin-left: auto;">Total: Rp <?= number_format($child->harga, 0, ',', '.') ?></strong>
                </td>
              </tr>
            </table>
          </form>
        </div>

      </div>
    </div>
  </div>
</section>
<script>
  function updateJumlah(change) {
  const input = document.getElementById('jumlah');
  let current = parseInt(input.value);
  if (!isNaN(current)) {
    current += change;
    if (current < 1) current = 1;
    input.value = current;
    updateTotal(); // tambahkan ini
  }
}


   const hargaSatuan = <?= $child->harga ?>;
  const jumlahInput = document.getElementById('jumlah');
  const totalHarga = document.getElementById('totalHarga');

  function updateTotal() {
    const jumlah = parseInt(jumlahInput.value) || 0;
    const total = hargaSatuan * jumlah;
    totalHarga.textContent = "Total: Rp " + total.toLocaleString("id-ID");
  }

  jumlahInput.addEventListener('input', updateTotal);
  document.getElementById('minusBtn').addEventListener('click', updateTotal);
  document.getElementById('plusBtn').addEventListener('click', updateTotal);

  // Update saat halaman pertama kali dimuat
  updateTotal();
</script>
