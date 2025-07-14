<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Models\TransactionLog;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user')->get();
        return view('admin.transaction', compact('transactions'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.transactionform', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0',
            'transaction_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $transaction = Transaction::create($request->all());

        // Catat log create
        TransactionLog::create([
            'transaction_id' => $transaction->id,
              'user_name' => $transaction->user->name, 
             'user_id' => $transaction->user_id, // Ganti dari auth()->id()
             'admin_name' => auth()->user()->name,
            'action' => 'create',
            'after_data' => json_encode($transaction),
        ]);

        return redirect()->route('admin.transactions.dashboard')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit(Transaction $transaction)
    {
        $users = User::all();
        return view('admin.transactionedit', compact('transaction', 'users'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0',
            'transaction_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $before = $transaction->replicate(); // Simpan data lama

        $transaction->update($request->all());

        // Catat log update
        TransactionLog::create([
            'transaction_id' => $transaction->id,
           'user_id' => $transaction->user_id, // Ganti dari auth()->id()
             'user_name' => $transaction->user->name, // Tambahkan ini
             'admin_name' => auth()->user()->name,
            'action' => 'update',
            'before_data' => json_encode($before),
            'after_data' => json_encode($transaction),
        ]);

        return redirect()->route('admin.transactions.dashboard')->with('success', 'Transaksi berhasil diperbarui.');
    }

 public function destroy(Transaction $transaction)
{
    $before = $transaction->replicate(); // Simpan data lama

    // Simpan log SEBELUM menghapus transaksi
    TransactionLog::create([
        'transaction_id' => $transaction->id,
        'user_id' => $transaction->user_id,
        'user_name' => $transaction->user->name, // menyimpan nama user
        'admin_name' => auth()->user()->name,
        'action' => 'delete',
        'before_data' => $before->toArray(),
        'after_data' => null,
    ]);

    // Baru hapus transaksi
    $transaction->delete();

    return redirect()->route('admin.transactions.dashboard')->with('success', 'Transaksi berhasil dihapus.');
}


// Di TransactionController untuk user dashboard
public function userIndex()
{
    $transactions = Transaction::where('user_id', auth()->id())->latest()->get();
    return view('user.dashboard', compact('transactions'));
}

}
