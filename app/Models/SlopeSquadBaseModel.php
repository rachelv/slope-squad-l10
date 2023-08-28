<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class SlopeSquadBaseModel extends Model
{
    // created_at / updated_at columns are epoch ints
    protected $dateFormat = 'U';

    public function scopeOrderByNewest(Builder $builder): Builder
    {
        return $builder->orderByDesc('created_at');
    }

    public function getId(): int
    {
        return $this->id ?? 0;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): Carbon
    {
        return $this->updated_at;
    }
}