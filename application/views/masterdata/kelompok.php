<div class="main-content container-fluid">
	<div class="page-title">
		<h3>Data Kelompok Akun Akuntansi</h3>
	</div>
	<div class="card" style="width: 50rem;">
		<div class="card-body">
		</div>
		<section class="section">
			<?= $this->session->flashdata('message');  ?>
			<div class="card">
				<div class="card-header">
					<form action="<?= base_url('masterdata/tambah_kelompok') ?>" method="POST"
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
							<label for="kd_kelompok" class="form-label">Kode Kelompok</label>
							<input type="number" class="form-control" id="kd_kelompok" name="kd_kelompok" required>
						</div>
						<div class="mb-3">
							<label for="nm_kelompok" class="form-label">Nama Kelompok Akun</label>
							<input type="text" class="form-control" id="nm_kelompok" name="nm_kelompok" required>
						</div>
						<div class="mb-3">
							<label for="nm_kelompok_alias" class="form-label">Nama Kelompok Alias</label>
							<input type="text" class="form-control" id="nm_kelompok_alias" name="nm_kelompok_alias"
								required>
						</div>
						<div class="mb-3">
							<label for="keterangan" class="form-label">Keterangan</label>
							<input type="text" class="form-control" id="keterangan" name="keterangan" required>
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
							<th>Nama Kelompok</th>
							<th>Nama Kelompok Alias</th>
							<th>Keterangan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach($kelompok as $b) : ?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $b['KD_AKUN'] ?></td>
							<td><?= $b['KD_KELOMPOK'] ?></td>
							<td><?= $b['NM_KELOMPOK'] ?></td>
							<td><?= $b['NM_KELOMPOK_ALIAS'] ?></td>
							<td><?= $b['KETERANGAN'] ?></td>
							<td>
			</div>
		</div>

		<a class=" badge badge-danger" onclick="javascript: return confirm('Anda yakin akan menghapus data ini? ')"
			href="<?= base_url('masterdata/delete_kelompok/' . $b['KD_KELOMPOK']) ?>"><span
				class="badge bg-danger">Hapus</span></a>
		<a href="#"><span class="badge bg-success" data-bs-toggle="modal"
				data-bs-target="#exampleModal<?= $b['KD_KELOMPOK'] ?>">Edit</span></a>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal<?= $b['KD_KELOMPOK'] ?>" tabindex="-1"
			aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kelompok Akun</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="mb-3">
							<form action="<?= base_url('masterdata/edit_kelompok') ?>" method="POST"
								enctype="multipart/form-data">
								<div class="mb-3">
									<label for="akun" class="form-label">Akun</label>
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
									<label for="kd_kelompok" class="form-label">Kode Kelompok</label>
									<input type="number" class="form-control" id="kd_kelompok" name="kd_kelompok"
										value="<?= $b['KD_KELOMPOK']?>" readonly required>
								</div>
								<div class="mb-3">
									<label for="nm_kelompok" class="form-label">Nama Kelompok Akun</label>
									<input type="text" class="form-control" id="nm_kelompok" name="nm_kelompok"
										value="<?= $b['NM_KELOMPOK']?>" required>
								</div>
								<div class="mb-3">
									<label for="nm_kelompok_alias" class="form-label">Nama Kelompok Alias</label>
									<input type="text" class="form-control" id="nm_kelompok_alias"
										name="nm_kelompok_alias" value="<?= $b['NM_KELOMPOK_ALIAS']?>" required>
								</div>
								<div class="mb-3">
									<label for="keterangan" class="form-label">Keterangan</label>
									<input type="text" class="form-control" id="keterangan" name="keterangan"
										value="<?= $b['KETERANGAN']?>" required>
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
