<?php

//A design principle where a class receives its dependencies from outside, instead of creating them internally.
//This reduces coupling and improves testability.


interface PaymentGateway {
  public function pay(float $amount): void;
}

class StripeGateway implements PaymentGateway {
  public function pay(float $amount): void {
    echo "Paid $amount using Stripe\n";
  }
}

class PaymentService {
  private PaymentGateway $gateway;

  // Injecting dependency instead of creating inside
  public function __construct(PaymentGateway $gateway) {
    $this->gateway = $gateway;
  }

  public function process(float $amount) {
    $this->gateway->pay($amount);
  }
}

// Usage
$stripe = new StripeGateway();
$service = new PaymentService($stripe);
$service->process(500);
