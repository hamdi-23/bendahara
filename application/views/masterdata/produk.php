<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Data Produk</h3>
    </div>
          <div class="card" style="width: 50rem;">
          <div class="card-body">
          </div>
    <section class="section">
        <?= $this->session->flashdata('message');  ?>
        <div class="card">
            <div class="card-header">
            <form action="<?= base_url('masterdata/tambah_produk') ?>" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="katproduk" class="form-label">Kategori produk</label>
                                        <select class="form-select" aria-label="katproduk" name="kd_katproduk" id="katproduk">
                                            <option selected>Pilih Kategori</option>
                                            <?php foreach($katproduk as $p): ?>
                                            <option value="<?= $p['KD_KATPRODUK'] ?>">
                                                <?= $p['KD_KATPRODUK'].'-'. $p['NM_KATEGORI'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kd_produk" class="form-label">Kode Produk</label>
                                        <input type="number" class="form-control" id="kd_produk" name="kd_produk" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nm_produk" class="form-label">Nama Produk</label>
                                        <input type="text" class="form-control" id="nm_produk" name="nm_produk" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jml_produk" class="form-label">Jumlah Produk</label>
                                        <input type="number" class="form-control" id="jml_produk" name="jml_produk" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="harga_jual" class="form-label">Harga Jual</label>
                                        <input type="number" class="form-control" id="harga_jual" name="harga_jual" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="harga_beli" class="form-label">Harga Beli</label>
                                        <input type="number" class="form-control" id="harga_beli" name="harga_beli" required>
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
                                <th>Kode Kategori Produk</th>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Jumlah Produk</th>
                                <th>Harga Jual</th>
                                <th>Harga Beli</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($produk as $b) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $b['KD_KATPRODUK'] ?></td>
                                <td><?= $b['KD_PRODUK'] ?></td>
                                <td><?= $b['NM_PRODUK'] ?></td>
                                <td><?= $b['JML_PRODUK'] ?></td>
                                <td><?= $b['HARGA_JUAL'] ?></td>
                                <td><?= $b['HARGA_BELI'] ?></td>
                                <td><?= $b['KETERANGAN'] ?></td>
                                <td>
              </div>
            </div>
            
                                <a class=" badge badge-danger" onclick="javascript: return confirm('Anda yakin akan menghapus data ini? ')" href="<?= base_url('masterdata/delete_produk/' . $b['KD_PRODUK']) ?>"><span class="badge bg-danger">Hapus</span></a>
                                    <a href="#" ><span class="badge bg-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $b['KD_PRODUK'] ?>">Edit</span></a>

                                  <!-- Modal -->
                                  <div class="modal fade" id="exampleModal<?= $b['KD_PRODUK'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Produk</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="mb-3">
                                        <form action="<?= base_url('masterdata/edit_produk') ?>" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="katproduk" class="form-label">Katproduk</label>
                                        <select class="form-select" aria-label="akun" name="kd_akun" id="akun">
                                            <option selected>Pilih Akun</option>
                                            <?php foreach($akun as $p): ?>
                                                <option value="<?= $p['kd_akun']; ?>" <?php if ($p['nm_akun'] == $t['nm_akun']) {
																													echo 'selected';
																												} ?>><?= $p['nm_akun'] ?></option>
																		<?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kd_produk" class="form-label">Kode Produk</label>
                                        <input type="number" class="form-control" id="kd_produk" name="kd_produk"  value="<?= $b['KD_PRODUK']?>" readonly required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nm_produk" class="form-label">Nama Produk</label>
                                        <input type="text" class="form-control" id="nm_produk" name="nm_produk"  value="<?= $b['NM_PRODUK']?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jml_produk" class="form-label">Jumlah Produk</label>
                                        <input type="number" class="form-control" id="jml_produk" name="jml_produk"  value="<?= $b['JML_PRODUK']?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="harga_jual" class="form-label">Harga Jual</label>
                                        <input type="number" class="form-control" id="harga_jual" name="harga_jual"  value="<?= $b['HARGA_JUAL']?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="harga_beli" class="form-label">Harga Beli</label>
                                        <input type="number" class="form-control" id="harga_beli" name="harga_beli"  value="<?= $b['HARGA_BELI']?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan" name="keterangan"  required>
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