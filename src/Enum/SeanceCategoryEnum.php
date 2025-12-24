<?php declare(strict_types=1);

namespace App\Enum;

enum SeanceCategoryEnum: string
{
    case Kinesiology  = 'kinesiology';
    case Ayurveda     = 'ayurveda';
    case Lithotherapy = 'lithotherapy';

    public function label(): string
    {
        return match ($this) {
            self::Kinesiology  => 'Kinésiologie',
            self::Ayurveda     => 'Ayurvéda',
            self::Lithotherapy => 'Lithothérapie',
        };
    }
}
