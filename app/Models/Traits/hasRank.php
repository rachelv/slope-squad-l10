<?php
namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait hasRank
{
    public function scopeOrderByRank(Builder $builder): Builder
    {
        return $builder->orderByDesc('rank');
    }

    public function getRank(): int
    {
        return $this->rank;
    }

    public function setRank(int $rank): void
    {
        $this->rank = $rank;
    }
}