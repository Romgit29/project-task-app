<?php

namespace App\Enums;

enum TaskStatus: string
{
    case New = 'new';
    case InProgress = 'in_progress';
    case Completed = 'completed';

    public function label(): string
    {
        return match($this) {
            self::New => 'Новая',
            self::InProgress => 'В процессе',
            self::Completed => 'Завершена',
        };
    }

    public static function values(): array {
        return array_column(self::cases(), 'value');
    }
}
