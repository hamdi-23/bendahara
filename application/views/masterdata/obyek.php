<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Data Obyek Akun Akuntansi</h3>
    </div>
          <div class="card" style="width: 50rem;">
          <div class="card-body">
          </div>
    <section class="section">
        <?= $this->session->flashdata('message');  ?>
        <div class="card">
            <div class="card-header">
            <form action="<?= base_url('masterdata/tambah_obyek') ?>" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="akun" class="form-label">Akun</label>
                                        <select class="form-select" aria-label="akun" name="kd_akun" id="akun">
                                            <option selected>Pilih Akun</option>
                                            <?php foreach($akun as $p): ?>
                                            <option value="<?= $p['KD_AKUN'] ?>">
                                                <?= $p['KD_AKUN'].'-'. $p['NM_AKUN'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kelompok" class="form-label">Kelompok</label>
                                        <select class="form-select" aria-label="kelompok" name="kd_kelompok" id="kelompok">
                                            <option selected>Pilih Kelompok</option>
                                            <?php foreach($kel as $p): ?>
                                            <option value="<?= $p['KD_KELOMPOK'] ?>">
                                                <?= $p['KD_KELOMPOK'].'-'. $p['NM_KELOMPOK'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Jenis" class="form-label">Jenis</label>
                                        <select class="form-select" aria-label="jenis" name="kd_jenis" id="jenis">
                                            <option selected>Pilih Jenis</option>
                                            <?php foreach($jen as $p): ?>
                                            <option value="<?= $p['KD_JENIS'] ?>">
                                                <?= $p['KD_JENIS'].'-'. $p['NM_JENIS'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kd_obyek" class="form-label">Kode Obyek</label>
                                        <input type="number" class="form-control" id="kd_obyek" name="kd_obyek" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nm_obyek" class="form-label">Nama Obyek Akun</label>
                                        <input type="text" class="form-control" id="nm_obyek" name="nm_obyek" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nm_obyek_alias" class="form-label">Nama Obyek Alias</label>
                                        <input type="text" class="form-control" id="nm_obyek_alias" name="nm_obyek_alias" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan" name="keterangan"
                                            required>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
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
                                <th>Kode Akun</th>
                                <th>Kode Kelompok</th>
                                <th>Kode Jenis</th>
                                <th>Kode Obyek</th>
                                <th>Kode Rekening</th>
                                <th>Nama Obyek</th>
                                <th>Nama Obyek Alias</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($obyek as $b) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $b['KD_AKUN'] ?></td>
                                <td><?= $b['KD_KELOMPOK'] ?></td>
                                <td><?= $b['KD_JENIS'] ?></td>
                                <td><?= $b['KD_OBYEK'] ?></td>
                                <td><?= $b['KD_REKENING'] ?></td>
                                <td><?= $b['NM_OBYEK'] ?></td>
                                <td><?= $b['NM_OBYEK_ALIAS'] ?></td>
                                <td><?= $b['KETERANGAN'] ?></td>
                                <td>
              </div>
            </div>
            
                                <a class=" badge badge-danger" onclick="javascript: return confirm('Anda yakin akan menghapus ini? ')" href="<?= base_url('masterdata/delete_obyek/' . $b['KD_OBYEK']) ?>"><span class="badge bg-danger">Hapus</span></a>
                                    <a href="#" ><span class="badge bg-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $b['KD_OBYEK'] ?>">Edit</span></a>

                                  <!-- Modal -->
                                  <div class="modal fade" id="exampleModal<?= $b['KD_OBYEK'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Rekening</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="mb-3">
                                        <form action="<?= base_url('masterdata/edit_obyek') ?>" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="akun" class="form-label">Akun</label>
                                        <select class="form-select" aria-label="akun" name="kd_akun" id="akun">
                                            <option selected>Pilih Akun</option>
                                            <?php foreach($akun as $p): ?>
                                            <option value="<?= $p['KD_AKUN'] ?>">
                                                <?= $p['KD_AKUN'].'-'. $p['NM_AKUN'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kelompok" class="form-label">Kelompok</label>
                                        <select class="form-select" aria-label="kelompok" name="kd_kelompok" id="kelompok">
                                            <option selected>Pilih Kelompok</option>
                                            <?php foreach($kel as $p): ?>
                                            <option value="<?= $p['KD_KELOMPOK'] ?>">
                                                <?= $p['KD_KELOMPOK'].'-'. $p['NM_KELOMPOK'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Jenis" class="form-label">Jenis</label>
                                        <select class="form-select" aria-label="jenis" name="kd_jenis" id="jenis">
                                            <option selected>Pilih Jenis</option>
                                            <?php foreach($jen as $p): ?>
                                            <option value="<?= $p['KD_JENIS'] ?>">
                                                <?= $p['KD_JENIS'].'-'. $p['NM_JENIS'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kd_obyek" class="form-label">Kode Obyek</label>
                                        <input type="number" class="form-control" id="kd_obyek" name="kd_obyek" value="<?= $b['KD_OBYEK']?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kd_rekening" class="form-label">Kode Rekening</label>
                                        <input type="number" class="form-control" id="kd_rekening" name="kd_rekening" value="<?= $b['KD_REKENING']?>" readonly required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nm_obyek" class="form-label">Nama Obyek Akun</label>
                                        <input type="text" class="form-control" id="nm_obyek" name="nm_obyek" value="<?= $b['NM_OBYEK']?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nm_obyek_alias" class="form-label">Nama Obyek Alias</label>
                                        <input type="text" class="form-control" id="nm_obyek_alias" name="nm_obyek_alias" value="<?= $b['NM_OBYEK_ALIAS']?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $b['KETERANGAN']?>" required>
                                    </div>
                            </div>
                            <div class="modal-footer">
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