<?php
require_once "PaymentMethod.php";

class PayPal implements PaymentMethod {
    public function pay(float $amount): void {
        echo "Paid $amount using PayPal\n";
    }
}
