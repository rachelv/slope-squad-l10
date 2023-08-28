<?php
namespace App\Models\Traits;

use App\Models\Mountain;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait hasMountain
{
    private $mountainObj = null;

    public function scopeWhereMountainId(Builder $builder, int $mountainId): Builder
    {
        return $builder->where('mountain_id', $mountainId);
    }

    public function isAtMountain(): bool
    {
        return $this->getMountainId() > 0;
    }

    public function isBackcountry(): bool
    {
        return $this->getMountainId() === 0;
    }

    public function getMountain(): Mountain
    {
        if ($this->isBackcountry()) {
            return Mountain::getBackcountryMock();
        }
        if ($this->mountainObj === null) {
            $this->mountainObj = $this->mountain ?? new Mountain();
        }
        return $this->mountainObj;
    }

    public function getMountainId(): int
    {
        return $this->mountain_id ?? 0;
    }

    public function setMountainId(int $mountainId): void
    {
        $this->mountain_id = $mountainId;
    }

    public function mountain(): BelongsTo
    {
        return $this->belongsTo(Mountain::class);
    }
}
