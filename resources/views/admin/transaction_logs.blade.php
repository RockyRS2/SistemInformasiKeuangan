@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Riwayat Log Transaksi</h2>
    <a href="{{ route('admin.transactionlog.export.pdf') }}" class="btn btn-danger mb-3">Export PDF</a>

    <table class="table table-bordered mt-3">
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
            @forelse($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->admin_name }}</td>
                    <td>{{ $log->user_name ?? '-' }}</td>
                    <td>{{ ucfirst($log->action) }}</td>
                    <td>{{ $log->created_at->timezone('Asia/Jakarta')->format('d-m-Y H:i') }} WIB</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada log transaksi</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
