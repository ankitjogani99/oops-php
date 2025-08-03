<?php
require_once "PayPal.php";
require_once "Stripe.php";

class PaymentFactory {
    public static function create(string $type): PaymentMethod {
        $type = strtolower($type);

        switch ($type) {
            case 'paypal':
                return new PayPal();
            case 'stripe':
                return new Stripe();
            default:
                throw new Exception("Unknown payment type: $type");
        }
    }
}
