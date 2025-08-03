<?php
require_once "Observer.php";

class EmailService implements Observer {
    public function update(string $event) {
        echo "📧 Email sent: $event\n";
    }
}
