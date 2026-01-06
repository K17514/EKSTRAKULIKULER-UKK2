<section class="d-flex align-items-center justify-content-center pb-5" style="padding-top: 100px; background-color: #E0DBD8;">
  <div class="container">
    <div class="col-lg-12 col-12 mt-5 mb-4 mb-lg-4">
      <div class="d-flex flex-column" style="background-color: #FAF5F1; padding: 2rem; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); color: #292F36;">
        
        <h3 style="color: #292F36; font-weight: bold; margin-bottom: 1.5rem;">Edit Web Identity</h3>
        
        <form action="<?= base_url('admin/update_setting') ?>" method="post" enctype="multipart/form-data">
          
          <?php if (session()->getFlashdata('successprofil')): ?>
            <div class="alert alert-success">
              <?= session()->getFlashdata('successprofil') ?>
            </div>
          <?php endif; ?>

          <div class="text-center mb-4">
            <img src="<?= base_url('images/' . ($child->logo ?? 'default.png')) ?>" alt="Logo" class="rounded-circle" width="100" height="100" style="object-fit: cover;">
          </div>

          <div class="mb-3">
            <label for="profileImage" class="form-label" style="font-weight: 500; color: #292F36;">Change Logo</label>
            <input type="file" name="profile_image" id="profileImage" accept="images/" class="form-control" style="border: 1px solid #8F7A6E; border-radius: 8px; padding: 0.6rem;">
          </div>

          <div class="mb-3">
            <label for="fullName" class="form-label" style="font-weight: 500; color: #292F36;">Web Title</label>
            <input type="text" name="fullName" id="fullName" value="<?= $child->title ?>" class="form-control" style="border: 1px solid #8F7A6E; border-radius: 8px; padding: 0.6rem;">
          </div>

          <div class="d-flex justify-content-start mt-3">
            <button type="submit" class="btn" style="background-color: #A41F13; color: white; border: none; padding: 0.5rem 1rem; border-radius: 6px; font-weight: 600;">Save Changes</button>
            <button type="reset" class="btn ms-2" style="background-color: #8F7A6E; color: white; border: none; padding: 0.5rem 1rem; border-radius: 6px;">Reset</button>
            <a type="button" class="btn ms-2" style="background-color: #8F7A6E; color: white; border: none; padding: 0.5rem 1rem; border-radius: 6px;" href="<?=base_url('home/')?>">Back</a>
          </div>

        </form>
        
      </div>
    </div>
  </div>
</section>
