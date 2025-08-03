<?php

//An event-driven pattern where observers (listeners) subscribe to a subject (event source).
//When the subject changes state, all observers are notified automatically.
interface Observer {
  public function update(string $event);
}

class EmailService implements Observer {
  public function update(string $event) {
    echo "Email sent: $event\n";
  }
}

class SMSService implements Observer {
  public function update(string $event) {
    echo "SMS sent: $event\n";
  }
}

class Order {
  private array $observers = [];

  public function attach(Observer $observer) {
    $this->observers[] = $observer;
  }

  public function placeOrder() {
    echo "Order placed successfully\n";
    $this->notifyObservers("Order Placed");
  }

  private function notifyObservers(string $event) {
    foreach ($this->observers as $observer) {
      $observer->update($event);
    }
  }
}

// Usage
$order = new Order();
$order->attach(new EmailService());
$order->attach(new SMSService());
$order->placeOrder();


//Easily add new notifications (Push, WhatsApp) without modifying Order class.