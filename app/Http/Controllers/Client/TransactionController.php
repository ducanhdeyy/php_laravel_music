<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Client\TransactionService;

class TransactionController extends Controller
{
    protected $transaction;

    public function __construct(TransactionService $transaction)
    {
        $this->transaction = $transaction;
    }

    public function history($id)
    {
        try {
            $transactions = $this->transaction->getHistoryBuySong($id, HISTORY_BUY_SONG);
            return view('client.history', compact('transactions'));
        } catch (\Exception $e) {
            return view('client.404');
        }
    }


}
