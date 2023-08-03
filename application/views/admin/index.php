            <div class="main-content container-fluid">
            	<div class="page-title">
            		<h3>Pembelian</h3>
            	</div>
            	<section class="section">
            		<?= $this->session->flashdata('message');  ?>
            		<div class="card">
            			<div class="card-header">
            				<!-- Button trigger modal -->
            				<button type="button" class="btn btn-primary" data-bs-toggle="modal"
            					data-bs-target="#exampleModal">
            					Tambah Pembelian
            				</button>

            				<!-- Modal -->
            				<div class="modal fade-lg" id="exampleModal" tabindex="-1"
            					aria-labelledby="exampleModalLabel" aria-hidden="true">
            					<div class="modal-dialog">
            						<div class="modal-content">
            							<div class="modal-header">
            								<h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pembelian</h1>
            								<button type="button" class="btn-close" data-bs-dismiss="modal"
            									aria-label="Close"></button>
            							</div>
            							<div class="modal-body">
            								<form action="<?= base_url('admin/tambah_pembelian') ?>" method="POST"
            									enctype="multipart/form-data">
            									<div class="mb-3">
            										<label for="no_nota" class="form-label">No Nota</label>
            										<input type="text" class="form-control" id="no_nota" name="no_nota"
            											value="<?= 'B-00' . rand(0, 100); ?>" required readonly>
            									</div>

            									<!-- Daftar produk menggunakan grup checkbox -->
            									<div class="mb-3">
            										<label for="produk" class="form-label">Produk</label>
            										<div class="row">
            											<?php foreach ($produk as $p): ?>
            											<div class="col-md-6">
            												<div class="form-check">
            													<input class="form-check-input" type="checkbox"
            														name="produk[]" value="<?= $p['KD_PRODUK'] ?>"
            														id="produk[<?= $p['KD_PRODUK'] ?>]">
            													<label class="form-check-label"
            														for="produk<?= $p['KD_PRODUK'] ?>">
            														<?= $p['KD_PRODUK'] . '-' . $p['NM_PRODUK'] ?>
            													</label>
            													<!-- Inputan jumlah produk -->
            													<input type="number" class="form-control"
            														name="jumlah[]" placeholder="Jumlah" >
            												</div>
            											</div>
            											<?php endforeach; ?>
            										</div>
            									</div>


            									<div class="mb-3">
            										<label for="supplier" class="form-label">Supplier</label>
            										<?php foreach ($supplier as $s): ?>
            										<div class="form-check">
            											<input class="form-check-input" type="checkbox"
            												name="supplier[]" value="<?= $s['KD_SUPPLIER'] ?>"
            												id="supplier<?= $s['KD_SUPPLIER'] ?>">
            											<label class="form-check-label"
            												for="supplier<?= $s['KD_SUPPLIER'] ?>">
            												<?= $s['KD_SUPPLIER'] . '-' . $s['NM_SUPPLIER'] ?>
            											</label>
            										</div>
            										<?php endforeach; ?>
            									</div>


            									<div class="mb-3">
            										<label for="diskon" class="form-label">Diskon</label>
            										<input type="number" class="form-control" id="diskon" name="diskon"
            											required>
            									</div>

            									<div class="mb-3">
            										<label for="keterangan" class="form-label">Keterangan</label>
            										<input type="text" class="form-control" id="keterangan"
            											name="keterangan" required>
            									</div>
            							</div>

            							<div class="modal-footer">
            								<button type="button" class="btn btn-secondary"
            									data-bs-dismiss="modal">Close</button>
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
            <th>Nama Supplier</th>
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
        <?php $no = 1; foreach($detail_pembelian as $b) : ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $b['NO_NOTA'] ?></td>
            <td><?= $b['TANGGAL'] ?></td>
            <td><?= $b['NM_PRODUK'] ?></td>
            <td><?= $b['NM_SUPPLIER'] ?></td>
            <td><?= $b['HARGA_BELI'] ?></td>
            <td><?= $b['DISKON'] ?></td>
            <td><?= $b['JUMLAH'] ?></td> <!-- Ubah dari $b['TANGGAL'] menjadi $b['JUMLAH'] -->
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
            <script src="<?= base_url('assets/js/jquery.select2.js');?>"></script>
            <link href="<?= base_url('assets/css/select2.min.css');  ?>" rel="stylesheet" />
            <link href="<?= base_url('assets/css/select2.css');  ?>" rel="stylesheet" />
            <!-- Memuat pustaka jQuery -->

            <!-- Memuat Select2 setelah jQuery -->
            <script src="<?= base_url('assets/js/select2.min.js');?>"></script>

            <script>
            	// Contoh inisialisasi Select2 pada elemen dengan ID "produk"
            	$(document).ready(function () {
            		$('#produk').select2();
            	});

            </script>
