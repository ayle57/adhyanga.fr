<?php declare(strict_types=1);

namespace App\Enum;

enum PaymentMethodEnum: string
{
    case Stripe = 'stripe';

    public function label(): string
    {
        return match ($this) {
            self::Stripe => 'Stripe',
        };
    }
}
