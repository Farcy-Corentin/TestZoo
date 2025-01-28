<?php

namespace App\Models;

use DateTimeImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * @property int $id
 * @property int $habitat_id
 * @property string $name
 * @property string $breed
 * @property string $image
 * @property string $description
 * @property DateTimeImmutable $created_at
 * @property DateTimeImmutable $update_at
 */
class Animal extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'breed',
        'image',
    ];

    /**
     * Get the habitat for the animal
     */
    public function habitat(): BelongsTo
    {
        return $this->belongsTo(Habitat::class);
    }

    public function foodsConsum(): HasMany
    {
        return $this->hasMany(FoodConsum::class);
    }

    public function veterinarianReports(): HasMany
    {
        return $this->hasMany(VeterinarianReport::class);
    }
}
