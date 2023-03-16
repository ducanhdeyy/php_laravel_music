<?php

namespace App\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

abstract class BaseService
{
//    lấy các model tương ứng
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getAll()
    {
        try {
            return $this->model->all();
        } catch (\Exception $err) {
            Log::error('Message' . $err->getMessage() . 'Line :' . $err->getLine());
        }

    }

    /**
     * @throws \Exception
     */
    public function find($id)
    {
        try {
            return $this->model->findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $err) {
            throw new ModelNotFoundException(__('messages.error_500'));
        }
    }

    public function create($attributes = [])
    {
        try {
            return $this->model->create($attributes);
        } catch (\Exception $err) {
            Log::error('Message' . $err->getMessage() . 'Line :' . $err->getLine());
        }

    }

    public function update($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            try {
                return $result->update($attributes);
            } catch (\Exception $err) {
                Log::error('Message' . $err->getMessage() . 'Line :' . $err->getLine());
            }

        }
        return false;
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            try {
                return $result->delete();
            } catch (\Exception $err) {
                Log::error('Message' . $err->getMessage() . 'Line :' . $err->getLine());
            }

        }
        return false;
    }
}
