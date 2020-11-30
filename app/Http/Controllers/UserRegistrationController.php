<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Payment;
use App\Api\Payment as PaymentApi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserRegistrationController extends Controller
{
    private $paymentApi;

    public function __construct(PaymentApi $paymentApi)
    {
        $this->paymentApi = $paymentApi;
    }

    public function index(): View
    {
        return \view('layouts.pages.registration');
    }

    public function store(Request $request)
    {
        try {
            $address = $this->saveAddress($request);
            $user = $this->saveUser($request, $address);
            $payment = $this->savePayment($request, $user);

            $request->session()->flash('flash_message', 'Successful!');

            return \view('layouts.pages.success')
                ->with('message', 'Response from Success page :)');


        } catch (\Exception $exception) {

            return \view('layouts.pages.error')
                ->with('message', $exception->getMessage());
        }


        /*

        $response = $this->paymentApi->send($user->id, $request->get('iban'), $request->get('account_owner'));

        if ($response['status_code'] === 200) {
            $this->saveResponseData($response, $payment);

            return \view('layouts.pages.success')
                ->with('response', $response['content']);
        }

        */

    }

    /**
     * @param Request $request
     * @return Address
     */
    private function saveAddress(Request $request): Address
    {
        $address = new Address();
        $address->street = $request->get('street');
        $address->house_number = $request->get('house_number');
        $address->zip_code = $request->get('zip_code');
        $address->city = $request->get('city');
        $address->save();
        return $address;
    }

    /**
     * @param Request $request
     * @param Address $address
     * @return User
     */
    private function saveUser(Request $request, Address $address): User
    {
        $user = new User();
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->phone = $request->get('phone');
        $user->address_id = $address->id;
        $user->save();
        return $user;
    }

    /**
     * @param Request $request
     * @param User $user
     * @return Payment
     */
    private function savePayment(Request $request, User $user): Payment
    {
        $payment = new Payment();
        $payment->account_owner = $request->get('account_owner');
        $payment->iban = $request->get('iban');
        $payment->user_id = $user->id;
        $payment->save();

        return $payment;
    }

    private function saveResponseData($response, $payment): void
    {
        $content = json_decode($response['content']);
        $payment->payment_data_id = $content->paymentDataId;
        $payment->status_code = $response['status_code'];
        $payment->response = json_encode($response['content']);
        $payment->save();
    }
}
