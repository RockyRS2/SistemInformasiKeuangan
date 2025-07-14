<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Transaksi Saya</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
    <h2>Transaksi Saya</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ ucfirst($transaction->type) }}</td>
                    <td>Rp{{ number_format($transaction->amount, 0, ',', '.') }}</td>
                    <td>{{ $transaction->transaction_date }}</td>
                    <td>{{ $transaction->description ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
