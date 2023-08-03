<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Data Jenis Transaksi</h3>
    </div>
          <div class="card" style="width: 50rem;">
          <div class="card-body">
          </div>
    <section class="section">
        <?= $this->session->flashdata('message');  ?>
        <div class="card">
            <div class="card-header">
            <form action="<?= base_url('masterdata/tambah_jntransaksi') ?>" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="kd_jntransaksi" class="form-label">Kode Jenis Transaksi</label>
                                        <input type="number" class="form-control" id="kd_jntransaksi" name="kd_jntransaksi" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenis_transaksi" class="form-label">Jenis Transaksi</label>
                                        <input type="text" class="form-control" id="jenis_transaksi" name="jenis_transaksi" required>
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
                                <th>Kode Jenis Transaksi</th>
                                <th>Jenis Transaksi</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($jntransaksi as $b) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $b['KD_JNTRANSAKSI'] ?></td>
                                <td><?= $b['JENIS_TRANSAKSI'] ?></td>
                                <td><?= $b['KETERANGAN'] ?></td>
                                <td>
              </div>
            </div>
            
                                <a class=" badge badge-danger" onclick="javascript: return confirm('Anda yakin akan menghapus ini? ')" href="<?= base_url('masterdata/delete_jntransaksi/' . $b['KD_JNTRANSAKSI']) ?>"><span class="badge bg-danger">Hapus</span></a>
                                    <a href="#" ><span class="badge bg-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $b['KD_JNTRANSAKSI'] ?>">Edit</span></a>

                                  <!-- Modal -->
                                  <div class="modal fade" id="exampleModal<?= $b['KD_JNTRANSAKSI'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Jenis Transaksi</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="mb-3">
                                        <form action="<?= base_url('masterdata/edit_jntransaksi') ?>" method="post">
                                        <div class="mb-3">
                                          <label for="kd_jntransaksi" class="form-label">Kode Jenis Transaksi</label>
                                          <input type="text" class="form-control" id="kd_jntransaksi" name="kd_jntransaksi" value="<?= $b['KD_JNTRANSAKSI']?>"  readonly required>
                                        </div>
                                        <div class="mb-3">
                                          <label for="jenis_transaksi" class="form-label">Jenis Transaksi</label>
                                          <input type="text" class="form-control" id="jenis_transaksi" name="jenis_transaksi" value="<?= $b['JENIS_TRANSAKSI']?>" required>
                                        </div>
                                        <div class="mb-3">
                                          <label for="keterangan" class="form-label">Keterangan</label>
                                          <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $b['KETERANGAN']?>" required>
                                        </div>
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