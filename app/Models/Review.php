<?php

namespace App\Models;

use DateTimeImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * @property int $id
 * @property int $zoo_id
 * @property string $content
 * @property string $status
 * @property string $author
 * @property int $rating
 * @property DateTimeImmutable $created_at
 * @property DateTimeImmutable $updated_at
 */
class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'status',
        'author',
        'rating',
    ];

    public function zoo(): BelongsTo
    {
        return $this->belongsTo(Zoo::class);
    }
}
