<?php
require_once "Observer.php";

class SMSService implements Observer {
    public function update(string $event) {
        echo "📱 SMS sent: $event\n";
    }
}
