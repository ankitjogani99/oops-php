<?php
require_once "PaymentMethod.php";

class Stripe implements PaymentMethod {
    public function pay(float $amount): void {
        echo "Paid $amount using Stripe\n";
    }
}
