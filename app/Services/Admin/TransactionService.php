<?php

namespace App\Services\Admin;

use App\Models\Transaction;
use App\Services\BaseService;
use Exception;

class TransactionService extends BaseService
{

    public function getModel()
    {
        return Transaction::class;
    }

    public function index($sort,$paginate)
    {
        try {
            return $this->model->with('user', 'song')->search()->orderByDesc($sort)->paginate($paginate);
        } catch (\Throwable $th) {
            throw new Exception(__('messages.error_500'));
        }
    }
}
