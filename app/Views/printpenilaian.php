<!DOCTYPE html>
<html>
<head>
    <title>Print Nilai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 6px;
            font-size: 12px;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body onload="window.print()">

<h3>
    DAFTAR NILAI EKSKUL <br>
    Bulan <?= date('F Y', strtotime($bulan . '-01')) ?>
</h3>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Ekskul</th>
            <th>Nilai</th>
            <th>Predikat</th>
            <th>Catatan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach ($daftar as $d): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $d->nama_siswa ?></td>
            <td><?= $d->nama_ekskul ?></td>
            <td><?= $d->nilai ?></td>
            <td><?= $d->predikat ?></td>
            <td><?= $d->catatan ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
