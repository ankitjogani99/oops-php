<?php

interface Notifier {
    public function send(string $to, string $message): bool;
}

class EmailNotifier implements Notifier {
    public function send(string $to, string $message): bool {
        echo "Email to $to: $message\n";
        return true;
    }
}

class SMSNotifier implements Notifier {
    public function send(string $to, string $message): bool {
        echo "SMS to $to: $message\n";
        return true;
    }
}

// Usage
function notifyUser(Notifier $notifier, $to, $message) {
    $notifier->send($to, $message);
}

notifyUser(new EmailNotifier(), "user@example.com", "Welcome to our platform!");
notifyUser(new SMSNotifier(), "9876543210", "Your OTP is 123456");
