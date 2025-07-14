@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Halaman Transaksi</h1>
            <div>
              <a href="{{ route('transactions.export.pdf') }}" class="btn btn-outline-danger me-2">
    Export Semua ke PDF
</a>

                <a href="{{ route('admin.transactions.create') }}" class="btn btn-primary">
                    + Tambah Transaksi
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($transactions->count())
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-3">Daftar Transaksi</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama User</th>
                                <th>Jenis</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ $transaction->user->name }}</td>
                                    <td>
                                        <span class="badge bg-{{ $transaction->type === 'income' ? 'success' : 'danger' }}">
                                            {{ ucfirst($transaction->type) }}
                                        </span>
                                    </td>
                                    <td>Rp{{ number_format($transaction->amount, 0, ',', '.') }}</td>
                                    <td>{{ $transaction->transaction_date }}</td>
                                    <td>{{ $transaction->description ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('admin.transactions.edit', $transaction->id) }}"
                                            class="btn btn-sm btn-warning">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.transactions.destroy', $transaction->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="alert alert-info">Belum ada data transaksi.</div>
        @endif
    </div>
@endsection
