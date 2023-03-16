<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ChangePassRequest;
use App\Http\Requests\Client\RechargeVnpayRequest;
use App\Http\Requests\Client\UpdateUserRequest;
use App\Services\Client\UserService;
use App\Services\VNPay\VnpayService;
use Exception;

class UserController extends Controller
{
    private $userService;
    private $vnpayService;

    public function __construct(UserService $userService, VnpayService $vnpayService)
    {
        $this->userService = $userService;
        $this->vnpayService = $vnpayService;
    }

    public function update(UpdateUserRequest $requets, $id)
    {
        try {
            $this->userService->updateCustomer($requets, $id);
            return redirect()->back()->with('success', __('messages.update_success'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function changePassword(ChangePassRequest $request, $id)
    {
        try {
            $this->userService->changePassword($request, $id);
            return redirect()->back()->with('success', __('messages.update_success'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function paymentVnpay(RechargeVnpayRequest $request)
    {
        try {
            $this->vnpayService->vnpayPayment($request);
        }catch (Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function checkoutVNPay()
    {
        try {
            $this->userService->updateMoneyVNPay();
            return redirect()->route('setting')->with('success', __('messages.add_money_success'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
}
