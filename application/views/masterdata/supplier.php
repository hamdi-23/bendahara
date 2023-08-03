<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Data Supplier</h3>
    </div>
          <div class="card" style="width: 50rem;">
          <div class="card-body">
          </div>
    <section class="section">
        <?= $this->session->flashdata('message');  ?>
        <div class="card">
            <div class="card-header">
            <form action="<?= base_url('masterdata/tambah_supplier') ?>" method="post">
              <div class="mb-3">
                <label for="kd_supplier" class="form-label">Kode Supplier</label>
                <input type="text" class="form-control" id="kd_supplier" name="kd_supplier" required>
              </div>
              <div class="mb-3">
                <label for="nm_supplier" class="form-label">Nama Supplier</label>
                <input type="text" class="form-control" id="nm_supplier" name="nm_supplier" required>
              </div>
              <div class="mb-3">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
              </div>
              <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" required>
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
                
            </div>
        </div>
</div>
            <div class="card">
              <div class="card-body">
             <div class="card-body">
                <div class="table-responsive">
                    <table class='table table-striped'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Supplier</th>
                                <th>Nama Supplier</th>
                                <th>No HP</th>
                                <th>Alamat</th></th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($supplier as $b) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $b['KD_SUPPLIER'] ?></td>
                                <td><?= $b['NM_SUPPLIER'] ?></td>
                                <td><?= $b['NO_HP'] ?></td>
                                <td><?= $b['ALAMAT'] ?></td>
                                <td><?= $b['KETERANGAN'] ?></td>
                                <td>
              </div>
            </div>
            
                                <a class=" badge badge-danger" onclick="javascript: return confirm('Anda yakin akan menghapus ini? ')" href="<?= base_url('masterdata/delete_supplier/' . $b['KD_SUPPLIER']) ?>"><span class="badge bg-danger">Hapus</span></a>
                                    <a href="#" ><span class="badge bg-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $b['KD_SUPPLIER'] ?>">Edit</span></a>

                                  <!-- Modal -->
                                  <div class="modal fade" id="exampleModal<?= $b['KD_SUPPLIER'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Supplier</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="mb-3">
                                        <form action="<?= base_url('masterdata/edit_supplier') ?>" method="post">
                                        <div class="mb-3">
                                          <label for="kd_supplier" class="form-label">Kode Supplier</label>
                                          <input type="text" class="form-control" id="kd_supplier" name="kd_supplier" value="<?= $b['KD_SUPPLIER']?>" aria-describedby="emailHelp" readonly required>
                                        </div>
                                        <div class="mb-3">
                                          <label for="nm_supplier" class="form-label">Nama Supplier</label>
                                          <input type="text" class="form-control" id="nm_supplier" name="nm_supplier" value="<?= $b['NM_SUPPLIER']?>" required>
                                        </div>
                                        <div class="mb-3">
                                          <label for="no_hp" class="form-label">No HP</label>
                                          <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $b['NO_HP']?>" required>
                                        </div>
                                        <div class="mb-3">
                                          <label for="alamat" class="form-label">Alamat</label>
                                          <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $b['ALAMAT']?>" required>
                                        </div>
                                        <div class="mb-3">
                                          <label for="keterangan" class="form-label">Keterangan</label>
                                          <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $b['KETERANGAN']?>" required>
                                        </div>
                                     
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                          <button type="submit" class="btn btn-primary">Edit</button>
                                        </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </td>
                            </tr>
                            <?php $no++; endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
</div>