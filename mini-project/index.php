<?php
require_once "Payment/PaymentFactory.php";
require_once "Notification/EmailService.php";
require_once "Notification/SMSService.php";
require_once "OrderService.php";

// 1. Create payment method using Factory
$paymentGateway = PaymentFactory::create('paypal'); // or 'stripe'

// 2. Inject into OrderService (Dependency Injection)
$orderService = new OrderService($paymentGateway);

// 3. Attach observers (Observer Pattern)
$orderService->attach(new EmailService());
$orderService->attach(new SMSService());

// 4. Place order (Triggers Singleton DB, Strategy Payment, Observer Notification)
$orderService->placeOrder(499.99);
