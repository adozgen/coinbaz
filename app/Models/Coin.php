<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Coin extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    protected $fillable = [
        "name",
        "symbol",
        "slug",
        "date_added",
        "platform_name",
        "platform_symbol",
        "platform_slug",
        "token_address",
        "last_updated",
        "price"
    ];

    public function coinLogs() : HasMany
    {
        return $this->hasMany(CoinLog::class);
    }

}
