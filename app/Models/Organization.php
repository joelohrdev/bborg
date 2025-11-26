<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Database\Factories\OrganizationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property-read int $id
 * @property-read string $uuid
 * @property-read string $name
 * @property-read string $slug
 * @property-read int $owner_id
 * @property-read string|null $logo_path
 * @property-read string|null $primary_color
 * @property-read CarbonInterface $created_at
 * @property-read CarbonInterface $updated_at
 * @property-read CarbonInterface|null $deleted_at
 */
final class Organization extends Model
{
    /** @use HasFactory<OrganizationFactory> */
    use HasFactory, SoftDeletes;

    public function casts(): array
    {
        return [
            'id' => 'integer',
            'uuid' => 'string',
            'name' => 'string',
            'slug' => 'string',
            'owner_id' => 'integer',
            'logo_path' => 'string',
            'primary_color' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }

    /**
     * @return BelongsToMany<User, ['organization_id', 'user_id']>
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withPivot('role')
            ->withTimestamps();
    }

    /**
     * @return HasMany<Season, $this>
     */
    public function seasons(): HasMany
    {
        return $this->hasMany(Season::class);
    }
}
