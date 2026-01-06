<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nota Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            color: #000;
        }
        .nota-container {
            width: 80mm;
            margin: auto;
            border: 1px solid #000;
            padding: 15px;
        }
        .nota-header {
            text-align: center;
            margin-bottom: 15px;
        }
        .nota-header h2 {
            margin: 0;
        }
        .info, .footer {
            font-size: 12px;
        }
        .nota-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
            margin-top: 10px;
        }
        .nota-table th, .nota-table td {
            border-bottom: 1px dashed #000;
            padding: 4px 0;
            text-align: left;
        }
        .total {
            text-align: right;
            margin-top: 10px;
            font-weight: bold;
        }
        .paket-item {
            margin-top: 6px;
            margin-left: 10px; 
            font-style: italic;
            font-size: 11px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            border-top: 1px dashed #000;
            padding-top: 10px;
        }
        @media print {
            body {
                width: 80mm;
                margin: 0 auto;
            }
        }
    </style>
</head>
<body>
    <div class="nota-container">
        <div class="nota-header">
            <h2>NOTA PEMBAYARAN</h2>
            <p>Tanggal: <?= date('d M Y H:i', strtotime($nota['created_at'])) ?></p>
        </div>

        <div class="info">
            <p><strong>No:</strong> <?= $nota['id_nota'] ?></p>
            <p><strong>Kasir:</strong> <?= $nota['username'] ?></p>
            <p><strong>No Meja:</strong> <?= $nota['no_meja'] ?? '-' ?></p>
            <p><strong>Metode Bayar:</strong> <?= $payment_method['nama_metode'] ?></p>
        </div>

        <table class="nota-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $grandTotal = 0;
                foreach ($nota['detail'] as $item):
                    if ($item['type'] === 'produk'):
                        $total = $item['total'];
                        $grandTotal += $total;
                ?>
                    <tr>
                        <td><?= $item['nama'] ?><?= $item['pesan'] ? " ({$item['pesan']})" : '' ?></td>
                        <td><?= $item['jumlah'] ?></td>
                        <td>Rp<?= number_format($total, 0, ',', '.') ?></td>
                    </tr>
                <?php
                    elseif ($item['type'] === 'paket'):
                        $total = $item['harga_paket'] * $item['jumlah_paket'];
                        $grandTotal += $total;
                ?>
                    <tr>
                        <td><?= $item['nama_paket'] ?><?= $item['pesan'] ? " ({$item['pesan']})" : '' ?></td>
                        <td><?= $item['jumlah_paket'] ?></td>
                        <td>Rp<?= number_format($total, 0, ',', '.') ?></td>
                    </tr>
                    <?php foreach ($item['isi'] as $sub): ?>
                        <tr>
                            <td class="paket-item" style="padding-left:15px;">↳ <?= $sub['nama'] ?> x<?= $sub['jumlah'] ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; endforeach; ?>
            </tbody>
        </table>

        <div class="total">
            Grand Total: Rp<?= number_format($grandTotal, 0, ',', '.') ?>
        </div>

        <div class="footer">
            <p>Terima kasih atas kunjungan Anda!</p>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>
</html>
