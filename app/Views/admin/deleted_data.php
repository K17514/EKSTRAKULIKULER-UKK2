<section class="d-flex align-items-center justify-content-center" style="min-height: 50vh; background-color: background-color: #E0DBD8;; color: #FAF5F1; padding-top: 150px;">
    <div class="container mt-4 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg" style="background-color: #FAF5F1;">
                    <div class="card-body">
                        <h4 class="card-title mb-4" style="color: #292F36;">Deleted Data Management</h4>

                        <div class="accordion" id="deletedDataAccordion">
                            <?php 
                            $tables = [
                                'produk' => 'Produk',
                                'kategori' => 'Kategori',
                                'paket' => 'Paket',
                                'user' => 'Users'
                            ];

                            $columns = [
                                'produk' => ['nama_produk', 'deleted_at'],
                                'kategori' => ['nama_kategori', 'deleted_at'],
                                'paket' => ['nama_paket', 'deleted_at'],
                                'user' => ['username', 'email', 'deleted_at']
                            ];

                            foreach ($tables as $key => $title) :
                                $data = $deletedData[$key] ?? [];
                            ?>

                            <div class="accordion-item" style="background-color: #A41F13; border-color: #A41f13;">
                                <h2 class="accordion-header" id="heading<?= $key ?>">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $key ?>" aria-expanded="false" style="background-color: #A41f13; color: #FAF5F1;">
                                        <?= $title ?>
                                    </button>
                                </h2>
                                <div id="collapse<?= $key ?>" class="accordion-collapse collapse" data-bs-parent="#deletedDataAccordion">
                                    <div class="accordion-body" style="background-color: #FAF5F1; color: #292F36;">
                                        <?php if (!empty($data) && is_array($data)): ?>
                                            <div class="mb-3 d-flex gap-2">
                                                <form action="<?= base_url('admin/restore_all') ?>" method="POST" class="d-inline-block">
                                                    <input type="hidden" name="table" value="<?= $key ?>">
                                                    <button type="submit" class="btn btn-sm" style="background-color: #8F7A6E; color: #FAF5F1;">Restore All</button>
                                                </form>
                                                <form action="<?= base_url('admin/kill_all') ?>" method="POST" class="d-inline-block">
                                                    <input type="hidden" name="table" value="<?= $key ?>">
                                                    <button type="submit" class="btn btn-sm" style="background-color: #A41F13; color: #FAF5F1;" onclick="return confirm('Are you sure you want to delete all <?= $title ?> permanently?');">
                                                        MASSACRE
                                                    </button>
                                                </form>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover align-middle" style="background-color: #E0DBD8; color: #292F36;">
                                                    <thead style="background-color: #8F7A6E; color: #FAF5F1;">
                                                        <tr>
                                                            <?php foreach ($columns[$key] as $col) : ?>
                                                                <th><?= ucfirst(str_replace('_', ' ', $col)) ?></th>
                                                            <?php endforeach; ?>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($data as $row) : ?>
                                                            <tr>
                                                                <?php foreach ($columns[$key] as $col) : ?>
                                                                    <td><?= htmlspecialchars($row[$col] ?? '-') ?></td>
                                                                <?php endforeach; ?>
                                                                <td>
                                                                    <div class="d-flex gap-2 flex-wrap">
                                                                        <form action="<?= base_url('admin/restore') ?>" method="POST" class="d-inline-block">
                                                                            <input type="hidden" name="table" value="<?= $key ?>">
                                                                            <input type="hidden" name="id" value="<?= $row[array_key_first($row)] ?? '' ?>">
                                                                            <button type="submit" class="btn btn-sm" style="background-color: #8F7A6E; color: #FAF5F1;">Restore</button>
                                                                        </form>

                                                                        <?php if ($key === 'produk'): ?>
                                                                            <form action="<?= base_url('admin/killproduk/' . $row['id_produk']) ?>" method="POST" class="d-inline-block">
                                                                                <button type="submit" class="btn btn-sm" style="background-color: #A41F13; color: #FAF5F1;" onclick="return confirm('Delete permanently?');">
                                                                                    KILL
                                                                                </button>
                                                                            </form>
                                                                        <?php elseif ($key === 'kategori'): ?>
                                                                            <form action="<?= base_url('admin/killkategori/' . $row['id_kategori']) ?>" method="POST" class="d-inline-block">
                                                                                <button type="submit" class="btn btn-sm" style="background-color: #A41F13; color: #FAF5F1;" onclick="return confirm('Delete permanently?');">
                                                                                    KILL
                                                                                </button>
                                                                            </form>
                                                                        <?php elseif ($key === 'paket'): ?>
                                                                            <form action="<?= base_url('admin/killpaket/' . $row['id_paket']) ?>" method="POST" class="d-inline-block">
                                                                                <button type="submit" class="btn btn-sm" style="background-color: #A41F13; color: #FAF5F1;" onclick="return confirm('Delete permanently?');">
                                                                                    KILL
                                                                                </button>
                                                                            </form>
                                                                            <?php elseif ($key === 'user'): ?>
                                                                            <form action="<?= base_url('admin/killuser/' . $row['id_user']) ?>" method="POST" class="d-inline-block">
                                                                                <button type="submit" class="btn btn-sm" style="background-color: #A41F13; color: #FAF5F1;" onclick="return confirm('Delete permanently?');">
                                                                                    KILL
                                                                                </button>
                                                                            </form>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php else: ?>
                                            <p class="text-muted">No deleted data found for <strong><?= $title ?></strong>.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div> <!-- accordion -->
                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div>
        </div>
    </div>
</section>
