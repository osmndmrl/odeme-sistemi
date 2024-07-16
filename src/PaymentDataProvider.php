<?php

namespace villamoebel\Targobank\Providers;

use Plenty\Modules\Payment\Method\Contracts\PaymentMethodService;
use Plenty\Plugin\ServiceProvider;

class PaymentDataProvider extends ServiceProvider
{
    public function register()
    {
        $this->getApplication()->register(TargobankPaymentServiceProvider::class);
    }

    public function boot(PaymentMethodService $paymentMethodService)
    {
        $paymentMethodService->registerPaymentMethod(TargobankPaymentMethod::class);
    }
}
