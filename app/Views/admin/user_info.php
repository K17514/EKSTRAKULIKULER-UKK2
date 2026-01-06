<section class="d-flex align-items-center justify-content-center pb-5" style="padding-top: 100px; background-color: #E0DBD8;">
  <div class="container">
    <div class="col-lg-12 col-12 mt-5 mb-4 mb-lg-4">
      <div class="d-flex flex-column" style="background-color: #FAF5F1; padding: 2rem; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); color: #292F36;">
        
        <h3 style="color: #292F36; font-weight: bold; margin-bottom: 1.5rem;">Detail User</h3>
        
        <form action="" method="POST">
          <table style="width: 100%;">
            <tr>
              <td style="padding-bottom: 10px;"><label for="created_by" style="font-weight: 500; color: #292F36;">Created By</label></td>
              <td style="padding-bottom: 10px;">
                <input type="text" class="form-control" id="created_by" name="created_by" value="<?=$child->created_by_name?>" disabled style="border: 1px solid #8F7A6E; border-radius: 8px; padding: 0.6rem; width: 100%;">
              </td>
            </tr>
            <tr>
              <td style="padding-bottom: 10px;"><label for="created_at" style="font-weight: 500; color: #292F36;">Created At</label></td>
              <td style="padding-bottom: 10px;">
                <input type="text" class="form-control" id="created_at" name="created_at" value="<?=$child->created_at?>" disabled style="border: 1px solid #8F7A6E; border-radius: 8px; padding: 0.6rem; width: 100%;">
              </td>
            </tr>
            <tr>
              <td style="padding-bottom: 10px;"><label for="updated_by" style="font-weight: 500; color: #292F36;">Updated By</label></td>
              <td style="padding-bottom: 10px;">
                <input type="text" class="form-control" id="updated_by" name="updated_by" value="<?=$child->updated_by_name?>" disabled style="border: 1px solid #8F7A6E; border-radius: 8px; padding: 0.6rem; width: 100%;">
              </td>
            </tr>
            <tr>
              <td style="padding-bottom: 10px;"><label for="updated_at" style="font-weight: 500; color: #292F36;">Updated At</label></td>
              <td style="padding-bottom: 10px;">
                <input type="text" class="form-control" id="updated_at" name="updated_at" value="<?=$child->updated_at?>" disabled style="border: 1px solid #8F7A6E; border-radius: 8px; padding: 0.6rem; width: 100%;">
              </td>
            </tr>
            <tr>
              <td style="padding-bottom: 10px;"><label for="deleted_by" style="font-weight: 500; color: #292F36;">Deleted By</label></td>
              <td style="padding-bottom: 10px;">
                <input type="text" class="form-control" id="deleted_by" name="deleted_by" value="<?=$child->deleted_by_name?>" disabled style="border: 1px solid #8F7A6E; border-radius: 8px; padding: 0.6rem; width: 100%;">
              </td>
            </tr>
            <tr>
              <td style="padding-bottom: 10px;"><label for="deleted_at" style="font-weight: 500; color: #292F36;">Deleted At</label></td>
              <td style="padding-bottom: 10px;">
                <input type="text" class="form-control" id="deleted_at" name="deleted_at" value="<?=$child->deleted_at?>" disabled style="border: 1px solid #8F7A6E; border-radius: 8px; padding: 0.6rem; width: 100%;">
              </td>
            </tr>
            <tr>
              <td></td>
              <td style="padding-top: 10px;">
                <button type="button" class="btn" style="background-color: #8F7A6E; color: white; border: none; padding: 0.5rem 1rem; border-radius: 6px;" onclick="window.history.back()">Kembali</button>
              </td>
            </tr>
          </table>
        </form>
        
      </div>
    </div>
  </div>
</section>
