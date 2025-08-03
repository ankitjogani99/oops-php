<?php

/**
 *  Definition:
 * Define a family of algorithms (strategies), encapsulate them, and make them interchangeable without changing the client code.

 *Real-life use:
 * Payment methods (choose dynamically)
 * Sorting algorithms (choose runtime strategy)
 * Shipping cost calculation
 */

interface PaymentStrategy {
  public function pay(float $amount): void;
}

class PayPalStrategy implements PaymentStrategy {
  public function pay(float $amount): void {
    echo "Paying $amount with PayPal\n";
  }
}

class StripeStrategy implements PaymentStrategy {
  public function pay(float $amount): void {
    echo "Paying $amount with Stripe\n";
  }
}

class PaymentContext {
  private PaymentStrategy $strategy;

  public function __construct(PaymentStrategy $strategy) {
    $this->strategy = $strategy;
  }

  public function checkout(float $amount) {
    $this->strategy->pay($amount);
  }
}

// Usage
$context = new PaymentContext(new PayPalStrategy());
$context->checkout(200);

$context = new PaymentContext(new StripeStrategy());
$context->checkout(300);


//Swap payment algorithms without changing checkout logic.