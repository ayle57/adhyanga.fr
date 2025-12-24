<?php declare(strict_types=1);

namespace App\Enum;

enum AppointmentStatusEnum: string
{
    case Scheduled = 'scheduled';
    case Canceled  = 'canceled';
    case Done      = 'done';

    public function label(): string
    {
        return match ($this) {
            self::Scheduled => 'Programmé',
            self::Canceled  => 'Annulé',
            self::Done      => 'Terminé',
        };
    }
}
