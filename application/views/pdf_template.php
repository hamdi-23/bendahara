<!DOCTYPE html>
<html>
<head>
    <title>Data Jurnal - PDF</title>
</head>
<body>
    <h1>Data Jurnal</h1>
    <table border="1" cellpadding="5" cellspacing="0">
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
                </tr>
                <?php $totalDebet += $b['DEBET']; ?>
                <?php $totalKredit += $b['KREDIT']; ?>
                <?php $no++; ?>
            <?php endforeach; ?>
            <!-- Baris untuk menampilkan total -->
            <tr>
                <td colspan="5">Jumlah</td>
                <td><?= $totalDebet ?></td>
                <td><?= $totalKredit ?></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
