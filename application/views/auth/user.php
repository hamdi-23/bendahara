<div class="main-content container-fluid">
	<div class="page-title">
		<h3>User Manajemen</h3>
	</div>
	<section class="section">
		<?= $this->session->flashdata('message');  ?>
		<div class="card">
			<div class="card-header">
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
					Tambah User
				</button>

				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
					aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
								<button type="button" class="btn-close" data-bs-dismiss="modal"
									aria-label="Close"></button>
							</div>

							<div class="modal-body">
								<form action="<?= base_url('user/tambah_user') ?>" method="POST"
									enctype="multipart/form-data">
									<div class="mb-3">
										<label for="name" class="form-label">Nama
										</label>
										<input type="text" class="form-control" id="name" name="name" required>
									</div>

									<div class="mb-3">
										<label for="email" class="form-label">Email</label>
										<input type="email" class="form-control" id="email" name="email" required>
									</div>
									<div class="mb-3">
										<label for="phone" class="form-label">Nomor Telpon</label>
										<input type="number" class="form-control" id="phone" name="phone" required>
									</div>
									<div class="mb-3">
										<label for="password" class="form-label">Password</label>
										<input type="password" class="form-control" id="password" name="password" required>
									</div>

									<div class="mb-3">
										<label for="role" class="form-label">Hak Akses</label>
										<select name="role" id="role" class="form-control">
											<option selected>pilih hak akses</option>
											<option value="2">Owner</option>
											<option value="3">Admin</option>
											<option value="4">Karyawan</option>
										</select>
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
								<th>Nama </th>
								<th>Nomor Telepon</th>
								<th>Email</th>
								<th>Status Akun</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; foreach($user as $u) : ?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $u['name'] ?></td>
								<td><?= $u['phone'] ?></td>
								<td><?= $u['email'] ?></td>
								<td>
									<?php if ($u['is_active'] == 1): ?>
									Akun Aktif
									<?php else: ?>
									Akun Tidak Aktif
									<?php endif; ?>
								</td>
								<td>
									<a class=" badge badge-danger"
										onclick="javascript: return confirm('Anda yakin akan menghapus data ini? ')"
										href="<?= base_url('user/delete_user/' . $u['kd_user']) ?>"><span
											class="badge bg-danger">Hapus</span></a>
									<a href="#"><span class="badge bg-success" data-bs-toggle="modal"
											data-bs-target="#exampleModal<?= $u['kd_user'] ?>">Edit</span></a>
									<!-- Modal -->
									<div class="modal fade" id="exampleModal<?= $u['kd_user'] ?>" tabindex="-1"
										aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title fs-5" id="exampleModalLabel">Edit Jenis Akun
													</h1>
													<button type="button" class="btn-close" data-bs-dismiss="modal"
														aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<div class="mb-3">
														<form action="<?= base_url('user/edit_user') ?>" method="POST"
															enctype="multipart/form-data">


															<div class="mb-3">
																<label for="kd_user" class="form-label">Kode
																	Jenis</label>
																<input type="number" class="form-control" id="kd_user"
																	name="kd_user" value="<?= $u['kd_user']?>" readonly
																	required>
															</div>
															<div class="mb-3">
																<label for="name" class="form-label">Kode Jenis</label>
																<input type="text" class="form-control" id="name"
																	name="name" value="<?= $u['name']?>" required>
															</div>
															<div class="mb-3">
																<label for="phone" class="form-label">Nomor
																	Telepon</label>
																<input type="text" class="form-control" id="phone"
																	name="phone" value="<?= $u['phone']?>" required>
															</div>
															<div class="mb-3">
																<label for="email" class="form-label">Email</label>
																<input type="text" class="form-control" id="email"
																	name="email" value="<?= $u['email']?>" required>
															</div>
															<div class="mb-3">
																<label for="email" class="form-label">Email</label>
																<select name="is_active" id="is_active"
																	class="form-control">
																	<option value="<?= $u['is_active']?>" selected>
																		<?php if ($u['is_active'] == 1): ?>
																		Akun Aktif
																		<?php else: ?>
																		Akun Tidak Aktif
																		<?php endif; ?></option>
																	<option value="1">Aktif</option>
																	<option value="0">Tidak Aktif</option>
																</select>
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
