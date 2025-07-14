@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Transaksi Saya</h2>
    <a href="{{ route('user.transactions.export.pdf') }}" class="btn btn-outline-danger mb-3">
    Export Transaksi Saya ke PDF
</a>


    @if($transactions->count())
        <table class="table table-bordered mt-3">
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
    @else
        <div class="alert alert-info">Belum ada transaksi.</div>
    @endif
</div>
@endsection
