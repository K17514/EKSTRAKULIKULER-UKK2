<section class="d-flex align-items-center justify-content-center pb-5" style="padding-top: 100px; background-color: #E0DBD8;">
  <div class="container">
    <div class="col-lg-12 col-12 mt-5 mb-4 mb-lg-4">
      <div class="d-flex flex-column" style="background-color: #FAF5F1; padding: 2rem; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); color: #292F36;">
        <h3 style="color: #292F36; font-weight: bold; margin-bottom: 1.5rem;">Pembayaran</h3>

        <?php if ($child->status == 'proses') : ?>
          <form action="<?= base_url('home/simpan_bayar') ?>" method="POST" enctype="multipart/form-data">
            <table style="width: 100%;">
              <tr>
                <td style="padding-bottom: 10px;"><label for="total" style="font-weight: 500;">Total</label></td>
                <td style="padding-bottom: 10px;">
                  <input type="text" class="form-control" id="total" name="total" value="<?= $child->total ?>" readonly style="border: 1px solid #8F7A6E; border-radius: 8px; padding: 0.6rem;">
                </td>
              </tr>
              <tr>
                <td style="padding-bottom: 10px;"><label for="bayar" style="font-weight: 500;">Bayar</label></td>
                <td style="padding-bottom: 10px;">
                  <input type="number" class="form-control" id="bayar" name="bayar" value="<?= isset($child->bayar) ? $child->bayar : '' ?>" required style="border: 1px solid #8F7A6E; border-radius: 8px; padding: 0.6rem;">
                </td>
              </tr>
              <tr>
                <td style="padding-bottom: 10px;"><label for="kembalian" style="font-weight: 500;">Kembalian</label></td>
                <td style="padding-bottom: 10px;">
                  <input type="text" class="form-control" id="kembalian" name="kembalian" value="<?= isset($child->kembalian) ? $child->kembalian : '' ?>" readonly style="border: 1px solid #8F7A6E; border-radius: 8px; padding: 0.6rem;">
                </td>
              </tr>
              <tr>
                <td></td>
                <td style="padding-top: 10px;">
                  <input type="hidden" name="id" value="<?= $child->id_nota ?>">
                  <button type="submit" class="btn" style="background-color: #A41F13; color: white; padding: 0.5rem 1rem; border-radius: 6px; font-weight: 600;">Simpan</button>
                  <button type="reset" class="btn" style="background-color: #8F7A6E; color: white; padding: 0.5rem 1rem; border-radius: 6px;">Reset</button>
                  <button type="button" class="btn" onclick="window.history.back()" style="background-color: #8F7A6E; color: white; padding: 0.5rem 1rem; border-radius: 6px;">Kembali</button>
                </td>
              </tr>
            </table>
          </form>

        <?php else: ?>
          <form id="konfirmasiForm" action="<?= base_url('home/simpan_konfirmasi') ?>" method="POST">
  <table style="width: 100%;">
    <tr>
      <td style="padding-bottom: 10px;"><label for="foto" style="font-weight: 500;">Bukti Pembayaran</label></td>
      <td style="padding-bottom: 10px;">
        <img src="<?= base_url('images/bukti/' . $child->bukti_pembayaran) ?>" alt="Bukti Pembayaran" style="max-width: 100%; border: 1px solid #ccc; border-radius: 8px;">
      </td>
    </tr>
    <input type="hidden" class="form-control" id="total" name="total" value="<?= $child->total ?>" readonly style="border: 1px solid #8F7A6E; border-radius: 8px; padding: 0.6rem;">
    <tr>
      <td></td>
      <td style="padding-top: 10px;">
        <input type="hidden" name="id" value="<?= $child->id_nota ?>">
        <button type="submit" class="btn" style="background-color: #A41F13; color: white; padding: 0.5rem 1rem; border-radius: 6px; font-weight: 600;" onclick="submitForm('<?= base_url('home/simpan_konfirmasi') ?>')">Terima</button>
        <button type="submit" class="btn" style="background-color: #8F7A6E; color: white; padding: 0.5rem 1rem; border-radius: 6px;" onclick="submitForm('<?= base_url('home/tolak_konfirmasi') ?>')">Tolak</button>
        <button type="button" class="btn" onclick="window.history.back()" style="background-color: #8F7A6E; color: white; padding: 0.5rem 1rem; border-radius: 6px;">Kembali</button>
      </td>
    </tr>
  </table>
</form>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const bayarInput = document.getElementById("bayar");
    const totalInput = document.getElementById("total");
    const kembalianInput = document.getElementById("kembalian");

    if (bayarInput && totalInput && kembalianInput) {
      bayarInput.addEventListener("input", function () {
        const total = parseFloat(totalInput.value) || 0;
        const bayar = parseFloat(this.value) || 0;
        const kembalian = bayar - total;
        kembalianInput.value = kembalian >= 0 ? kembalian : 0;
      });
    }
  });
   function submitForm(actionUrl) {
    const form = document.getElementById('konfirmasiForm');
    form.action = actionUrl;
  }
</script>
