<?php

namespace App\Models;

use DateTimeImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $zoo_id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property DateTimeImmutable $created_at
 * @property DateTimeImmutable $update_at
 */
class Habitat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    /**
     * Get the animals for the habitat
     */
    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class);
    }

    public function zoo(): BelongsTo
    {
        return $this->belongsTo(Zoo::class);
    }

}
