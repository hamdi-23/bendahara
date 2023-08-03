<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Sign in - Voler Admin Dashboard</title>
		<link rel="stylesheet" href="assets/css/bootstrap.css">

		<link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
		<link rel="stylesheet" href="assets/css/app.css">
	</head>

	<body>

		<div id="auth">

			<div class="container">
				<div class="row">
					<div class="col-md-5 col-sm-12 mx-auto">
						<div class="card pt-4">
							<div class="card-body">
								<div class="text-center mb-5">
									<img src="assets/images/favicon.svg" height="48" class='mb-4'>
									<h3>Sign In</h3>
									<p>Please sign in to continue to Voler.</p>
								</div>
								<form action="<?= base_url('Auth')?>" method="POST">
									<?php if ($this->session->flashdata('msg')): ?>
									<div class="alert alert-primary">
										<?= $this->session->flashdata('msg') ?>
									</div>
									<?php endif; ?>

									<div class="form-group position-relative has-icon-left">
										<label for="username">Email</label>
										<div class="position-relative">
											<input type="text" class="form-control" id="email" name="email"
												value="<?= set_value('email');  ?>">
											<div class="form-control-icon">
												<i data-feather="user"></i>
											</div>
										</div>
										<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group position-relative has-icon-left">
										<label for="username">Password</label>
										<div class="position-relative">
											<input type="password" class="form-control" id="password" name="password"
												value="<?= set_value('password');  ?>">
											<div class="form-control-icon">
												<i data-feather="lock"></i>
											</div>
										</div>
										<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>


									<div class="clearfix">
										<button type="submit" class="btn btn-primary float-right">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<script src="assets/js/feather-icons/feather.min.js"></script>
		<script src="assets/js/app.js"></script>

		<script src="assets/js/main.js"></script>
	</body>

</html>
