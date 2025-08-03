<?php
interface PaymentMethod {
    public function pay(float $amount): void;
}
