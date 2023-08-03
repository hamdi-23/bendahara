<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Jurnal</h3>
    </div>
          <div class="card" style="width: 100rem;">
          <div class="card-body">
          </div>
    <section class="section">
        <?= $this->session->flashdata('message');  ?>
        <div class="card">
            <div class="card-header">
            <form action="<?= base_url('admin/tambah_jurnal') ?>" method="post">
            <div class="row">
              <div class="col-6">

                <div class="mb-3">
                  <label for="kd_jurnal" class="form-label">Kode Jurnal</label>
                  <input type="text" class="form-control" id="kd_jurnal" name="kd_jurnal" required>
                </div>
                <div class="mb-3">
                  <label for="tgl_transaksi" class="form-label">Tanggal Transaksi</label>
                  <select class="form-select" aria-label="tgl_transaksi" name="tgl_transaksi" id="tgl_transaksi">
                  <option selected>Pilih Tanggal Transaksi</option>
                  <?php foreach($transaksi as $p): ?>
                  <option value="<?= $p['KD_TRANSAKSI'] ?>">
                  <?= $p['KD_TRANSAKSI'].'-'.$p['TGL_TRANSAKSI'] ?></option>
                  <?php endforeach; ?>
                  </select>
                  </div>
                <div class="mb-3">
                      <label for="kd_rekening" class="form-label">Kode Rekening</label>
                      <select class="form-select" aria-label="kd_rekening" name="kd_rekening" id="kd_rekening">
                      <option selected>Pilih Kode Rekening</option>
                      <?php foreach($rekening as $p): ?>
                      <option value="<?= $p['KD_REKENING'] ?>">
                      <?= $p['KD_REKENING'].'-'. $p['NM_OBYEK'] ?></option>
                      <?php endforeach; ?>
                      </select>
                      </div>
                  <div class="mb-3">
                      <label for="kd_transaksi" class="form-label">Kode Transaksi</label>
                      <select class="form-select" aria-label="kd_transaksi" name="kd_transaksi" id="kd_transaksi">
                      <option selected>Pilih Kode Transaksi</option>
                      <?php foreach($transaksi as $p): ?>
                      <option value="<?= $p['KD_TRANSAKSI'] ?>">
                      <?= $p['KD_TRANSAKSI'].'-'. $p['KEPERLUAN'] ?></option>
                      <?php endforeach; ?>
                      </select>
                      </div>
                  <div class="mb-3">
                  <label for="debet" class="form-label">Debet</label>
                  <input type="text" class="form-control" id="debet" name="debet"  >
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                  <label for="kredit" class="form-label">Kredit</label>
                  <input type="text" class="form-control" id="kredit" name="kredit"  >
                </div>
                <div class="mb-3">
                  <label for="keterangan" class="form-label">Keterangan</label>
                  <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                </div>
              </div>
            </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
                
            </div>
        </div>
</div>
         
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
        <?= $this->session->flashdata('message');  ?>
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Jurnal</th>
                        <th>Tanggal Transaksi</th>
                        <th>Kode Rekening</th>
                        <th>Kode Transaksi</th>
                        <th>Debet</th>
                        <th>Kredit</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; $totalDebet = 0; $totalKredit = 0; foreach ($jurnal as $b) : ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $b['KD_JURNAL'] ?></td>
                            <td><?= $b['TGL_TRANSAKSI'] ?></td>
                            <td><?= $b['KD_REKENING'] ?></td>
                            <td><?= $b['KD_TRANSAKSI'] ?></td>
                            <td><?= $b['DEBET'] ?></td>
                            <td><?= $b['KREDIT'] ?></td>
                            <td><?= $b['ket'] ?></td>
                            <td>
                                <a class="badge badge-danger" onclick="javascript: return confirm('Anda yakin akan menghapus ini?')" href="<?= base_url('admin/hapus_jurnal/' . $b['KD_JURNAL']) ?>"><span class="badge bg-danger">Hapus</span></a>
                                <a href="#"><span class="badge bg-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $b['KD_JURNAL'] ?>">Edit</span></a>
                            </td>
                        </tr>
                        <?php $totalDebet += $b['DEBET']; ?>
                        <?php $totalKredit += $b['KREDIT']; ?>
                        <?php $no++; ?>
                    <?php endforeach; ?>
                    <!-- Baris untuk menampilkan total -->
                    <tr>
                        <td colspan="5">Jumlah</td>
                        <td>Total Debet: <?= $totalDebet ?></td>
                        <td>Total Kredit: <?= $totalKredit ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
        </div>
    </section>
</div>
</div>