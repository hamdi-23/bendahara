<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Transaksi</h3>
    </div>
    <section class="section">
        <?= $this->session->flashdata('message');  ?>
        <div class="card">
            <div class="card-header">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Transaksi
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Transaksi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            
                            <div class="modal-body">
                                <form action="<?= base_url('admin/tambah_transaksi') ?>" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="kd_transaksi" class="form-label">Kode Transaksi</label>
                                        <input type="number" class="form-control" id="kd_transaksi" name="kd_transaksi" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenis_transaksi" class="form-label">Jenis Transaksi</label>
                                        <select class="form-select" aria-label="jenis_transaksi" name="jntransaksi" id="jenis_transaksi">
                                            <option selected>Pilih Jenis Transaksi</option>
                                            <?php foreach($jntransaksi as $p): ?>
                                            <option value="<?= $p['KD_JNTRANSAKSI'] ?>">
                                                <?= $p['KD_JNTRANSAKSI'].'-'. $p['JENIS_TRANSAKSI'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenis_bayar" class="form-label">Jenis Bayar</label>
                                        <select class="form-select" aria-label="jenis_bayar" name="jnbayar" id="jenis_bayar">
                                            <option selected>Pilih Jenis Bayar</option>
                                            <?php foreach($jnbayar as $p): ?>
                                            <option value="<?= $p['KD_JNBAYAR'] ?>">
                                                <?= $p['KD_JNBAYAR'].'-'. $p['JENIS_BAYAR'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="dokumen" class="form-label">Jenis Dokumen</label>
                                        <select class="form-select" aria-label="dokumen" name="dokumen" id="dokumen">
                                            <option selected>Pilih Dokumen</option>
                                            <?php foreach($dokumen as $p): ?>
                                            <option value="<?= $p['KD_DOKUMEN'] ?>">
                                                <?= $p['KD_DOKUMEN'].'-'. $p['NM_DOKUMEN'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_transaksi" class="form-label">No Transaksi</label>
                                        <input type="text" class="form-control" id="no_transaksi" name="no_transaksi"
                                            value="<?= 'T-00'. rand(0,9);?>" required readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tgl_transaksi" class="form-label">Tanggal Transaksi</label>
                                        <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="total" class="form-label">Total</label>
                                        <input type="number" class="form-control" id="total" name="total" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="keperluan" class="form-label">Keperluan</label>
                                        <input type="text" class="form-control" id="keperluan" name="keperluan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class='table table-striped'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Jenis Transaksi</th>
                                <th>Jenis Bayar</th>
                                <th>Jenis Dokumen</th>
                                <th>No Transaksi</th>
                                <th>Tanggal Transaksi</th>
                                <th>Total</th>
                                <th>Keperluan</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($transaksi as $b) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $b['KD_TRANSAKSI'] ?></td>
                                <td><?= $b['JENIS_TRANSAKSI'] ?></td>
                                <td><?= $b['JENIS_BAYAR'] ?></td>
                                <td><?= $b['NM_DOKUMEN'] ?></td>
                                <td><?= $b['NO_TRANSAKSI'] ?></td>
                                <td><?= $b['TGL_TRANSAKSI'] ?></td>
                                <td><?= $b['TOTAL'] ?></td>
                                <td><?= $b['KEPERLUAN'] ?></td>
                                <td><?= $b['KETERANGAN'] ?></td>
                                <td>
                                    <span class="badge bg-danger">Delete</span>
                                    <span class="badge bg-success">Edit</span>
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