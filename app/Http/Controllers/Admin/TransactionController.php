<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
use App\Services\Admin\TransactionService;
use Exception;

class TransactionController extends Controller
{
    private $transaction;

    public function __construct(TransactionService $transaction)
    {
        $this->transaction = $transaction;
    }
    public function index()
    {
        try {
            $transactions = $this->transaction->index(SORT_TRANSACTION,INDEX_TRANSACTION);
            return view('admin.transaction.indexTransaction', compact('transactions'));
        } catch (Exception $e) {
            return view('admin.404');
        }
    }
}
