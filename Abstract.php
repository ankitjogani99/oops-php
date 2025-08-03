<?php

abstract class PaymentGateway {
    protected $amount;

    public function __construct($amount) {
        $this->amount = $amount;
    }

    // Abstract method (child must implement)
    abstract public function pay(): bool;

    // Concrete method (common for all)
    public function logPayment() {
        echo "Logging payment of {$this->amount}\n";
    }
}

class PayPalGateway extends PaymentGateway {
    public function pay(): bool {
        echo "Processing PayPal payment of {$this->amount}\n";
        return true;
    }
}

class StripeGateway extends PaymentGateway {
    public function pay(): bool {
        echo "Processing Stripe payment of {$this->amount}\n";
        return true;
    }
}

// Usage
$payment = new PayPalGateway(100);
$payment->pay();
$payment->logPayment();
