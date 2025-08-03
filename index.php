<?php

/**
 * SOLID Principles Example in PHP
 * Mini Project: Payment Processing System
 *
 * Demonstrates: SRP, OCP, LSP, ISP, DIP
 */

/* ------------------------------
   1. Single Responsibility Principle (SRP)
   ------------------------------ */

// Class only responsible for storing order information
class Order {
    public $id;
    public $amount;
    public $email;

    public function __construct($id, $amount, $email) {
        $this->id = $id;
        $this->amount = $amount;
        $this->email = $email;
    }
}

// Handles sending emails (separate responsibility)
class EmailService {
    public function sendEmail($to, $subject, $message) {
        echo "Email sent to $to: $subject - $message\n";
    }
}


/* ------------------------------
   2. Open/Closed Principle (OCP)
   ------------------------------
   - Adding new payment methods without changing existing code
   ------------------------------ */

// Payment interface (abstraction)
interface PaymentMethod {
    public function pay(float $amount): bool;
}

// PayPal payment (one implementation)
class PayPalPayment implements PaymentMethod {
    public function pay(float $amount): bool {
        echo "Paid $amount using PayPal\n";
        return true;
    }
}

// Stripe payment (another implementation)
class StripePayment implements PaymentMethod {
    public function pay(float $amount): bool {
        echo "Paid $amount using Stripe\n";
        return true;
    }
}

// In the future, we can add RazorpayPayment, CryptoPayment, etc., without modifying existing code


/* ------------------------------
   3. Liskov Substitution Principle (LSP)
   ------------------------------
   - Any new payment class can be used as PaymentMethod
   ------------------------------ */

// Example: Adding a dummy FreePayment method for 100% discount orders
class FreePayment implements PaymentMethod {
    public function pay(float $amount): bool {
        echo "Order is free. No payment required.\n";
        return true;
    }
}


/* ------------------------------
   4. Interface Segregation Principle (ISP)
   ------------------------------
   - Separate interfaces for different responsibilities
   ------------------------------ */

interface Notifiable {
    public function notify(string $message);
}

// Email notification service implements Notifiable
class EmailNotifier implements Notifiable {
    private $emailService;
    private $email;

    public function __construct(EmailService $emailService, string $email) {
        $this->emailService = $emailService;
        $this->email = $email;
    }

    public function notify(string $message) {
        $this->emailService->sendEmail($this->email, "Order Update", $message);
    }
}

// (Future: We can create SMSNotifier or PushNotifier without changing existing code)


/* ------------------------------
   5. Dependency Inversion Principle (DIP)
   ------------------------------
   - High-level PaymentProcessor depends on abstractions
   ------------------------------ */

class PaymentProcessor {
    private $paymentMethod;
    private $notifier;

    // Depend on abstractions (PaymentMethod, Notifiable), not concrete classes
    public function __construct(PaymentMethod $paymentMethod, Notifiable $notifier) {
        $this->paymentMethod = $paymentMethod;
        $this->notifier = $notifier;
    }

    public function process(Order $order) {
        if ($this->paymentMethod->pay($order->amount)) {
            $this->notifier->notify("Your payment for Order #{$order->id} was successful!");
            echo "Order #{$order->id} processed successfully.\n";
        } else {
            $this->notifier->notify("Payment failed for Order #{$order->id}.");
            echo "Order #{$order->id} failed.\n";
        }
    }
}


/* ------------------------------
   Usage Example
   ------------------------------ */

// Create an order
$order = new Order(101, 150.00, "customer@example.com");

// Email service + notifier
$emailService = new EmailService();
$notifier = new EmailNotifier($emailService, $order->email);

// Payment Processor with PayPal
$paypalProcessor = new PaymentProcessor(new PayPalPayment(), $notifier);
$paypalProcessor->process($order);

echo "-------------------------\n";

// Process another order using Stripe
$order2 = new Order(102, 0, "freeuser@example.com");
$freeNotifier = new EmailNotifier($emailService, $order2->email);
$freeProcessor = new PaymentProcessor(new FreePayment(), $freeNotifier);
$freeProcessor->process($order2);
