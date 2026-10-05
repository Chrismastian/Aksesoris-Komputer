<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'email', 'telepon', 'alamat', 'total', 'status', 'catatan'];

    protected static function booted(): void
    {
        static::creating(function (Order $order) {
            $order->code ??= 'TZ-' . strtoupper(Str::random(8));
        });
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function totalItems(): int
    {
        return $this->items->sum('qty');
    }
}
