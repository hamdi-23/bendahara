<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Penjualan</h3>
    </div>
    <section class="section">
        <?= $this->session->flashdata('message');  ?>
        <div class="card">
            <div class="card-header">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Penjualan
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Penjualan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('admin/tambah_penjualan') ?>" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="no_nota" class="form-label">No Nota</label>
                                        <input type="text" class="form-control" id="no_nota" name="no_nota"
                                            value="<?= 'J-00'. rand(0,9);?>" required readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="produk" class="form-label">Produk</label>
                                        <select class="form-select" aria-label="produk" name="produk" id="produk">
                                            <option selected>Pilih Produk</option>
                                            <?php foreach($produk as $p): ?>
                                            <option value="<?= $p['KD_PRODUK'] ?>">
                                                <?= $p['KD_PRODUK'].'-'. $p['NM_PRODUK'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pelanggan" class="form-label">Pelanggan</label>
                                        <select class="form-select" aria-label="pelanggan" name="pelanggan" id="produk">
                                            <option selected>Pilih Pelanggan</option>
                                            <?php foreach($pelanggan as $p): ?>
                                            <option value="<?= $p['KD_PELANGGAN'] ?>">
                                                <?= $p['KD_PELANGGAN'].'-'. $p['NM_PELANGGAN'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="diskon" class="form-label">Diskon</label>
                                        <input type="number" class="form-control" id="diskon" name="diskon" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlah" class="form-label">Jumlah</label>
                                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan" name="keterangan"
                                            required>
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
                                <th>No Nota</th>
                                <th>Tanggal</th>
                                <th>Nama Produk</th>
                                <th>Nama Pelanggan</th>
                                <th>Harga Beli</th>
                                <th>Diskon</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Grand Total</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($jual as $b) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $b['NO_NOTA'] ?></td>
                                <td><?= $b['TANGGAL'] ?></td>
                                <td><?= $b['NM_PRODUK'] ?></td>
                                <td><?= $b['NM_PELANGGAN'] ?></td>
                                <td><?= $b['HARGA_BELI'] ?></td>
                                <td><?= $b['DISKON'] ?></td>
                                <td><?= $b['TANGGAL'] ?></td>
                                <td><?= $b['TOTAL'] ?></td>
                                <td><?= $b['GRAND_TOTAL'] ?></td>
                                <td><?= $b['ket'] ?></td>
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