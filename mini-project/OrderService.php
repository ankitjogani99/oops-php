<?php
require_once "Database.php";

class OrderService {
    private $paymentGateway; // Strategy
    private $observers = []; // For notifications

    public function __construct(PaymentMethod $gateway) {
        // Dependency Injection
        $this->paymentGateway = $gateway;
    }

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    private function notifyObservers(string $event) {
        foreach ($this->observers as $observer) {
            $observer->update($event);
        }
    }

    public function placeOrder(float $amount) {
        // Use Singleton DB
        $db = Database::getInstance()->getConnection();
        echo "Order stored in DB: $db\n";

        // Use Strategy to pay
        $this->paymentGateway->pay($amount);

        // Notify observers (Email, SMS, etc.)
        $this->notifyObservers("Order of $amount placed successfully!");
    }
}
