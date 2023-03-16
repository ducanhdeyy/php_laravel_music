<?php

namespace App\Services\Client;

use App\Models\Transaction;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\Auth;

class TransactionService extends BaseService
{

    public function getModel(): string
    {
        return Transaction::class;
    }

    public function getHistoryBuySong($id, $paginate)
    {
        if (Auth::guard('cus')->id() != $id) {
            throw new Exception(__('messages.error_500'));
        }

        try {
            return $this->model->with('song.singer')->orderByDesc('created_at')->where('user_id', $id)->paginate($paginate);
        } catch (\Throwable $th) {
            throw new Exception(__('messages.error_500'));
        }
    }

    public function buyHistory($request)
    {
        $bill = [
            'user_id' => $request->user_id,
            'song_id' => $request->song_id,
            'price' => $request->price
        ];
        try {
            $this->model->create($bill);
        } catch (\Throwable $th) {
            throw new Exception(__('messages.error_500'));
        }
    }
}
