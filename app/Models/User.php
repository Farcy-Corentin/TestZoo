<?php

namespace App\Models;

use DateTimeImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property int $id
 * @property int $zoo_id
 * @property string $name
 * @property string $email
 * @property DateTimeImmutable $email_verified_at
 * @property string $password
 * @property string $role
 * @property DateTimeImmutable $created_at
 * @property DateTimeImmutable $update_at
 */

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function zoo(): BelongsTo
    {
        return $this->belongsTo(Zoo::class);
    }

    public function veterinarianReports(): HasMany
    {
        return $this->hasMany(VeterinarianReport::class);
    }
}
