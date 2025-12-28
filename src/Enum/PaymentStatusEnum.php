<?php declare(strict_types=1);

namespace App\Enum;

enum PaymentStatusEnum: string
{
    case Pending = 'pending';
    case Paid = 'paid';
    case Failed = 'failed';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Opération en cours',
            self::Paid => 'Opération réussie',
            self::Failed => 'Opération échouée',
        };
    }
}
