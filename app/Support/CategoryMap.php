<?php

namespace App\Support;

use App\Models\Headset;
use App\Models\Keyboard;
use App\Models\Monitor;
use App\Models\Mouse;
use App\Models\Storage;

/**
 * Single source of truth for the five product categories.
 * Shared by UserProductController (browsing) and CartController (pricing).
 */
class CategoryMap
{
    public const MODELS = [
        'keyboard' => Keyboard::class,
        'mouse'    => Mouse::class,
        'headset'  => Headset::class,
        'monitor'  => Monitor::class,
        'storage'  => Storage::class,
    ];

    public const LABELS = [
        'keyboard' => 'Keyboard',
        'mouse'    => 'Mouse',
        'headset'  => 'Headset',
        'monitor'  => 'Monitor',
        'storage'  => 'Storage',
    ];

    public static function model(string $category): string
    {
        abort_if(! isset(self::MODELS[$category]), 404);

        return self::MODELS[$category];
    }

    public static function label(string $category): string
    {
        return self::LABELS[$category] ?? ucfirst($category);
    }
}
