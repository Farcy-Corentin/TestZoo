<?php

namespace App\Models;

use DateTimeImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $animal_id
 * @property int $food_id
 * @property int $quantity
 * @property string $unit
 * @property DateTimeImmutable $created_at
 * @property DateTimeImmutable $updated_at
 * @property int $user_id
 */
class FoodConsum extends Model
{
    use HasFactory;

    protected $table = 'foods_consum';

    protected $fillable = [
        'animal_id',
        'food_id',
        'quantity',
        'unit',
        'user_id'
    ];

    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }

    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class);
    }

}
