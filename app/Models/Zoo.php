<?php

namespace App\Models;

use DateTimeImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property DateTimeImmutable $created_at
 * @property DateTimeImmutable $update_at
 */
class Zoo extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'zoo';

    protected $fillable = [
        'name',
        'description',
    ];

    public function habitats(): HasMany
    {
        return $this->hasMany(Habitat::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
