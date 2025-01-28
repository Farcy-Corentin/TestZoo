<?php

namespace App\Models;

use DateTimeImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * @property int $id
 * @property int $zoo_id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property DateTimeImmutable $created_at
 * @property DateTimeImmutable $update_at
 */
class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function zoo(): BelongsTo
    {
        return $this->belongsTo(Zoo::class);
    }
}
