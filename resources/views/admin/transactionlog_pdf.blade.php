<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Log Transaksi</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Riwayat Log Transaksi</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Admin</th>
                <th>User</th>
                <th>Aksi</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->admin_name }}</td>
                    <td>{{ $log->user_name ?? '-' }}</td>
                    <td>{{ ucfirst($log->action) }}</td>
                    <td>{{ $log->created_at->timezone('Asia/Jakarta')->format('d-m-Y H:i') }} WIB</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
