<?php
interface PaymentInterface
{
    public function paymentProcessing(int $totalCost, int $phone);
}

class QiwiPayment implements PaymentInterface
{
    public function paymentProcessing(int $totalCost, int $phone)
    {
        echo "обработка оплаты через Qiwi";
    }
}

class YandexPayment implements PaymentInterface
{
    public function paymentProcessing(int $totalCost, int $phone)
    {
        echo "обработка оплаты через Yandex";
    }
}

class WebMoneyPayment implements PaymentInterface
{
    public function paymentProcessing(int $totalCost, int $phone)
    {
        echo "обработка оплаты через WebMoney";
    }
}

class PaymentProcess
{
    public function payment(PaymentInterface $payment, int $totalCost, int $phone)
    {
        echo "Какая-то бизнес логика";

        return $payment->paymentProcessing($totalCost, $phone);
    }
}

$payment = new PaymentProcess;
$totalCost = 100;
$phone = 123;

// Оплата через киви
$payment->payment(new QiwiPayment, $totalCost, $phone);

// Оплата через Yandex
$payment->payment(new YandexPayment, $totalCost, $phone);
