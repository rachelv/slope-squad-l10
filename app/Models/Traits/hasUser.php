<?php
namespace App\Models\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait hasUser
{
    private $userObj = null;

    public function scopeWhereUserId(Builder $builder, int $userId): Builder
    {
        return $builder->where('user_id', $userId);
    }

    public function getUser(): User
    {
        if ($this->userObj === null) {
            $this->userObj = $this->user ?? new User();
        }
        return $this->userObj;
    }

    public function setUser(User $user): void
    {
        $this->userObj = $user;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $userId): void
    {
        $this->user_id = $userId;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
