<?php

namespace YourCompanyName\Targobank\Methods;

use Plenty\Modules\Payment\Method\Contracts\PaymentMethodService;
use Plenty\Modules\Payment\Method\Contracts\PaymentMethodRepositoryContract;
use Plenty\Modules\Payment\Method\Models\PaymentMethod;
use Plenty\Modules\Payment\Method\Models\Settings;
use Plenty\Plugin\Log\Loggable;

class TargobankPaymentMethod extends PaymentMethod
{
    use Loggable;

    public function isActive()
    {
        return true;
    }

    public function getPaymentData($order, $settings)
    {
        $this->getLogger(__METHOD__)->error('TargobankPaymentMethod::getPaymentData', ['order' => $order, 'settings' => $settings]);

        $paymentData = [
            'koop_id' => 'villastore241',
            'sessionID' => 'xyz',
            'amount' => $order->amount,
            'dealerID' => '804625',
            'dealerText' => 'https://www.yourshop.com/return',
            'documentno' => $order->id,
            'dealerShopURL' => 'https://www.yourshop.com/success',
            'dealerRejectURL' => 'https://www.yourshop.com/reject',
            'dealerAbortURL' => 'https://www.yourshop.com/abort',
            'gender' => $order->customer->gender,
            'surname' => $order->customer->surname,
            'firstname' => $order->customer->firstname,
            'street' => $order->customer->address->street,
            'streetnumber' => $order->customer->address->streetNumber,
            'zip' => $order->customer->address->postalCode,
            'city' => $order->customer->address->town,
            'telnocode' => substr($order->customer->address->telephone, 0, 4),
            'telno' => substr($order->customer->address->telephone, 4),
            'birthday' => $order->customer->birthday,
            'email' => $order->customer->email
        ];

        return $paymentData;
    }
}
