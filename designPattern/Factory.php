<?php
interface PaymentMethod {
  public function pay(float $amount): void;
}

class PayPal implements PaymentMethod {
  public function pay(float $amount): void {
    echo "Paid $amount using PayPal\n";
  }
}

class Stripe implements PaymentMethod {
  public function pay(float $amount): void {
    echo "Paid $amount using Stripe\n";
  }
}

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

// Usage
$payment = PaymentFactory::create('paypal');
$payment->pay(150);
