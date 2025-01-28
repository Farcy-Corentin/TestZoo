<?php

namespace App\Models;

use DateTimeImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $zoo_id
 * @property string $day_open
 * @property string $hour_open
 * @property string $hour_close
 * @property DateTimeImmutable $created_at
 * @property DateTimeImmutable $updated_at
 */
class Opening extends Model
{
    use HasFactory;

    protected $fillable = [
        'day_open',
        'hour_open',
        'hour_close',
    ];

    public function zoo(): BelongsTo
    {
        return $this->belongsTo(Zoo::class);
    }
}
