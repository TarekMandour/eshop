<?php

namespace App\Plugins\Payment\Telr\Lib;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;

class PayPalClient
{
    /**
     * Returns PayPal HTTP client instance with environment which has access
     * credentials context. This can be used invoke PayPal API's provided the
     * credentials have the access to do so.
     */
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }
    
    /**
     * Setting up and Returns PayPal SDK environment with PayPal Access credentials.
     * For demo purpose, we are using SandboxEnvironment. In production this will be
     * ProductionEnvironment.
     */
    public static function environment()
    {
        $clientId = sc_config('Telr_client_id');
        $clientSecret = sc_config('Telr_secrect');
        
        if (sc_config('Telr_mode') === 'live') {
            return new ProductionEnvironment($clientId, $clientSecret);
        } else {
            return new SandboxEnvironment($clientId, $clientSecret);
        }
    }
}
