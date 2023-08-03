<div class="main-content container-fluid">
	<div class="page-title">
		<h3>Laba Rugi</h3>
	</div>
	<div class="card">
		<div class="card-body">
		</div>
		<section class="section">
			<?= $this->session->flashdata('message');  ?>
			<div class="card">
				<div class="card-header">
					<form action="" method="POST"
                    id="myForm"
            enctype="multipart/form-data" target="_blank">
						<div class="form-group">
							<div class="row">
								<div class="col-6 mb-4 d-flex">
									<label for="akun" class="form-label mx-2">PENJUALAN</label>
									<select class="form-select" aria-label="akun" name="kode_rekening" id="akun">
										<option selected>Pilih Kode Rekening</option>
										<?php foreach($obyek as $ob): ?>
										<option value="<?= $ob['NM_OBYEK'] ?>">
											<?= $ob['KD_REKENING'].'-'. $ob['NM_OBYEK'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-6">
									<input type="text" class="form-control" id="penjualan" name="penjualan" required>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="">
								<div class="row">
									<div class="col-6 mb-4 d-flex">
										<h3>Total Pendapatan</h3>
									</div>
									<div class="col-6">
										<input type="text" class="form-control" id="total_pendapatan"
											name="total_pendapatan" required readonly>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="">
								<div class="row">
									<div class="col-6 mb-4 d-flex">
										<label for="akun" class="form-label mx-2">Beban</label>
										<select class="form-select" aria-label="akun" name="kode_rekening" id="akun">
											<option selected>Pilih Kode Rekening</option>
											<?php foreach($obyek as $ob): ?>
											<option value="<?= $ob['NM_OBYEK'] ?>">
												<?= $ob['KD_REKENING'].'-'. $ob['NM_OBYEK'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-6">
										<input type="text" class="form-control" name="total_beban[]" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="">
								<div class="row">
									<div class="col-6 mb-4 d-flex">
										<label for="akun" class="form-label mx-2">Beban</label>
										<select class="form-select" aria-label="akun" name="kode_rekening" id="akun">
											<option selected>Pilih Kode Rekening</option>
											<?php foreach($obyek as $ob): ?>
											<option value="<?= $ob['NM_OBYEK'] ?>">
												<?= $ob['KD_REKENING'].'-'. $ob['NM_OBYEK'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-6">
										<input type="text" class="form-control" name="total_beban[]" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="">
								<div class="row">
									<div class="col-6 mb-4 d-flex">
										<label for="akun" class="form-label mx-2">Beban</label>
										<select class="form-select" aria-label="akun" name="kode_rekening" id="akun">
											<option selected>Pilih Kode Rekening</option>
											<?php foreach($obyek as $ob): ?>
											<option value="<?= $ob['NM_OBYEK'] ?>">
												<?= $ob['KD_REKENING'].'-'. $ob['NM_OBYEK'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-6">
										<input type="text" class="form-control" name="total_beban[]" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="">
								<div class="row">
									<div class="col-6 mb-4 d-flex">
										<label for="akun" class="form-label mx-2">Beban</label>
										<select class="form-select" aria-label="akun" name="kode_rekening" id="akun">
											<option selected>Pilih Kode Rekening</option>
											<?php foreach($obyek as $ob): ?>
											<option value="<?= $ob['NM_OBYEK'] ?>">
												<?= $ob['KD_REKENING'].'-'. $ob['NM_OBYEK'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-6">
										<input type="text" class="form-control" name="total_beban[]" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="">
								<div class="row">
									<div class="col-6 mb-4 d-flex">
										<label for="akun" class="form-label mx-2">Beban</label>
										<select class="form-select" aria-label="akun" name="kode_rekening" id="akun">
											<option selected>Pilih Kode Rekening</option>
											<?php foreach($obyek as $ob): ?>
											<option value="<?= $ob['NM_OBYEK'] ?>">
												<?= $ob['KD_REKENING'].'-'. $ob['NM_OBYEK'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-6">
										<input type="text" class="form-control" name="total_beban[]" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="">
								<div class="row">
									<div class="col-6 mb-4 d-flex">
										<h3>Laba Rugi</h3>
									</div>
									<div class="col-6">
										<input type="text" class="form-control" id="laba_rugi" name="laba_rugi" required
											readonly>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="">
								<div class="row">
									<div class="col-6 mb-4 d-flex">
										<h3>Laba Bersih</h3>
									</div>
									<div class="col-6">
										<input type="text" class="form-control" id="laba_bersih" name="laba_bersih"
											required readonly>
									</div>
								</div>
							</div>
						</div>


				</div>
				<div class="modal-footer" style="justify-content: center; margin-top: 12px;">
					<button type="button" id="hitungButton" class="btn btn-primary">Hitung</button>
					<button type="button" id="printButton"  class="btn btn-secondary">Print</button>
				</div>

				</form>

			</div>
	</div>
</div>

</section>
</div>
</div>
<script>
	// Fungsi untuk menghitung laba rugi dan laba bersih
	function hitung() {
		const penjualanInput = document.getElementById('penjualan');
		const totalBebanInputs = document.querySelectorAll('input[name="total_beban"]');
		const totalPendapatanInput = document.getElementById('total_pendapatan');
		const labaRugiInput = document.getElementById('laba_rugi');
		const labaBersihInput = document.getElementById('laba_bersih');

		const totalBeban = Array.from(totalBebanInputs)
			.reduce((sum, input) => sum + parseFloat(input.value || 0), 0);
		const pendapatan = parseFloat(penjualanInput.value || 0);
		const labaRugi = pendapatan - totalBeban;
		const labaBersih = labaRugi;

		totalPendapatanInput.value = pendapatan.toFixed(2);
		labaRugiInput.value = labaRugi.toFixed(2);
		labaBersihInput.value = labaBersih.toFixed(2);
	}

	// Tambahkan event listener untuk tombol "Hitung"
	const hitungButton = document.getElementById('hitungButton');
	hitungButton.addEventListener('click', hitung); 

    document.getElementById("printButton").addEventListener("click", function () {
        // Klik tombol "Print" akan mengirimkan form ke skrip PHP yang akan mencetak PDF
        document.getElementById("myForm").submit();
    });

</script>
<?php
// Skrip untuk mengolah data dari form dan menghasilkan PDF

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses data dari form
    $penjualan = floatval($_POST["penjualan"]);
    $totalBeban = array_sum($_POST["total_beban"]);

    // Hitung laba rugi dan laba bersih
    $labaRugi = $penjualan - $totalBeban;
    $labaBersih = $labaRugi;

    // Panggil library dompdf
    require_once 'vendor/autoload.php';

    // Buat objek dompdf
    $dompdf = new Dompdf\Dompdf();

    // Membuat konten PDF
    $html = '<!DOCTYPE html>
        <html>
        <head>
            <title>Laporan Laba Rugi</title>
            <style>
                /* Tambahkan gaya CSS Anda di sini */
            </style>
        </head>
        <body>
            <h1>Laporan Laba Rugi</h1>
            <p>Nama Beban: ' . $_POST["NM_OBYEK"] . '</p>
            <p>Penjualan: ' . $penjualan . '</p>
            <p>Total Beban: ' . $totalBeban . '</p>
            <p>Laba Rugi: ' . $labaRugi . '</p>
            <p>Laba Bersih: ' . $labaBersih . '</p>
        </body>
        </html>';

    // Memuat konten ke dalam dompdf
    $dompdf->loadHtml($html);

    // Menetapkan ukuran dan orientasi halaman
    $dompdf->setPaper('A4', 'portrait');

    // Render halaman PDF
    $dompdf->render();

    // Menyimpan PDF ke dalam file (atau bisa juga langsung ditampilkan)
    $dompdf->stream("laporan-laba-rugi.pdf", array("Attachment" => false));
}
?>
