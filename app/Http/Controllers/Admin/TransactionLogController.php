<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransactionLog;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class TransactionLogController extends Controller
{
    public function index()
    {
        $logs = TransactionLog::with(['user', 'transaction'])->latest()->get();
        return view('admin.transaction_logs', compact('logs'));
    }

    //export log untuk bagian admin
    public function exportPdf()
    {
        $logs = TransactionLog::latest()->get();

        $pdf = PDF::loadView('admin.transactionlog_pdf', compact('logs'));

        return $pdf->download('log_transaksi_' . Carbon::now()->format('Ymd_His') . '.pdf');
    }
}
