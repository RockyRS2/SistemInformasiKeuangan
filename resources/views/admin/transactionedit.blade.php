@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3>Edit Transaksi</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.transactions.update', $transaction->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama User</label>
                    <input type="text" class="form-control" value="{{ $transaction->user->name }}" readonly>
                    <input type="hidden" name="user_id" value="{{ $transaction->user_id }}">
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Jenis Transaksi</label>
                    <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                        <option value="income" {{ $transaction->type == 'income' ? 'selected' : '' }}>Pemasukan</option>
                        <option value="expense" {{ $transaction->type == 'expense' ? 'selected' : '' }}>Pengeluaran</option>
                    </select>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="amount" class="form-label">Jumlah (Rp)</label>
                    <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount"
                        value="{{ old('amount', $transaction->amount) }}" required>
                    @error('amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="transaction_date" class="form-label">Tanggal Transaksi</label>
                    <input type="date" class="form-control @error('transaction_date') is-invalid @enderror" id="transaction_date" name="transaction_date"
                        value="{{ old('transaction_date', $transaction->transaction_date) }}" required>
                    @error('transaction_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Keterangan</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $transaction->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="{{ route('admin.transactions.dashboard') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
