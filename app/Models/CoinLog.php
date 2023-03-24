<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class CoinLog extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    protected $fillable = [
        "coin_id",
        "threshold_id",
        "last_updated",
        "price"
    ];

    public function coin(): BelongsTo
    {
        return $this->belongsTo(Coin::class);
    }
}
