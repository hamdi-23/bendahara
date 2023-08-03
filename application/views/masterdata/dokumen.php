<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Data Dokumen Transaksi</h3>
    </div>
          <div class="card" style="width: 50rem;">
          <div class="card-body">
          </div>
    <section class="section">
        <?= $this->session->flashdata('message');  ?>
        <div class="card">
            <div class="card-header">
            <form action="<?= base_url('masterdata/tambah_dokumen') ?>" method="post">
              <div class="mb-3">
                <label for="kd_dokumen" class="form-label">Kode Dokumen</label>
                <input type="text" class="form-control" id="kd_dokumen" name="kd_dokumen" required>
              </div>
              <div class="mb-3">
                <label for="nm_dokumen" class="form-label">Nama Dokumen</label>
                <input type="text" class="form-control" id="nm_dokumen" name="nm_dokumen" required>
              </div>
              <div class="mb-3">
                <label for="tipe_transaksi" class="form-label">Tipe Transaksi</label>
                <input type="text" class="form-control" id="tipe_transaksi" name="tipe_transaksi" required>
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
                                <th>Kode Dokumen</th>
                                <th>Nama Dokumen</th>
                                <th>Tipe Transaksi</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($dokumen as $b) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $b['KD_DOKUMEN'] ?></td>
                                <td><?= $b['NM_DOKUMEN'] ?></td>
                                <td><?= $b['TIPE_TRANSAKSI'] ?></td>
                                <td><?= $b['KETERANGAN'] ?></td>
                                <td>
              </div>
            </div>
            
                                <a class=" badge badge-danger" onclick="javascript: return confirm('Anda yakin akan menghapus ini? ')" href="<?= base_url('masterdata/delete_dokumen/' . $b['KD_DOKUMEN']) ?>"><span class="badge bg-danger">Hapus</span></a>
                                    <a href="#" ><span class="badge bg-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $b['KD_DOKUMEN'] ?>">Edit</span></a>

                                  <!-- Modal -->
                                  <div class="modal fade" id="exampleModal<?= $b['KD_DOKUMEN'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Dokumen</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="mb-3">
                                        <form action="<?= base_url('masterdata/edit_dokumen') ?>" method="post">
                                        <div class="mb-3">
                                          <label for="kd_dokumen" class="form-label">Kode Dokumen</label>
                                          <input type="text" class="form-control" id="kd_dokumen" name="kd_dokumen" value="<?= $b['KD_DOKUMEN']?>" aria-describedby="emailHelp" readonly required>
                                        </div>
                                        <div class="mb-3">
                                          <label for="nm_dokumen" class="form-label">Nama Dokumen</label>
                                          <input type="text" class="form-control" id="nm_dokumen" name="nm_dokumen" value="<?= $b['NM_DOKUMEN']?>" required>
                                        </div>
                                        <div class="mb-3">
                                          <label for="tipe_transaksi" class="form-label">Tipe Transaksi</label>
                                          <input type="text" class="form-control" id="tipe_transaksi" name="tipe_transaksi" value="<?= $b['TIPE_TRANSAKSI']?>" required>
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