<?php $role = $this->session->userdata('role'); ?>
<div id="sidebar" class='active'>
	<div class="sidebar-wrapper active">
		<div class="sidebar-header">
		<img src="<?= base_url('assets/images/logo/logo.jpg'); ?>" width="100%" height="600px" alt="" srcset="">
		</div>
		<div class="sidebar-menu">
			<ul class="menu">
				<?php if ($this->session->userdata('role') === '1'): ?>
				<li class='sidebar-title'>Master Data</li>
				<li class="sidebar-item ">
					<a href="<?= base_url('masterdata/katproduk') ?>" class='sidebar-link'>
						<i data-feather="trello" width="20"></i>
						<span>Data Kategori Produk</span>
					</a>

				</li>
				<li class="sidebar-item ">
					<a href="<?= base_url('masterdata/produk') ?>" class='sidebar-link'>
						<i data-feather="tablet" width="20"></i>
						<span>Data Produk</span>
					</a>

				</li>

				<li class="sidebar-item ">
					<a href="<?= base_url('masterdata/pelanggan') ?>" class='sidebar-link'>
						<i data-feather="users" width="20"></i>
						<span>Data Pelanggan</span>
					</a>

				</li>

				<li class="sidebar-item ">
					<a href="<?= base_url('masterdata/supplier') ?>" class='sidebar-link'>
						<i data-feather="user" width="20"></i>
						<span>Data Supplier</span>
					</a>

				</li>

				<li class="sidebar-item ">
					<a href="<?= base_url('masterdata/index') ?>" class='sidebar-link'>
						<i data-feather="divide" width="20"></i>
						<span>Data Akun Akuntansi</span>
					</a>

				</li>
				<li class="sidebar-item ">
					<a href="<?= base_url('masterdata/kelompok') ?>" class='sidebar-link'>
						<i data-feather="divide" width="20"></i>
						<span>Data Kelompok Akun</span>
					</a>

				</li>
				<li class="sidebar-item ">
					<a href="<?= base_url('masterdata/jenis') ?>" class='sidebar-link'>
						<i data-feather="divide" width="20"></i>
						<span>Data Jenis Akun</span>
					</a>

				</li>
				<li class="sidebar-item ">
					<a href="<?= base_url('masterdata/obyek') ?>" class='sidebar-link'>
						<i data-feather="divide-square" width="20"></i>
						<span>Data Obyek Akuntansi</span>
					</a>

				</li>
				<li class="sidebar-item ">
					<a href="<?= base_url('masterdata/dokumen') ?>" class='sidebar-link'>
						<i data-feather="archive" width="20"></i>
						<span>Data Dokumen</span>
					</a>

				</li>
				<li class="sidebar-item ">
					<a href="<?= base_url('masterdata/jntransaksi') ?>" class='sidebar-link'>
						<i data-feather="file-text" width="20"></i>
						<span>Data Jenis Transaksi</span>
					</a>

				</li>
				<li class="sidebar-item ">
					<a href="<?= base_url('masterdata/jnbayar') ?>" class='sidebar-link'>
						<i data-feather="disc" width="20"></i>
						<span>Data Jenis Bayar</span>
					</a>
				</li>
				<li class="sidebar-item ">
					<a href="<?= base_url('user/index') ?>" class='sidebar-link'>
						<i data-feather="users" width="20"></i>
						<span>User Manajemen</span>
					</a>
				</li>

				<li class='sidebar-title'>Main Menu</li>


				<li class="sidebar-item ">
					<a href="<?= base_url('admin/index') ?>" class='sidebar-link'>
						<i data-feather="shopping-cart" width="20"></i>
						<span>Pembelian</span>
					</a>
				</li>
				<li class="sidebar-item ">
					<a href="<?= base_url('admin/penjualan') ?>" class='sidebar-link'>
						<i data-feather="shopping-bag" width="20"></i>
						<span>Penjualan</span>
					</a>
				</li>
				<li class="sidebar-item ">
					<a href="<?= base_url('admin/transaksi') ?>" class='sidebar-link'>
						<i data-feather="dollar-sign" width="20"></i>
						<span>Transaksi</span>
					</a>

				</li>

				<li class="sidebar-item ">
					<a href="<?= base_url('admin/jurnal') ?>" class='sidebar-link'>
						<i data-feather="book" width="20"></i>
						<span>Jurnal</span>
					</a>

				</li>
				<li class="sidebar-item ">
					<a href="<?= base_url('admin/laba_rugi') ?>" class='sidebar-link'>
						<i data-feather="users" width="20"></i>
						<span>Laba Rugi	</span>
					</a>
				</li>
				</li>

				<!-- <li class='sidebar-title'>Main Menu</li>

				<li class="sidebar-item ">
					<a href="<?= base_url('admin/index') ?>" class='sidebar-link'>
						<i data-feather="shopping-cart" width="20"></i>
						<span>Pembelian</span>
					</a>
				</li>
				<li class="sidebar-item ">
					<a href="<?= base_url('admin/penjualan') ?>" class='sidebar-link'>
						<i data-feather="shopping-bag" width="20"></i>
						<span>Penjualan</span>
					</a>
				</li>
				<li class="sidebar-item ">
					<a href="<?= base_url('admin/transaksi') ?>" class='sidebar-link'>
						<i data-feather="dollar-sign" width="20"></i>
						<span>Transaksi</span>
					</a>

				</li>

				<li class="sidebar-item ">
					<a href="<?= base_url('admin/jurnal') ?>" class='sidebar-link'>
						<i data-feather="book" width="20"></i>
						<span>Jurnal</span>
					</a>

				</li>

				</li> -->

				<?php elseif ($this->session->userdata('role') ===2): ?>
				
				<li class="sidebar-item ">
					<a href="<?= base_url('masterdata/katproduk') ?>" class='sidebar-link'>
						<i data-feather="trello" width="20"></i>
						<span>Data Kategori Produk</span>
					</a>

				</li>
				<li class="sidebar-item ">
					<a href="<?= base_url('masterdata/produk') ?>" class='sidebar-link'>
						<i data-feather="tablet" width="20"></i>
						<span>Data Produk</span>
					</a>

				</li>

				<li class="sidebar-item ">
					<a href="<?= base_url('masterdata/pelanggan') ?>" class='sidebar-link'>
						<i data-feather="users" width="20"></i>
						<span>Data Pelanggan</span>
					</a>
				</li>

				<li class="sidebar-item ">
					<a href="<?= base_url('masterdata/supplier') ?>" class='sidebar-link'>
						<i data-feather="user" width="20"></i>
						<span>Data Supplier</span>
					</a>

				</li>
				<li class="sidebar-item ">
					<a href="<?= base_url('admin/index') ?>" class='sidebar-link'>
						<i data-feather="shopping-cart" width="20"></i>
						<span>Pembelian</span>
					</a>
				</li>
				<li class="sidebar-item ">
					<a href="<?= base_url('admin/penjualan') ?>" class='sidebar-link'>
						<i data-feather="shopping-bag" width="20"></i>
						<span>Penjualan</span>
					</a>
				</li>
				<li class="sidebar-item ">
					<a href="<?= base_url('admin/transaksi') ?>" class='sidebar-link'>
						<i data-feather="dollar-sign" width="20"></i>
						<span>Transaksi</span>
					</a>

				</li>

				<li class="sidebar-item ">
					<a href="<?= base_url('admin/jurnal') ?>" class='sidebar-link'>
						<i data-feather="book" width="20"></i>
						<span>Jurnal</span>
					</a>

				</li>
				<?php elseif ($this->session->userdata('role') === 3): ?>
				
				<li class="sidebar-item ">
					<a href="<?= base_url('admin/index') ?>" class='sidebar-link'>
						<i data-feather="shopping-cart" width="20"></i>
						<span>Pembelian</span>
					</a>
				</li>
				<li class="sidebar-item ">
					<a href="<?= base_url('user/index') ?>" class='sidebar-link'>
						<i data-feather="users" width="20"></i>
						<span>User Manajemen</span>
					</a>
				</li>
				<?php else: ?>
				
				<li class="sidebar-item ">
					<a href="<?= base_url('admin/penjualan') ?>" class='sidebar-link'>
						<i data-feather="shopping-bag" width="20"></i>
						<span>Penjualan</span>
					</a>
				</li>

				<li class="sidebar-item ">
					<a href="<?= base_url('masterdata/pelanggan') ?>" class='sidebar-link'>
						<i data-feather="users" width="20"></i>
						<span>Data Pelanggan</span>
					</a>
				</li>

				<li class="sidebar-item ">
					<a href="<?= base_url('user/index') ?>" class='sidebar-link'>
						<i data-feather="users" width="20"></i>
						<span>User Manajemen</span>
					</a>
				</li>

				


				</li>
				<?php endif; ?>
			</ul>
		</div>
		<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
	</div>
</div>
